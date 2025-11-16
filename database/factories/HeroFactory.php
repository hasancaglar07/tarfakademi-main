<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hero>
 */
class HeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'background_image' => null,
            'title' => [
                'tr' => 'Tarımda Geleceği Birlikte İnşa Ediyoruz',
                'en' => 'Building the Future of Agriculture Together',
                'ar' => 'نبني مستقبل الزراعة معًا',
            ],
            'subtitle' => [
                'tr' => 'Türkiye\'nin en köklü tarım eğitim platformunda, sürdürülebilir tarım için yenilikçi çözümler üretiyoruz.',
                'en' => 'On Turkey\'s most established agricultural education platform, we produce innovative solutions for sustainable agriculture.',
                'ar' => 'على منصة التعليم الزراعي الأكثر رسوخًا في تركيا، ننتج حلولاً مبتكرة للزراعة المستدامة.',
            ],
            'primary_cta_label' => [
                'tr' => 'Hemen Başlayın',
                'en' => 'Get Started Now',
                'ar' => 'ابدأ الآن',
            ],
            'primary_cta_href' => [
                'tr' => '/iletisim',
                'en' => '/contact',
                'ar' => '/اتصل',
            ],
            'tertiary_cta_label' => [
                'tr' => 'Daha Fazla Bilgi',
                'en' => 'Learn More',
                'ar' => 'اعرف المزيد',
            ],
            'tertiary_cta_href' => [
                'tr' => '/hakkimizda',
                'en' => '/about',
                'ar' => '/من نحن',
            ],
            'stats' => [
                [
                    'value' => '5000+',
                    'label' => 'Öğrenci',
                ],
                [
                    'value' => '150+',
                    'label' => 'Eğitim Programı',
                ],
                [
                    'value' => '25+',
                    'label' => 'Uzman Eğitmen',
                ],
            ],
            'is_active' => true,
        ];
    }
}
