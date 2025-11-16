<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DemoStatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        if (! $user) {
            $user = User::create([
                'name' => 'Demo Kullanıcısı',
                'email' => 'demo@tarf.org',
                'password' => bcrypt('demo1234'),
            ]);
        }

        $postTypes = [
            'blog' => $this->getPostTypeBySlug('blog'),
            'service' => $this->getPostTypeBySlug('service'),
            'event' => $this->getPostTypeBySlug('event'),
            'video' => $this->getPostTypeBySlug('video'),
            'podcast' => $this->getPostTypeBySlug('podcast'),
        ];

        $categories = [
            'programs' => $this->firstOrCreateCategory(
                [
                    'tr' => 'Programlar',
                    'en' => 'Programs',
                    'ar' => 'البرامج',
                ],
                'service-programs',
                $postTypes['service']->id,
                [
                    'tr' => 'Kurumsal ve topluluklara özel yolculuklar',
                    'en' => 'Tailored journeys for organisations and communities',
                    'ar' => 'رحلات مصممة للمؤسسات والمجتمعات',
                ],
            ),
            'events' => $this->firstOrCreateCategory(
                [
                    'tr' => 'Etkinlikler',
                    'en' => 'Events',
                    'ar' => 'الفعاليات',
                ],
                'flagship-events',
                $postTypes['event']->id,
                [
                    'tr' => 'Zirveler, seminerler ve buluşmalar',
                    'en' => 'Summits, seminars and meetups',
                    'ar' => 'قمم وندوات ولقاءات',
                ],
            ),
            'videos' => $this->firstOrCreateCategory(
                [
                    'tr' => 'Video Kütüphanesi',
                    'en' => 'Video Library',
                    'ar' => 'مكتبة الفيديو',
                ],
                'video-library',
                $postTypes['video']->id,
                [
                    'tr' => 'İlham veren söyleşiler ve dersler',
                    'en' => 'Inspiring talks and lessons',
                    'ar' => 'حوارات ودروس ملهمة',
                ],
            ),
            'podcasts' => $this->firstOrCreateCategory(
                [
                    'tr' => 'Podcast Yayınları',
                    'en' => 'Podcast Series',
                    'ar' => 'سلسلة البودكاست',
                ],
                'podcast-series',
                $postTypes['podcast']->id,
                [
                    'tr' => 'Uzman sohbetleri ve hikayeler',
                    'en' => 'Expert talks and stories',
                    'ar' => 'أحاديث الخبراء والقصص',
                ],
            ),
            'insights' => $this->firstOrCreateCategory(
                [
                    'tr' => 'İçgörüler',
                    'en' => 'Insights',
                    'ar' => 'رؤى',
                ],
                'insight-articles',
                $postTypes['blog']->id,
                [
                    'tr' => 'Teknoloji ve eğitim kesişiminden analizler',
                    'en' => 'Analysis from the intersection of tech and education',
                    'ar' => 'تحليلات من تقاطع التكنولوجيا والتعليم',
                ],
            ),
        ];

        $this->seedPosts([
            [
                'title' => [
                    'tr' => 'Kurumsal Öğrenme İvmeleri',
                    'en' => 'Corporate Learning Accelerators',
                    'ar' => 'مسرعات التعلم المؤسسية',
                ],
                'slug' => [
                    'tr' => 'kurumsal-ogrenme-ivmeleri',
                    'en' => 'corporate-learning-accelerators',
                    'ar' => 'msr-at-altalm-almwasssia',
                ],
                'excerpt' => [
                    'tr' => 'Kurumsal ekipler için 8 haftada ölçülebilir gelişim planları.',
                    'en' => 'Measurable eight-week growth journeys for corporate teams.',
                    'ar' => 'رحلة نمو قابلة للقياس في ثمانية أسابيع للفرق المؤسسية.',
                ],
                'content' => [
                    'tr' => '<p>Mentorluk oturumları, proje stüdyoları ve data destekli değerlendirmelerle kurum içi kapasiteyi artırıyoruz.</p>',
                    'en' => '<p>Mentorship sessions, project studios and data-backed evaluations elevate the in-house capability.</p>',
                    'ar' => '<p>نرفع القدرات الداخلية من خلال جلسات الإرشاد واستوديوهات المشاريع والتقييمات المدعومة بالبيانات.</p>',
                ],
                'post_type_id' => $postTypes['service']->id,
                'category_id' => $categories['programs']->id,
            ],
            [
                'title' => [
                    'tr' => 'Topluluk Liderliği Kampı',
                    'en' => 'Community Leadership Camp',
                    'ar' => 'معسكر قيادة المجتمع',
                ],
                'slug' => [
                    'tr' => 'topluluk-liderligi-kampi',
                    'en' => 'community-leadership-camp',
                    'ar' => 'maskar-qyada-almjtm',
                ],
                'excerpt' => [
                    'tr' => 'Sosyal girişimler için liderlik ve dayanıklılık programı.',
                    'en' => 'Leadership and resilience program for social ventures.',
                    'ar' => 'برنامج للقيادة والمرونة للمبادرات الاجتماعية.',
                ],
                'content' => [
                    'tr' => '<p>Atölyeler, saha çalışmaları ve uzman koçluklarıyla topluluklarınızı güçlendirin.</p>',
                    'en' => '<p>Workshops, field work and expert coaching sessions boost every community initiative.</p>',
                    'ar' => '<p>تعزز ورش العمل والعمل الميداني وجلسات التدريب كل مبادرة مجتمعية.</p>',
                ],
                'post_type_id' => $postTypes['service']->id,
                'category_id' => $categories['programs']->id,
            ],
            [
                'title' => [
                    'tr' => 'Dijital Üretim Stüdyosu',
                    'en' => 'Digital Production Studio',
                    'ar' => 'استوديو الإنتاج الرقمي',
                ],
                'slug' => [
                    'tr' => 'dijital-uretim-studyosu',
                    'en' => 'digital-production-studio',
                    'ar' => 'astodiu-alintaj-alrqmy',
                ],
                'excerpt' => [
                    'tr' => 'Yapay zekâ, oyun ve XR projeleri için üretim desteği.',
                    'en' => 'Production support for AI, gaming and XR projects.',
                    'ar' => 'دعم الإنتاج لمشاريع الذكاء الاصطناعي والألعاب و XR.',
                ],
                'content' => [
                    'tr' => '<p>Takımlar prototiplerini geliştirirken, uzmanlarımız teknik borçları yönetiyor.</p>',
                    'en' => '<p>Teams build prototypes while our experts handle the technical debt.</p>',
                    'ar' => '<p>تقوم الفرق ببناء النماذج الأولية بينما يدير خبراؤنا الدين التقني.</p>',
                ],
                'post_type_id' => $postTypes['service']->id,
                'category_id' => $categories['programs']->id,
            ],
        ], $user);

        $this->seedPosts([
            [
                'title' => [
                    'tr' => 'Geleceğin Teknoloji Zirvesi',
                    'en' => 'Future of Technology Summit',
                    'ar' => 'قمة مستقبل التكنولوجيا',
                ],
                'slug' => [
                    'tr' => 'gelecegin-teknoloji-zirvesi',
                    'en' => 'future-of-technology-summit',
                    'ar' => 'qmt-mstqbl-altknologia',
                ],
                'excerpt' => [
                    'tr' => 'Yapay zekâ ve yeni nesil üretimi odağına alan iki günlük zirve.',
                    'en' => 'Two-day summit focused on AI and next-gen production.',
                    'ar' => 'قمة لمدة يومين تركز على الذكاء الاصطناعي والإنتاج الجيل القادم.',
                ],
                'content' => [
                    'tr' => '<p>Paneller, demo day ve ortak laboratuvar gezileriyle heyecan verici bir hat.</p>',
                    'en' => '<p>Panels, demo day sessions and shared lab visits build an exciting program.</p>',
                    'ar' => '<p>الندوات وجلسات يوم العروض وزيارات المختبرات المشتركة تبني برنامجاً مثيراً.</p>',
                ],
                'post_type_id' => $postTypes['event']->id,
                'category_id' => $categories['events']->id,
                'meta' => [
                    'event_date' => Carbon::now()->addDays(12)->toIso8601String(),
                    'location' => 'İstanbul, Haliç Kongre Merkezi',
                    'map_url' => 'https://maps.app.goo.gl/istanbul',
                ],
            ],
            [
                'title' => [
                    'tr' => 'Üretim Takımları Kampı',
                    'en' => 'Makers Camp',
                    'ar' => 'معسكر الصانعين',
                ],
                'slug' => [
                    'tr' => 'uretim-takimlari-kampi',
                    'en' => 'makers-camp',
                    'ar' => 'maskar-alsanayen',
                ],
                'excerpt' => [
                    'tr' => 'Robotik, oyun ve XR takımlarına açık yoğunlaştırılmış kamp.',
                    'en' => 'An intensive camp for robotics, gaming and XR teams.',
                    'ar' => 'معسكر مكثف لفرق الروبوتات والألعاب و XR.',
                ],
                'content' => [
                    'tr' => '<p>Gece hackathonları, saha görevleri ve mentor eşleştirmeleri içerir.</p>',
                    'en' => '<p>Night hackathons, field missions and mentor pairings keep the energy alive.</p>',
                    'ar' => '<p>تتضمن هاكاثونات ليلية ومهام ميدانية وتوفيق مرشدين يحافظ على الحماس.</p>',
                ],
                'post_type_id' => $postTypes['event']->id,
                'category_id' => $categories['events']->id,
                'meta' => [
                    'event_date' => Carbon::now()->addDays(26)->toIso8601String(),
                    'location' => 'Ankara, Teknoloji Üssü',
                    'map_url' => 'https://maps.app.goo.gl/ankara',
                ],
            ],
        ], $user);

        $this->seedPosts([
            [
                'title' => [
                    'tr' => 'Veriden Tasarıma Öğrenme Deneyimi',
                    'en' => 'Data-crafted Learning Experience',
                    'ar' => 'تجربة تعلم مصممة بالبيانات',
                ],
                'slug' => [
                    'tr' => 'veriden-tasarima-ogrenme',
                    'en' => 'data-crafted-learning',
                    'ar' => 'tjrbt-taalum-mbdha-bialbayanat',
                ],
                'excerpt' => [
                    'tr' => 'Akademi programlarımızda veri sinyallerini nasıl kullandığımızı anlattık.',
                    'en' => 'A look at how we leverage data signals inside academy programs.',
                    'ar' => 'نظرة على كيفية استخدام إشارات البيانات داخل برامج الأكاديمية.',
                ],
                'content' => [
                    'tr' => '<p>Öğrenme aktiviteleri gerçek zamanlı verilerle yenilenerek katılımcıların ivmesi ölçülür.</p>',
                    'en' => '<p>Learning activities are refreshed with real-time data, helping measure participant momentum.</p>',
                    'ar' => '<p>يتم تحديث أنشطة التعلم بالبيانات الفورية مما يساعد على قياس زخم المشاركين.</p>',
                ],
                'post_type_id' => $postTypes['blog']->id,
                'category_id' => $categories['insights']->id,
            ],
            [
                'title' => [
                    'tr' => 'Topluluk Tabanlı Üretim Ekonomisi',
                    'en' => 'Community-powered Production Economy',
                    'ar' => 'اقتصاد الإنتاج المدفوع بالمجتمع',
                ],
                'slug' => [
                    'tr' => 'topluluk-tabanli-uretim-ekonomisi',
                    'en' => 'community-powered-production-economy',
                    'ar' => 'aqtsad-alintaj-almdfu-bialmjtm',
                ],
                'excerpt' => [
                    'tr' => 'Üretken toplulukların sürdürülebilir finansman modelleri.',
                    'en' => 'Sustainable funding models for productive communities.',
                    'ar' => 'نماذج تمويل مستدامة للمجتمعات المنتجة.',
                ],
                'content' => [
                    'tr' => '<p>Yazılım, medya ve araştırma takımlarının gelir paylaşımlı çalışma yöntemleri.</p>',
                    'en' => '<p>Revenue sharing methods for software, media and research collectives.</p>',
                    'ar' => '<p>طرق مشاركة الإيرادات لفرق البرمجيات والإعلام والبحث.</p>',
                ],
                'post_type_id' => $postTypes['blog']->id,
                'category_id' => $categories['insights']->id,
            ],
        ], $user);

        $this->seedPosts([
            [
                'title' => [
                    'tr' => 'Yenilikçi Öğrenme Stüdyoları',
                    'en' => 'Innovative Learning Studios',
                    'ar' => 'استوديوهات التعلم المبتكرة',
                ],
                'slug' => [
                    'tr' => 'yenilikci-ogrenme-studyolari',
                    'en' => 'innovative-learning-studios',
                    'ar' => 'astodyohat-altalm-almbtkrh',
                ],
                'excerpt' => [
                    'tr' => 'Öğrenme stüdyosu modelini anlatan kısa belgesel.',
                    'en' => 'A short film about our learning studio model.',
                    'ar' => 'فيلم قصير عن نموذج استوديو التعلم لدينا.',
                ],
                'content' => [
                    'tr' => '<p>Mentorlar, öğrenciler ve uzmanlar aynı masada üretimi deneyimliyor.</p>',
                    'en' => '<p>Mentors, students and experts experience production around the same table.</p>',
                    'ar' => '<p>يختبر المرشدون والطلاب والخبراء الإنتاج حول نفس الطاولة.</p>',
                ],
                'post_type_id' => $postTypes['video']->id,
                'category_id' => $categories['videos']->id,
                'youtube_url' => 'https://www.youtube.com/watch?v=1Q7_ZfecC7o',
            ],
            [
                'title' => [
                    'tr' => 'XR Takımlarıyla Saha Notları',
                    'en' => 'Field Notes with XR Teams',
                    'ar' => 'ملاحظات ميدانية مع فرق XR',
                ],
                'slug' => [
                    'tr' => 'xr-takimlariyla-saha-notlari',
                    'en' => 'field-notes-xr-teams',
                    'ar' => 'mlahzat-mydanya-m-frq-xr',
                ],
                'excerpt' => [
                    'tr' => 'Genişletilmiş gerçeklik projelerinden kesitler.',
                    'en' => 'Highlights from extended reality projects.',
                    'ar' => 'لمحات من مشاريع الواقع الممتد.',
                ],
                'content' => [
                    'tr' => '<p>Sahadaki kullanıcı testleri ve öğrenilen dersleri paylaşıyoruz.</p>',
                    'en' => '<p>We share user tests from the field and the lessons learned.</p>',
                    'ar' => '<p>نشارك اختبارات المستخدمين من الميدان والدروس المستفادة.</p>',
                ],
                'post_type_id' => $postTypes['video']->id,
                'category_id' => $categories['videos']->id,
                'youtube_url' => 'https://www.youtube.com/watch?v=azORBC-oSFA',
            ],
        ], $user);

        $this->seedPosts([
            [
                'title' => [
                    'tr' => 'Atölye Hikayeleri: Üretimin Psikolojisi',
                    'en' => 'Workshop Stories: Psychology of Making',
                    'ar' => 'قصص الورش: سيكولوجيا الإنتاج',
                ],
                'slug' => [
                    'tr' => 'atolye-hikayeleri-uretimin-psikolojisi',
                    'en' => 'workshop-stories-psychology-of-making',
                    'ar' => 'qsas-alwrsh-sykologia-alintaj',
                ],
                'excerpt' => [
                    'tr' => 'Mentor-öğrenci ilişkisini sahadan örneklerle anlattık.',
                    'en' => 'Stories on mentor-student chemistry from the field.',
                    'ar' => 'قصص عن الكيمياء بين المرشد والطالب من الميدان.',
                ],
                'content' => [
                    'tr' => '<p>Program mezunlarımız üretim yolculuğunun iç görülerini paylaşıyor.</p>',
                    'en' => '<p>Program alumni share their inner reflections on the making journey.</p>',
                    'ar' => '<p>خريجو البرامج يشاركون انعكاساتهم حول رحلة الإنتاج.</p>',
                ],
                'post_type_id' => $postTypes['podcast']->id,
                'category_id' => $categories['podcasts']->id,
            ],
            [
                'title' => [
                    'tr' => 'Teknoloji ve İrfan Arasında Köprüler',
                    'en' => 'Bridging Technology and Wisdom',
                    'ar' => 'جسور بين التكنولوجيا والحكمة',
                ],
                'slug' => [
                    'tr' => 'teknoloji-irfan-koprusu',
                    'en' => 'bridging-technology-wisdom',
                    'ar' => 'jsor-byn-altknologia-walhkmh',
                ],
                'excerpt' => [
                    'tr' => 'Bilim insanlarıyla kültürel miras üzerine söyleşi.',
                    'en' => 'Conversation with scientists about cultural heritage.',
                    'ar' => 'حوار مع العلماء حول التراث الثقافي.',
                ],
                'content' => [
                    'tr' => '<p>Teknoloji üretimi ile irfanı aynı cümlede buluşturmanın yolları.</p>',
                    'en' => '<p>Exploring ways to merge wisdom and technology in the same sentence.</p>',
                    'ar' => '<p>استكشاف طرق لدمج الحكمة والتكنولوجيا في جملة واحدة.</p>',
                ],
                'post_type_id' => $postTypes['podcast']->id,
                'category_id' => $categories['podcasts']->id,
            ],
        ], $user);
    }

    private function getPostTypeBySlug(string $slug): PostType
    {
        return PostType::firstOrCreate(
            ['slug->en' => $slug],
            [
                'name' => [
                    'tr' => ucfirst($slug),
                    'en' => ucfirst($slug),
                    'ar' => $slug,
                ],
                'slug' => [
                    'tr' => $slug,
                    'en' => $slug,
                    'ar' => $slug,
                ],
            ]
        );
    }

    private function firstOrCreateCategory(array $name, string $slug, int $postTypeId, array $description): Category
    {
        return Category::firstOrCreate(
            ['slug->en' => $slug],
            [
                'name' => $name,
                'description' => $description,
                'slug' => [
                    'tr' => $slug,
                    'en' => $slug,
                    'ar' => $slug,
                ],
                'post_type_id' => $postTypeId,
            ]
        );
    }

    private function seedPosts(array $posts, User $user): void
    {
        foreach ($posts as $data) {
            $payload = array_merge($data, [
                'status' => 'published',
                'user_id' => $user->id,
            ]);

            Post::updateOrCreate(
                ['slug->tr' => $data['slug']['tr']],
                $payload
            );
        }
    }
}
