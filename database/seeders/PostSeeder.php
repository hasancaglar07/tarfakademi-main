<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostType;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get post types
        $blogPostType = PostType::where('name->tr', 'Blog')->first();
        $pagePostType = PostType::where('name->tr', 'Sayfa')->first();
        $newsPostType = PostType::where('name->tr', 'Haber')->first();
        $eventPostType = PostType::where('name->tr', 'Etkinlik')->first();
        $activityPostType = PostType::where('name->tr', 'Faaliyet')->first();
        $magazinePostType = PostType::where('name->tr', 'Dergi')->first();
        $projectPostType = PostType::where('name->tr', 'Proje')->first();

        // Get categories
        $techCategory = Category::where('name->tr', 'Teknoloji')->first();
        $educationCategory = Category::where('name->tr', 'Eğitim')->first();
        $healthCategory = Category::where('name->tr', 'Sağlık')->first();
        $cultureCategory = Category::where('name->tr', 'Kültür')->first();
        $corporateCategory = Category::where('name->tr', 'Kurumsal')->first();
        $infoCategory = Category::where('name->tr', 'Bilgi')->first();
        $generalNewsCategory = Category::where('name->tr', 'Genel')->first();
        $announcementCategory = Category::where('name->tr', 'Duyuru')->first();
        $conferenceCategory = Category::where('name->tr', 'Konferans')->first();
        $workshopCategory = Category::where('name->tr', 'Workshop')->first();
        $magazineCategory = Category::where('name->tr', 'Dergi')->first();
        $projectCategory = Category::where('name->tr', 'Proje')->first();
        $teamCategory = Category::where('name->tr', 'Teknoloji Takımları')->first();

        // Get user
        $user = User::first();

        $posts = [
            // Blog Posts
            [
                'title' => [
                    'tr' => 'Yapay Zeka ve Geleceğin Teknolojisi',
                    'en' => 'Artificial Intelligence and Future Technology',
                    'ar' => 'الذكاء الاصطناعي وتكنولوجيا المستقبل',
                ],
                'content' => [
                    'tr' => '<p>Yapay zeka teknolojisi günümüzde hızla gelişmekte ve hayatımızın her alanında etkili olmaktadır. Bu teknoloji, sağlıktan eğitime, ulaşımdan finans sektörüne kadar geniş bir yelpazede kullanılmaktadır.</p><p>Gelecekte yapay zeka teknolojisinin daha da gelişmesi beklenmekte ve bu gelişmelerin toplum üzerindeki etkileri tartışılmaktadır.</p>',
                    'en' => '<p>Artificial intelligence technology is rapidly developing today and is becoming effective in every area of our lives. This technology is used in a wide range from health to education, from transportation to the financial sector.</p><p>In the future, artificial intelligence technology is expected to develop even more, and the effects of these developments on society are being discussed.</p>',
                    'ar' => '<p>تتطور تكنولوجيا الذكاء الاصطناعي بسرعة اليوم وتصبح فعالة في كل مجال من مجالات حياتنا. تُستخدم هذه التكنولوجيا في نطاق واسع من الصحة إلى التعليم، ومن النقل إلى القطاع المالي.</p><p>في المستقبل، من المتوقع أن تتطور تكنولوجيا الذكاء الاصطناعي أكثر، وتتم مناقشة آثار هذه التطورات على المجتمع.</p>',
                ],
                'slug' => [
                    'tr' => 'yapay-zeka-gelecek-teknoloji',
                    'en' => 'artificial-intelligence-future-technology',
                    'ar' => 'الذكاء-الاصطناعي-تكنولوجيا-المستقبل',
                ],
                'post_type_id' => $blogPostType->id,
                'category_id' => $techCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Online Eğitimin Avantajları',
                    'en' => 'Advantages of Online Education',
                    'ar' => 'مزايا التعليم عبر الإنترنت',
                ],
                'content' => [
                    'tr' => '<p>Online eğitim, özellikle pandemi döneminde popülerlik kazanmış ve eğitim sektöründe önemli değişikliklere yol açmıştır. Bu eğitim modelinin birçok avantajı bulunmaktadır.</p><p>Esneklik, maliyet tasarrufu ve erişilebilirlik gibi faktörler online eğitimi cazip kılmaktadır.</p>',
                    'en' => '<p>Online education has gained popularity, especially during the pandemic period, and has led to significant changes in the education sector. This education model has many advantages.</p><p>Factors such as flexibility, cost savings, and accessibility make online education attractive.</p>',
                    'ar' => '<p>اكتسب التعليم عبر الإنترنت شعبية، خاصة خلال فترة الوباء، وأدى إلى تغييرات مهمة في قطاع التعليم. هذا النموذج التعليمي له العديد من المزايا.</p><p>عوامل مثل المرونة وتوفير التكاليف وإمكانية الوصول تجعل التعليم عبر الإنترنت جذاباً.</p>',
                ],
                'slug' => [
                    'tr' => 'online-egitim-avantajlari',
                    'en' => 'online-education-advantages',
                    'ar' => 'مزايا-التعليم-عبر-الإنترنت',
                ],
                'post_type_id' => $blogPostType->id,
                'category_id' => $educationCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],

            // Page Posts
            [
                'title' => [
                    'tr' => 'Hakkımızda',
                    'en' => 'About Us',
                    'ar' => 'من نحن',
                ],
                'content' => [
                    'tr' => '<p>Kurumumuz, eğitim ve teknoloji alanında faaliyet gösteren öncü bir organizasyondur. Misyonumuz, kaliteli eğitim hizmetleri sunmak ve teknolojik gelişmelere katkıda bulunmaktır.</p><p>Vizyonumuz, geleceğin liderlerini yetiştirmek ve toplumsal gelişime katkı sağlamaktır.</p>',
                    'en' => '<p>Our institution is a leading organization operating in the field of education and technology. Our mission is to provide quality educational services and contribute to technological developments.</p><p>Our vision is to train future leaders and contribute to social development.</p>',
                    'ar' => '<p>مؤسستنا هي منظمة رائدة تعمل في مجال التعليم والتكنولوجيا. مهمتنا هي تقديم خدمات تعليمية عالية الجودة والمساهمة في التطورات التكنولوجية.</p><p>رؤيتنا هي تدريب قادة المستقبل والمساهمة في التنمية الاجتماعية.</p>',
                ],
                'slug' => [
                    'tr' => 'hakkimizda',
                    'en' => 'about-us',
                    'ar' => 'من-نحن',
                ],
                'post_type_id' => $pagePostType->id,
                'category_id' => $corporateCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'İletişim Bilgileri',
                    'en' => 'Contact Information',
                    'ar' => 'معلومات الاتصال',
                ],
                'content' => [
                    'tr' => '<p>Bizimle iletişime geçmek için aşağıdaki bilgileri kullanabilirsiniz:</p><ul><li>Telefon: +90 (212) 123 45 67</li><li>E-posta: info@example.com</li><li>Adres: İstanbul, Türkiye</li></ul>',
                    'en' => '<p>You can use the following information to contact us:</p><ul><li>Phone: +90 (212) 123 45 67</li><li>Email: info@example.com</li><li>Address: Istanbul, Turkey</li></ul>',
                    'ar' => '<p>يمكنك استخدام المعلومات التالية للتواصل معنا:</p><ul><li>الهاتف: +90 (212) 123 45 67</li><li>البريد الإلكتروني: info@example.com</li><li>العنوان: إسطنبول، تركيا</li></ul>',
                ],
                'slug' => [
                    'tr' => 'contact',
                    'en' => 'contact',
                    'ar' => 'contact',
                ],
                'post_type_id' => $pagePostType->id,
                'category_id' => $infoCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],

            // News Posts
            [
                'title' => [
                    'tr' => 'Yeni Eğitim Programı Duyurusu',
                    'en' => 'New Education Program Announcement',
                    'ar' => 'إعلان برنامج تعليمي جديد',
                ],
                'content' => [
                    'tr' => '<p>Kurumumuz tarafından yeni bir eğitim programı başlatılmıştır. Bu program, teknoloji alanında uzmanlaşmak isteyen öğrenciler için tasarlanmıştır.</p><p>Program detayları ve başvuru koşulları hakkında daha fazla bilgi için web sitemizi ziyaret edebilirsiniz.</p>',
                    'en' => '<p>A new education program has been launched by our institution. This program is designed for students who want to specialize in the field of technology.</p><p>For more information about program details and application conditions, you can visit our website.</p>',
                    'ar' => '<p>تم إطلاق برنامج تعليمي جديد من قبل مؤسستنا. هذا البرنامج مصمم للطلاب الذين يريدون التخصص في مجال التكنولوجيا.</p><p>لمزيد من المعلومات حول تفاصيل البرنامج وشروط التقديم، يمكنك زيارة موقعنا الإلكتروني.</p>',
                ],
                'slug' => [
                    'tr' => 'yeni-egitim-programi-duyurusu',
                    'en' => 'new-education-program-announcement',
                    'ar' => 'إعلان-برنامج-تعليمي-جديد',
                ],
                'post_type_id' => $newsPostType->id,
                'category_id' => $announcementCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],

            // Event Posts
            [
                'title' => [
                    'tr' => 'Teknoloji Konferansı 2024',
                    'en' => 'Technology Conference 2024',
                    'ar' => 'مؤتمر التكنولوجيا 2024',
                ],
                'content' => [
                    'tr' => '<p>Bu yıl düzenlenecek olan Teknoloji Konferansı\'na katılım için kayıtlar başlamıştır. Konferans, teknoloji alanındaki son gelişmeleri ele alacaktır.</p><p>Etkinlik tarihi: 15-17 Mart 2024</p><p>Yer: İstanbul Kongre Merkezi</p>',
                    'en' => '<p>Registrations have started for the Technology Conference to be held this year. The conference will address the latest developments in the field of technology.</p><p>Event date: March 15-17, 2024</p><p>Venue: Istanbul Convention Center</p>',
                    'ar' => '<p>بدأت التسجيلات لمؤتمر التكنولوجيا الذي سيعقد هذا العام. سيتناول المؤتمر أحدث التطورات في مجال التكنولوجيا.</p><p>تاريخ الفعالية: 15-17 مارس 2024</p><p>المكان: مركز إسطنبول للمؤتمرات</p>',
                ],
                'slug' => [
                    'tr' => 'teknoloji-konferansi-2024',
                    'en' => 'technology-conference-2024',
                    'ar' => 'مؤتمر-التكنولوجيا-2024',
                ],
                'post_type_id' => $eventPostType->id,
                'category_id' => $conferenceCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],

            // Tarf Faaliyet Alanları
            [
                'title' => [
                    'tr' => 'Akademi',
                    'en' => 'Academy',
                    'ar' => 'الأكاديمية',
                ],
                'content' => [
                    'tr' => '<p>Eğitim programlarıyla bireylerin bilgi ve becerilerini güçlendiriyoruz.</p>',
                    'en' => '<p>We strengthen individuals\' knowledge and skills through educational programs.</p>',
                    'ar' => '<p>نقوم بتعزيز معرفة ومهارات الأفراد من خلال البرامج التعليمية.</p>',
                ],
                'slug' => [
                    'tr' => 'akademi',
                    'en' => 'academy',
                    'ar' => 'الأكاديمية',
                ],
                'post_type_id' => $activityPostType->id,
                'category_id' => $educationCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Bilim ve Teknoloji Dergisi',
                    'en' => 'Science and Technology Magazine',
                    'ar' => 'مجلة العلوم والتكنولوجيا',
                ],
                'content' => [
                    'tr' => '<p>Üç ayda bir yayımlanan dergimiz gençlerin irfanla buluşmasını hedefliyor.</p>',
                    'en' => '<p>Our quarterly magazine aims to bring young people together with wisdom.</p>',
                    'ar' => '<p>تهدف مجلتنا الربعية إلى جمع الشباب مع الحكمة.</p>',
                ],
                'slug' => [
                    'tr' => 'bilim-teknoloji-dergisi',
                    'en' => 'science-technology-magazine',
                    'ar' => 'مجلة-العلوم-والتكنولوجيا',
                ],
                'post_type_id' => $activityPostType->id,
                'category_id' => $magazineCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Yazılım Teknolojileri',
                    'en' => 'Software Technologies',
                    'ar' => 'تكنولوجيا البرمجيات',
                ],
                'content' => [
                    'tr' => '<p>Proje bazlı yazılım ekipleriyle teknolojiye yenilik katıyoruz.</p>',
                    'en' => '<p>We bring innovation to technology with project-based software teams.</p>',
                    'ar' => '<p>نحن نضيف الابتكار إلى التكنولوجيا من خلال فرق البرمجيات القائمة على المشاريع.</p>',
                ],
                'slug' => [
                    'tr' => 'yazilim-teknolojileri',
                    'en' => 'software-technologies',
                    'ar' => 'تكنولوجيا-البرمجيات',
                ],
                'post_type_id' => $activityPostType->id,
                'category_id' => $techCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Teknoloji Takımları',
                    'en' => 'Technology Teams',
                    'ar' => 'فرق التكنولوجيا',
                ],
                'content' => [
                    'tr' => '<p>Öğrencilerden girişimcilere uzanan üretken topluluklar kuruyoruz.</p>',
                    'en' => '<p>We build productive communities from students to entrepreneurs.</p>',
                    'ar' => '<p>نحن نبني مجتمعات منتجة من الطلاب إلى رواد الأعمال.</p>',
                ],
                'slug' => [
                    'tr' => 'teknoloji-takimlari',
                    'en' => 'technology-teams',
                    'ar' => 'فرق-التكنولوجيا',
                ],
                'post_type_id' => $activityPostType->id,
                'category_id' => $teamCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Konferanslar',
                    'en' => 'Conferences',
                    'ar' => 'المؤتمرات',
                ],
                'content' => [
                    'tr' => '<p>Alanında uzman akademisyenlerle bilgi paylaşımını destekliyoruz.</p>',
                    'en' => '<p>We support knowledge sharing with expert academics in their fields.</p>',
                    'ar' => '<p>ندعم مشاركة المعرفة مع الأكاديميين الخبراء في مجالاتهم.</p>',
                ],
                'slug' => [
                    'tr' => 'konferanslar',
                    'en' => 'conferences',
                    'ar' => 'المؤتمرات',
                ],
                'post_type_id' => $activityPostType->id,
                'category_id' => $conferenceCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Teknoloji Mekan',
                    'en' => 'Technology Space',
                    'ar' => 'مساحة التكنولوجيا',
                ],
                'content' => [
                    'tr' => '<p>Fikir alışverişi, atölye ve networking etkinlikleriyle buluşma alanı sunuyoruz.</p>',
                    'en' => '<p>We provide a meeting space with idea exchange, workshops and networking events.</p>',
                    'ar' => '<p>نوفر مساحة لقاء مع تبادل الأفكار وورش العمل وفعاليات التواصل.</p>',
                ],
                'slug' => [
                    'tr' => 'teknoloji-mekan',
                    'en' => 'technology-space',
                    'ar' => 'مساحة-التكنولوجيا',
                ],
                'post_type_id' => $activityPostType->id,
                'category_id' => $techCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Sertifika Programları',
                    'en' => 'Certificate Programs',
                    'ar' => 'برامج الشهادات',
                ],
                'content' => [
                    'tr' => '<p>Resmi yeterlilikler ve uygulamalı öğrenim fırsatları sunuyoruz.</p>',
                    'en' => '<p>We offer official qualifications and hands-on learning opportunities.</p>',
                    'ar' => '<p>نوفر المؤهلات الرسمية وفرص التعلم العملي.</p>',
                ],
                'slug' => [
                    'tr' => 'sertifika-programlari',
                    'en' => 'certificate-programs',
                    'ar' => 'برامج-الشهادات',
                ],
                'post_type_id' => $activityPostType->id,
                'category_id' => $educationCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],

            // Teknoloji Takımları Projeleri
            [
                'title' => [
                    'tr' => 'TARF Rover - Uzay Keşif Takımı',
                    'en' => 'TARF Rover - Space Exploration Team',
                    'ar' => 'TARF Rover - فريق استكشاف الفضاء',
                ],
                'content' => [
                    'tr' => '<p>Mars keşif araçları ve uzay teknolojileri geliştirme projesi. Genç mühendislerimiz geleceğin uzay teknolojilerini tasarlıyor.</p>',
                    'en' => '<p>Mars exploration vehicles and space technology development project. Our young engineers are designing the space technologies of the future.</p>',
                    'ar' => '<p>مشروع تطوير مركبات استكشاف المريخ وتكنولوجيا الفضاء. مهندسونا الشباب يصممون تكنولوجيات الفضاء المستقبلية.</p>',
                ],
                'slug' => [
                    'tr' => 'tarf-rover-uzay-kesif-takimi',
                    'en' => 'tarf-rover-space-exploration-team',
                    'ar' => 'tarf-rover-فريق-استكشاف-الفضاء',
                ],
                'post_type_id' => $projectPostType->id,
                'category_id' => $teamCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'AI Team - Yapay Zekâ Projeleri',
                    'en' => 'AI Team - Artificial Intelligence Projects',
                    'ar' => 'فريق الذكاء الاصطناعي - مشاريع الذكاء الاصطناعي',
                ],
                'content' => [
                    'tr' => '<p>Makine öğrenmesi ve derin öğrenme uygulamaları geliştiren takımımız, yapay zekânın günlük hayattaki kullanımını araştırıyor.</p>',
                    'en' => '<p>Our team developing machine learning and deep learning applications researches the use of artificial intelligence in daily life.</p>',
                    'ar' => '<p>فريقنا الذي يطور تطبيقات التعلم الآلي والتعلم العميق يبحث في استخدام الذكاء الاصطناعي في الحياة اليومية.</p>',
                ],
                'slug' => [
                    'tr' => 'ai-team-yapay-zeka-projeleri',
                    'en' => 'ai-team-artificial-intelligence-projects',
                    'ar' => 'فريق-الذكاء-الاصطناعي-مشاريع-الذكاء-الاصطناعي',
                ],
                'post_type_id' => $projectPostType->id,
                'category_id' => $teamCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'EcoTech - Sürdürülebilir Teknoloji',
                    'en' => 'EcoTech - Sustainable Technology',
                    'ar' => 'EcoTech - التكنولوجيا المستدامة',
                ],
                'content' => [
                    'tr' => '<p>Çevre dostu teknoloji çözümleri ve yeşil enerji projeleri geliştiren takımımız, sürdürülebilir gelecek için çalışıyor.</p>',
                    'en' => '<p>Our team developing environmentally friendly technology solutions and green energy projects works for a sustainable future.</p>',
                    'ar' => '<p>فريقنا الذي يطور حلول التكنولوجيا الصديقة للبيئة ومشاريع الطاقة الخضراء يعمل من أجل مستقبل مستدام.</p>',
                ],
                'slug' => [
                    'tr' => 'ecotech-surdurulebilir-teknoloji',
                    'en' => 'ecotech-sustainable-technology',
                    'ar' => 'ecotech-التكنولوجيا-المستدامة',
                ],
                'post_type_id' => $projectPostType->id,
                'category_id' => $teamCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Code4Humanity - Sosyal Fayda Projeleri',
                    'en' => 'Code4Humanity - Social Impact Projects',
                    'ar' => 'Code4Humanity - مشاريع التأثير الاجتماعي',
                ],
                'content' => [
                    'tr' => '<p>Toplumsal sorunlara teknoloji ile çözüm üreten takımımız, sosyal fayda odaklı yazılım projeleri geliştiriyor.</p>',
                    'en' => '<p>Our team producing solutions to social problems with technology develops social impact-focused software projects.</p>',
                    'ar' => '<p>فريقنا الذي ينتج حلول للمشاكل الاجتماعية بالتكنولوجيا يطور مشاريع برمجية تركز على التأثير الاجتماعي.</p>',
                ],
                'slug' => [
                    'tr' => 'code4humanity-sosyal-fayda-projeleri',
                    'en' => 'code4humanity-social-impact-projects',
                    'ar' => 'code4humanity-مشاريع-التأثير-الاجتماعي',
                ],
                'post_type_id' => $projectPostType->id,
                'category_id' => $teamCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],

            // Dergi İçerikleri
            [
                'title' => [
                    'tr' => 'Yapay Zekâ ve İnsanlık - Eylül 2025',
                    'en' => 'Artificial Intelligence and Humanity - September 2025',
                    'ar' => 'الذكاء الاصطناعي والإنسانية - سبتمبر 2025',
                ],
                'content' => [
                    'tr' => '<p>Teknoloji, insanın irfanına yön verirse, geleceğin dili anlam olur. Bu sayımızda yapay zekânın insanlık üzerindeki etkilerini inceliyoruz.</p>',
                    'en' => '<p>If technology guides human wisdom, the language of the future becomes meaning. In this issue, we examine the effects of artificial intelligence on humanity.</p>',
                    'ar' => '<p>إذا وجهت التكنولوجيا حكمة الإنسان، أصبحت لغة المستقبل معنى. في هذا العدد، ندرس آثار الذكاء الاصطناعي على الإنسانية.</p>',
                ],
                'slug' => [
                    'tr' => 'yapay-zeka-insanlik-eylul-2025',
                    'en' => 'artificial-intelligence-humanity-september-2025',
                    'ar' => 'الذكاء-الاصطناعي-والإنسانية-سبتمبر-2025',
                ],
                'post_type_id' => $magazinePostType->id,
                'category_id' => $magazineCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
        ];

        foreach ($posts as $postData) {
            $post = Post::create([
                'title' => $postData['title'],
                'content' => $postData['content'],
                'slug' => $postData['slug'],
                'post_type_id' => $postData['post_type_id'],
                'category_id' => $postData['category_id'],
                'user_id' => $postData['user_id'],
                'status' => $postData['status'],
            ]);
        }
    }
}
