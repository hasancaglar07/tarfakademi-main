<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    /**
     * Display the specified form
     *
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $slug): JsonResponse
    {
        $locale = request()->get('locale', app()->getLocale());
        app()->setLocale($locale);

        $form = Form::where('slug', $slug)
            ->where('is_active', true)
            ->with('fields')
            ->firstOrFail();

        $transformedFields = $form->fields->map(function ($field) use ($locale) {
            return [
                'id' => $field->id,
                'name' => $field->name,
                'label' => get_translation_with_fallback($field, 'label', $locale),
                'type' => $field->type,
                'placeholder' => get_translation_with_fallback($field, 'placeholder', $locale),
                'required' => $field->required,
                'options' => $field->options,
                'order' => $field->order,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $form->id,
                'title' => get_translation_with_fallback($form, 'title', $locale),
                'description' => get_translation_with_fallback($form, 'description', $locale),
                'slug' => $form->slug,
                'fields' => $transformedFields,
            ],
        ]);
    }

    /**
     * Submit a form
     *
     * @param Request $request
     * @param string $slug
     * @return JsonResponse
     */
    public function submit(Request $request, string $slug): JsonResponse
    {
        $form = Form::where('slug', $slug)
            ->where('is_active', true)
            ->with('fields')
            ->firstOrFail();

        // Build validation rules from form fields
        $rules = [];
        $messages = [];
        
        foreach ($form->fields as $field) {
            $fieldRules = [];
            
            if ($field->required) {
                $fieldRules[] = 'required';
            }
            
            // Add type-specific validation
            switch ($field->type) {
                case 'email':
                    $fieldRules[] = 'email';
                    break;
                case 'number':
                    $fieldRules[] = 'numeric';
                    break;
                case 'tel':
                    $fieldRules[] = 'string';
                    break;
                case 'url':
                    $fieldRules[] = 'url';
                    break;
                default:
                    $fieldRules[] = 'string';
            }
            
            if (!empty($fieldRules)) {
                $rules[$field->name] = $fieldRules;
            }
        }

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Create form submission
        $submission = FormSubmission::create([
            'form_id' => $form->id,
            'data' => $validator->validated(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully',
            'data' => [
                'submission_id' => $submission->id,
            ],
        ], 201);
    }
}