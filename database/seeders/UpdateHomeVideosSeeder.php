<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostType;
use Illuminate\Database\Seeder;

class UpdateHomeVideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Video post type'ını bul veya oluştur
        $videoType = PostType::firstOrCreate(
            ['slug->tr' => 'video'],
            [
                'name' => [
                    'tr' => 'Video',
                    'en' => 'Video',
                    'ar' => 'فيديو'
                ],
                'slug' => [
                    'tr' => 'video',
                    'en' => 'video',
                    'ar' => 'fydyo'
                ]
            ]
        );
        
        $this->command->info('Video post type: ' . $videoType->id);

        // Önce default kategori ve user bulalım
        $defaultCategory = \App\Models\Category::first();
        $defaultUser = \App\Models\User::first();
        
        if (!$defaultCategory || !$defaultUser) {
            $this->command->error('Category or User not found! Please seed categories and users first.');
            return;
        }

        // Video 1: Teknoloji ve Eğitim
        Post::updateOrCreate(
            ['slug->tr' => 'teknoloji-ve-egitim-gelecek'],
            [
                'post_type_id' => $videoType->id,
                'category_id' => $defaultCategory->id,
                'user_id' => $defaultUser->id,
                'title' => [
                    'tr' => 'Teknoloji ve Eğitim: Geleceğe Hazırlık',
                    'en' => 'Technology and Education: Preparing for the Future',
                    'ar' => 'التكنولوجيا والتعليم: الاستعداد للمستقبل'
                ],
                'slug' => [
                    'tr' => 'teknoloji-ve-egitim-gelecek',
                    'en' => 'technology-education-future',
                    'ar' => 'altknologya-oaltaalym-almstqbl'
                ],
                'content' => [
                    'tr' => 'Teknoloji ve eğitimin kesişiminde, gençleri geleceğe hazırlayan yenilikçi yaklaşımlar.',
                    'en' => 'At the intersection of technology and education, innovative approaches to prepare young people for the future.',
                    'ar' => 'في تقاطع التكنولوجيا والتعليم، نهج مبتكرة لإعداد الشباب للمستقبل.'
                ],
                'youtube_url' => 'https://www.youtube.com/watch?v=1Q7_ZfecC7o',
                'status' => 'published',
            ]
        );

        // Video 2: Yazılım Geliştirme
        Post::updateOrCreate(
            ['slug->tr' => 'yazilim-gelistirme-surecleri'],
            [
                'post_type_id' => $videoType->id,
                'category_id' => $defaultCategory->id,
                'user_id' => $defaultUser->id,
                'title' => [
                    'tr' => 'Modern Yazılım Geliştirme Süreçleri',
                    'en' => 'Modern Software Development Processes',
                    'ar' => 'عمليات تطوير البرمجيات الحديثة'
                ],
                'slug' => [
                    'tr' => 'yazilim-gelistirme-surecleri',
                    'en' => 'software-development-processes',
                    'ar' => 'amliat-ttouir-albrmjiat'
                ],
                'content' => [
                    'tr' => 'Yazılım geliştirme dünyasında kullanılan en güncel metodolojiler ve teknikler.',
                    'en' => 'The most current methodologies and techniques used in the software development world.',
                    'ar' => 'أحدث المنهجيات والتقنيات المستخدمة في عالم تطوير البرمجيات.'
                ],
                'youtube_url' => 'https://www.youtube.com/watch?v=azORBC-oSFA',
                'status' => 'published',
            ]
        );

        $this->command->info('Home page videos updated successfully!');
    }
}