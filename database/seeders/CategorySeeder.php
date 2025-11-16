<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\PostType;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get post types
        $blogPostType = PostType::where('name->tr', 'Blog')->first();
        $pagePostType = PostType::where('name->tr', 'Sayfa')->first();
        $activityPostType = PostType::where('name->tr', 'Faaliyet')->first();
        $newsPostType = PostType::where('name->tr', 'Haber')->first();
        $eventPostType = PostType::where('name->tr', 'Etkinlik')->first();
        $magazinePostType = PostType::where('name->tr', 'Dergi')->first();
        $projectPostType = PostType::where('name->tr', 'Proje')->first();

        $categories = [
            // Blog Categories
            [
                'name' => [
                    'tr' => 'Teknoloji',
                    'en' => 'Technology',
                    'ar' => 'التكنولوجيا',
                ],
                'description' => [
                    'tr' => 'Teknoloji ile ilgili yazılar',
                    'en' => 'Posts about technology',
                    'ar' => 'مقالات حول التكنولوجيا',
                ],
                'post_type_id' => $blogPostType->id,
            ],
            [
                'name' => [
                    'tr' => 'Eğitim',
                    'en' => 'Education',
                    'ar' => 'التعليم',
                ],
                'description' => [
                    'tr' => 'Eğitim ve öğretim konuları',
                    'en' => 'Education and teaching topics',
                    'ar' => 'مواضيع التعليم والتدريس',
                ],
                'post_type_id' => $blogPostType->id,
            ],
            [
                'name' => [
                    'tr' => 'Sağlık',
                    'en' => 'Health',
                    'ar' => 'الصحة',
                ],
                'description' => [
                    'tr' => 'Sağlık ve tıp konuları',
                    'en' => 'Health and medical topics',
                    'ar' => 'مواضيع الصحة والطب',
                ],
                'post_type_id' => $blogPostType->id,
            ],
            [
                'name' => [
                    'tr' => 'Kültür',
                    'en' => 'Culture',
                    'ar' => 'الثقافة',
                ],
                'description' => [
                    'tr' => 'Kültür ve sanat konuları',
                    'en' => 'Culture and art topics',
                    'ar' => 'مواضيع الثقافة والفن',
                ],
                'post_type_id' => $blogPostType->id,
            ],

            // Page Categories
            [
                'name' => [
                    'tr' => 'Kurumsal',
                    'en' => 'Corporate',
                    'ar' => 'الشركات',
                ],
                'description' => [
                    'tr' => 'Kurumsal sayfalar',
                    'en' => 'Corporate pages',
                    'ar' => 'الصفحات المؤسسية',
                ],
                'post_type_id' => $pagePostType->id,
            ],
            [
                'name' => [
                    'tr' => 'Bilgi',
                    'en' => 'Information',
                    'ar' => 'معلومات',
                ],
                'description' => [
                    'tr' => 'Bilgilendirici sayfalar',
                    'en' => 'Informational pages',
                    'ar' => 'صفحات إعلامية',
                ],
                'post_type_id' => $pagePostType->id,
            ],

            // Activity Categories
            [
                'name' => [
                    'tr' => 'Dergi',
                    'en' => 'Magazine',
                    'ar' => 'مجلة',
                ],
                'description' => [
                    'tr' => 'Bilim ve teknoloji dergisi içerikleri',
                    'en' => 'Science and technology magazine content',
                    'ar' => 'محتوى مجلة العلوم والتكنولوجيا',
                ],
                'post_type_id' => $activityPostType->id,
            ],
            [
                'name' => [
                    'tr' => 'Teknoloji Takımları',
                    'en' => 'Technology Teams',
                    'ar' => 'فرق التكنولوجيا',
                ],
                'description' => [
                    'tr' => 'Teknoloji takımları ve projeler',
                    'en' => 'Technology teams and projects',
                    'ar' => 'فرق التكنولوجيا والمشاريع',
                ],
                'post_type_id' => $activityPostType->id,
            ],
            [
                'name' => [
                    'tr' => 'Proje',
                    'en' => 'Project',
                    'ar' => 'مشروع',
                ],
                'description' => [
                    'tr' => 'Teknoloji projeleri ve geliştirmeler',
                    'en' => 'Technology projects and developments',
                    'ar' => 'مشاريع التكنولوجيا والتطويرات',
                ],
                'post_type_id' => $activityPostType->id,
            ],

            // News Categories
            [
                'name' => [
                    'tr' => 'Genel',
                    'en' => 'General',
                    'ar' => 'عام',
                ],
                'description' => [
                    'tr' => 'Genel haberler',
                    'en' => 'General news',
                    'ar' => 'أخبار عامة',
                ],
                'post_type_id' => $newsPostType->id,
            ],
            [
                'name' => [
                    'tr' => 'Duyuru',
                    'en' => 'Announcement',
                    'ar' => 'إعلان',
                ],
                'description' => [
                    'tr' => 'Resmi duyurular',
                    'en' => 'Official announcements',
                    'ar' => 'الإعلانات الرسمية',
                ],
                'post_type_id' => $newsPostType->id,
            ],

            // Event Categories
            [
                'name' => [
                    'tr' => 'Konferans',
                    'en' => 'Conference',
                    'ar' => 'مؤتمر',
                ],
                'description' => [
                    'tr' => 'Konferans ve seminerler',
                    'en' => 'Conferences and seminars',
                    'ar' => 'المؤتمرات والندوات',
                ],
                'post_type_id' => $eventPostType->id,
            ],
            [
                'name' => [
                    'tr' => 'Workshop',
                    'en' => 'Workshop',
                    'ar' => 'ورشة عمل',
                ],
                'description' => [
                    'tr' => 'Atölye çalışmaları',
                    'en' => 'Workshop activities',
                    'ar' => 'أنشطة ورش العمل',
                ],
                'post_type_id' => $eventPostType->id,
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create([
                'name' => $categoryData['name'],
                'description' => $categoryData['description'],
                'post_type_id' => $categoryData['post_type_id'],
            ]);
        }
    }
}
