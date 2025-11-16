<?php

namespace Database\Seeders;

use App\Models\PostType;
use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postTypes = [
            [
                'name' => [
                    'tr' => 'Blog',
                    'en' => 'Blog',
                    'ar' => 'مدونة',
                ],
                'slug' => [
                    'tr' => 'blog',
                    'en' => 'blog',
                    'ar' => 'blog',
                ],
                'description' => [
                    'tr' => 'Blog yazıları ve makaleler',
                    'en' => 'Blog posts and articles',
                    'ar' => 'مقالات ومنشورات المدونة',
                ],
            ],
            [
                'name' => [
                    'tr' => 'Sayfa',
                    'en' => 'Page',
                    'ar' => 'صفحة',
                ],
                'slug' => [
                    'tr' => 'sayfa',
                    'en' => 'page',
                    'ar' => 'safha',
                ],
                'description' => [
                    'tr' => 'Statik sayfalar',
                    'en' => 'Static pages',
                    'ar' => 'صفحات ثابتة',
                ],
            ],
            [
                'name' => [
                    'tr' => 'Faaliyet',
                    'en' => 'Activity',
                    'ar' => 'نشاط',
                ],
                'slug' => [
                    'tr' => 'faaliyet',
                    'en' => 'activity',
                    'ar' => 'nashat',
                ],
                'description' => [
                    'tr' => 'Faaliyetler ve programlar',
                    'en' => 'Activities and programs',
                    'ar' => 'الأنشطة والبرامج',
                ],
            ],
            [
                'name' => [
                    'tr' => 'Etkinlik',
                    'en' => 'Event',
                    'ar' => 'فعالية',
                ],
                'slug' => [
                    'tr' => 'etkinlik',
                    'en' => 'event',
                    'ar' => 'faaliyah',
                ],
                'description' => [
                    'tr' => 'Etkinlikler ve organizasyonlar',
                    'en' => 'Events and organizations',
                    'ar' => 'الفعاليات والمنظمات',
                ],
            ],
            [
                'name' => [
                    'tr' => 'Haber',
                    'en' => 'News',
                    'ar' => 'أخبار',
                ],
                'slug' => [
                    'tr' => 'haber',
                    'en' => 'news',
                    'ar' => 'akhbar',
                ],
                'description' => [
                    'tr' => 'Haberler ve duyurular',
                    'en' => 'News and announcements',
                    'ar' => 'الأخبار والإعلانات',
                ],
            ],
            [
                'name' => [
                    'tr' => 'Dergi',
                    'en' => 'Magazine',
                    'ar' => 'مجلة',
                ],
                'slug' => [
                    'tr' => 'dergi',
                    'en' => 'magazine',
                    'ar' => 'majalla',
                ],
                'description' => [
                    'tr' => 'Dergi içerikleri',
                    'en' => 'Magazine content',
                    'ar' => 'محتوى المجلة',
                ],
            ],
            [
                'name' => [
                    'tr' => 'Proje',
                    'en' => 'Project',
                    'ar' => 'مشروع',
                ],
                'slug' => [
                    'tr' => 'proje',
                    'en' => 'project',
                    'ar' => 'mashroo',
                ],
                'description' => [
                    'tr' => 'Proje içerikleri',
                    'en' => 'Project content',
                    'ar' => 'محتوى المشروع',
                ],
            ],
            [
                'name' => [
                    'tr' => 'Hizmet Programı',
                    'en' => 'Service Program',
                    'ar' => 'برنامج الخدمة',
                ],
                'slug' => [
                    'tr' => 'hizmet',
                    'en' => 'service',
                    'ar' => 'khidmah',
                ],
                'description' => [
                    'tr' => 'Kurumsal ve topluluklara özel eğitim programları',
                    'en' => 'Tailored programs for organisations and communities',
                    'ar' => 'برامج مصممة للمؤسسات والمجتمعات',
                ],
            ],
            [
                'name' => [
                    'tr' => 'Video',
                    'en' => 'Video',
                    'ar' => 'فيديو',
                ],
                'slug' => [
                    'tr' => 'video',
                    'en' => 'video',
                    'ar' => 'fydyo',
                ],
                'description' => [
                    'tr' => 'Video kütüphanesi ve yayınlar',
                    'en' => 'Video library and broadcasts',
                    'ar' => 'مكتبة الفيديو والبث',
                ],
            ],
            [
                'name' => [
                    'tr' => 'Podcast',
                    'en' => 'Podcast',
                    'ar' => 'بودكاست',
                ],
                'slug' => [
                    'tr' => 'podcast',
                    'en' => 'podcast',
                    'ar' => 'bwdkast',
                ],
                'description' => [
                    'tr' => 'Podcast yayınları ve söyleşiler',
                    'en' => 'Podcast series and talks',
                    'ar' => 'سلسلة بودكاست وحوارات',
                ],
            ],
        ];

        foreach ($postTypes as $postTypeData) {
            PostType::updateOrCreate(
                ['slug->en' => $postTypeData['slug']['en']],
                [
                    'name' => $postTypeData['name'],
                    'description' => $postTypeData['description'],
                    'slug' => $postTypeData['slug'],
                ]
            );
        }
    }
}
