<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FormSubmissionController extends Controller
{
    public function show(string $locale, string $slug)
    {
        $form = Form::where('slug', $slug)
            ->where('is_active', true)
            ->with(['fields' => function ($query) {
                $query->orderBy('order');
            }])
            ->firstOrFail();

        return view('forms.show', compact('form'));
    }

    public function submit(Request $request, string $locale, string $slug)
    {
        $form = Form::where('slug', $slug)
            ->where('is_active', true)
            ->with(['fields' => function ($query) {
                $query->where('is_active', true);
            }])
            ->firstOrFail();

        // Dinamik validation kuralları oluştur
        $rules = [];
        $messages = [];

        foreach ($form->fields as $field) {
            $fieldRules = [];

            if ($field->is_required) {
                $fieldRules[] = 'required';
            }

            if ($field->type === 'email') {
                $fieldRules[] = 'email';
            }

            if ($field->type === 'number') {
                $fieldRules[] = 'numeric';
            }

            if ($field->type === 'file') {
                $fieldRules[] = 'file';
            }

            if (! empty($field->validation_rules)) {
                $fieldRules = array_merge($fieldRules, $field->validation_rules);
            }

            if (! empty($fieldRules)) {
                $rules[$field->name] = $fieldRules;
            }

            // Hata mesajları
            $messages[$field->name.'.required'] = $field->label.' alanı zorunludur.';
            $messages[$field->name.'.email'] = 'Geçerli bir e-posta adresi giriniz.';
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Form verisini kaydet
        $submissionData = [];
        foreach ($form->fields as $field) {
            if ($request->has($field->name)) {
                $value = $request->input($field->name);

                // Dosya yükleme işlemi
                if ($field->type === 'file' && $request->hasFile($field->name)) {
                    $file = $request->file($field->name);
                    $path = $file->store('form-submissions', 'public');
                    $submissionData[$field->name] = $path;
                } else {
                    $submissionData[$field->name] = $value;
                }
            }
        }

        // Gönderimi kaydet
        $submission = FormSubmission::create([
            'form_id' => $form->id,
            'data' => $submissionData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // E-posta bildirimi gönder
        if ($form->send_email_notification && $form->notification_email) {
            try {
                Mail::raw(
                    "Yeni form gönderisi alındı.\n\nForm: {$form->name}\n\nVeriler:\n".json_encode($submissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                    function ($message) use ($form) {
                        $message->to($form->notification_email)
                            ->subject('Yeni Form Gönderisi: '.$form->name);
                    }
                );
            } catch (\Exception $e) {
                // E-posta gönderimi başarısız olsa bile devam et
                \Log::error('Form bildirim e-postası gönderilemedi: '.$e->getMessage());
            }
        }

        // Yönlendirme veya başarı mesajı
        if ($form->redirect_url) {
            return redirect($form->redirect_url);
        }

        return back()->with('success', $form->success_message ?? 'Form başarıyla gönderildi.');
    }
}
