<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\FormField;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    public function run(): void
    {
        // İletişim Formu
        $contactForm = Form::create([
            'name' => 'İletişim Formu',
            'slug' => 'iletisim',
            'description' => 'Bizimle iletişime geçmek için bu formu kullanabilirsiniz.',
            'is_active' => true,
            'submit_button_text' => 'Mesaj Gönder',
            'success_message' => 'Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.',
            'send_email_notification' => true,
            'notification_email' => 'info@example.com',
        ]);

        // İletişim formu alanları
        FormField::create([
            'form_id' => $contactForm->id,
            'label' => 'Ad Soyad',
            'name' => 'full_name',
            'type' => 'text',
            'placeholder' => 'Adınız ve soyadınız',
            'is_required' => true,
            'order' => 1,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $contactForm->id,
            'label' => 'E-posta Adresi',
            'name' => 'email',
            'type' => 'email',
            'placeholder' => 'ornek@email.com',
            'is_required' => true,
            'validation_rules' => ['email'],
            'order' => 2,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $contactForm->id,
            'label' => 'Telefon',
            'name' => 'phone',
            'type' => 'tel',
            'placeholder' => '0555 123 45 67',
            'is_required' => false,
            'order' => 3,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $contactForm->id,
            'label' => 'Konu',
            'name' => 'subject',
            'type' => 'select',
            'is_required' => true,
            'options' => [
                'Genel Bilgi',
                'Destek Talebi',
                'İşbirliği',
                'Diğer',
            ],
            'order' => 4,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $contactForm->id,
            'label' => 'Mesajınız',
            'name' => 'message',
            'type' => 'textarea',
            'placeholder' => 'Mesajınızı buraya yazın...',
            'is_required' => true,
            'validation_rules' => ['min:10'],
            'order' => 5,
            'is_active' => true,
        ]);

        // Başvuru Formu
        $applicationForm = Form::create([
            'name' => 'Başvuru Formu',
            'slug' => 'basvuru',
            'description' => 'Program başvurusu için lütfen aşağıdaki formu doldurun.',
            'is_active' => true,
            'submit_button_text' => 'Başvuruyu Gönder',
            'success_message' => 'Başvurunuz alındı. Size en kısa sürede dönüş yapacağız.',
            'send_email_notification' => true,
            'notification_email' => 'basvuru@example.com',
        ]);

        // Başvuru formu alanları
        FormField::create([
            'form_id' => $applicationForm->id,
            'label' => 'Ad',
            'name' => 'first_name',
            'type' => 'text',
            'is_required' => true,
            'order' => 1,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $applicationForm->id,
            'label' => 'Soyad',
            'name' => 'last_name',
            'type' => 'text',
            'is_required' => true,
            'order' => 2,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $applicationForm->id,
            'label' => 'E-posta',
            'name' => 'email',
            'type' => 'email',
            'is_required' => true,
            'validation_rules' => ['email'],
            'order' => 3,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $applicationForm->id,
            'label' => 'Doğum Tarihi',
            'name' => 'birth_date',
            'type' => 'date',
            'is_required' => true,
            'order' => 4,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $applicationForm->id,
            'label' => 'Cinsiyet',
            'name' => 'gender',
            'type' => 'radio',
            'is_required' => true,
            'options' => ['Kadın', 'Erkek', 'Belirtmek İstemiyorum'],
            'order' => 5,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $applicationForm->id,
            'label' => 'Eğitim Durumu',
            'name' => 'education_level',
            'type' => 'select',
            'is_required' => true,
            'options' => [
                'İlköğretim',
                'Lise',
                'Üniversite',
                'Yüksek Lisans',
                'Doktora',
            ],
            'order' => 6,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $applicationForm->id,
            'label' => 'İlgi Alanları',
            'name' => 'interests',
            'type' => 'checkbox',
            'is_required' => false,
            'options' => [
                'Teknoloji',
                'Sanat',
                'Spor',
                'Müzik',
                'Edebiyat',
            ],
            'order' => 7,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $applicationForm->id,
            'label' => 'Neden başvurmak istiyorsunuz?',
            'name' => 'motivation',
            'type' => 'textarea',
            'is_required' => true,
            'validation_rules' => ['min:50'],
            'help_text' => 'En az 50 karakter',
            'order' => 8,
            'is_active' => true,
        ]);

        FormField::create([
            'form_id' => $applicationForm->id,
            'label' => 'CV / Özgeçmiş',
            'name' => 'cv_file',
            'type' => 'file',
            'is_required' => false,
            'help_text' => 'PDF formatında yükleyiniz',
            'order' => 9,
            'is_active' => true,
        ]);
    }
}
