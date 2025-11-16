<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostType;
use App\Models\User;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get service post type (using existing "Proje" post type for services)
        $servicePostType = PostType::where('name->tr', 'Proje')->first();

        // Get service categories (using existing categories)
        $consultingCategory = Category::where('name->tr', 'Teknoloji')->first();
        $educationServiceCategory = Category::where('name->tr', 'Eğitim')->first();
        $technicalSupportCategory = Category::where('name->tr', 'Teknoloji Takımları')->first();

        // Get user
        $user = User::first();

        $services = [
            [
                'title' => [
                    'tr' => 'Teknoloji Danışmanlığı',
                    'en' => 'Technology Consulting',
                    'ar' => 'استشارات التكنولوجيا',
                ],
                'content' => [
                    'tr' => '<p>Kurumların teknoloji altyapılarını optimize etmek ve dijital dönüşüm süreçlerinde rehberlik sağlamak için profesyonel danışmanlık hizmeti sunuyoruz.</p><h3>Hizmet Kapsamı:</h3><ul><li>Teknoloji altyapı analizi</li><li>Dijital dönüşüm stratejisi</li><li>Sistem entegrasyonu</li><li>Güvenlik değerlendirmesi</li></ul><p>Deneyimli uzman ekibimizle, işletmenizin teknoloji ihtiyaçlarını karşılamak için kapsamlı çözümler sunuyoruz.</p>',
                    'en' => '<p>We provide professional consulting services to optimize organizations\' technology infrastructure and provide guidance in digital transformation processes.</p><h3>Service Scope:</h3><ul><li>Technology infrastructure analysis</li><li>Digital transformation strategy</li><li>System integration</li><li>Security assessment</li></ul><p>With our experienced expert team, we provide comprehensive solutions to meet your business\'s technology needs.</p>',
                    'ar' => '<p>نقدم خدمات استشارية مهنية لتحسين البنية التحتية التكنولوجية للمؤسسات وتقديم التوجيه في عمليات التحول الرقمي.</p><h3>نطاق الخدمة:</h3><ul><li>تحليل البنية التحتية التكنولوجية</li><li>استراتيجية التحول الرقمي</li><li>تكامل الأنظمة</li><li>تقييم الأمان</li></ul><p>مع فريق الخبراء ذوي الخبرة لدينا، نقدم حلولاً شاملة لتلبية احتياجات تكنولوجيا عملك.</p>',
                ],
                'slug' => [
                    'tr' => 'teknoloji-danismanligi',
                    'en' => 'technology-consulting',
                    'ar' => 'استشارات-التكنولوجيا',
                ],
                'post_type_id' => $servicePostType->id,
                'category_id' => $consultingCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Online Eğitim Platformu',
                    'en' => 'Online Education Platform',
                    'ar' => 'منصة التعليم عبر الإنترنت',
                ],
                'content' => [
                    'tr' => '<p>Modern eğitim teknolojileri kullanarak interaktif ve etkili öğrenme deneyimleri sunan kapsamlı online eğitim platformu hizmeti.</p><h3>Platform Özellikleri:</h3><ul><li>Canlı dersler ve webinar\'lar</li><li>İnteraktif içerik ve materyaller</li><li>Öğrenci takip sistemi</li><li>Sertifika programları</li><li>Mobil uygulama desteği</li></ul><p>Eğitim kurumları ve bireysel öğrenciler için özelleştirilebilir çözümler sunuyoruz.</p>',
                    'en' => '<p>Comprehensive online education platform service that offers interactive and effective learning experiences using modern educational technologies.</p><h3>Platform Features:</h3><ul><li>Live lessons and webinars</li><li>Interactive content and materials</li><li>Student tracking system</li><li>Certificate programs</li><li>Mobile application support</li></ul><p>We provide customizable solutions for educational institutions and individual students.</p>',
                    'ar' => '<p>خدمة منصة تعليمية شاملة عبر الإنترنت تقدم تجارب تعلم تفاعلية وفعالة باستخدام تقنيات التعليم الحديثة.</p><h3>ميزات المنصة:</h3><ul><li>دروس مباشرة وندوات عبر الإنترنت</li><li>محتوى ومواد تفاعلية</li><li>نظام تتبع الطلاب</li><li>برامج شهادات</li><li>دعم تطبيق الهاتف المحمول</li></ul><p>نقدم حلولاً قابلة للتخصيص للمؤسسات التعليمية والطلاب الأفراد.</p>',
                ],
                'slug' => [
                    'tr' => 'online-egitim-platformu',
                    'en' => 'online-education-platform',
                    'ar' => 'منصة-التعليم-عبر-الإنترنت',
                ],
                'post_type_id' => $servicePostType->id,
                'category_id' => $educationServiceCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => '7/24 Teknik Destek',
                    'en' => '24/7 Technical Support',
                    'ar' => 'الدعم التقني على مدار الساعة',
                ],
                'content' => [
                    'tr' => '<p>Kurumların teknoloji sistemlerinin kesintisiz çalışmasını sağlamak için 7/24 teknik destek hizmeti sunuyoruz.</p><h3>Destek Hizmetleri:</h3><ul><li>Uzaktan sistem yönetimi</li><li>Proaktif izleme ve bakım</li><li>Acil müdahale hizmeti</li><li>Sistem güncellemeleri</li><li>Performans optimizasyonu</li><li>Güvenlik yönetimi</li></ul><p>Deneyimli teknik ekibimiz, sistemlerinizin her zaman en iyi performansta çalışmasını sağlar.</p>',
                    'en' => '<p>We provide 24/7 technical support service to ensure uninterrupted operation of organizations\' technology systems.</p><h3>Support Services:</h3><ul><li>Remote system management</li><li>Proactive monitoring and maintenance</li><li>Emergency intervention service</li><li>System updates</li><li>Performance optimization</li><li>Security management</li></ul><p>Our experienced technical team ensures that your systems always operate at the best performance.</p>',
                    'ar' => '<p>نقدم خدمة دعم تقني على مدار الساعة لضمان التشغيل غير المنقطع لأنظمة التكنولوجيا للمؤسسات.</p><h3>خدمات الدعم:</h3><ul><li>إدارة الأنظمة عن بُعد</li><li>المراقبة والصيانة الاستباقية</li><li>خدمة التدخل في حالات الطوارئ</li><li>تحديثات النظام</li><li>تحسين الأداء</li><li>إدارة الأمان</li></ul><p>فريقنا التقني ذو الخبرة يضمن أن أنظمتك تعمل دائماً بأفضل أداء.</p>',
                ],
                'slug' => [
                    'tr' => '7-24-teknik-destek',
                    'en' => '24-7-technical-support',
                    'ar' => 'الدعم-التقني-على-مدار-الساعة',
                ],
                'post_type_id' => $servicePostType->id,
                'category_id' => $technicalSupportCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Yazılım Geliştirme Hizmetleri',
                    'en' => 'Software Development Services',
                    'ar' => 'خدمات تطوير البرمجيات',
                ],
                'content' => [
                    'tr' => '<p>İşletmenizin ihtiyaçlarına özel yazılım çözümleri geliştiriyoruz. Web uygulamalarından mobil uygulamalara kadar geniş bir yelpazede hizmet sunuyoruz.</p><h3>Geliştirme Alanları:</h3><ul><li>Web uygulamaları</li><li>Mobil uygulamalar (iOS/Android)</li><li>E-ticaret platformları</li><li>Kurumsal yazılımlar</li><li>API geliştirme</li><li>Veritabanı tasarımı</li></ul><p>Modern teknolojiler ve en iyi uygulamalar kullanarak kaliteli yazılım çözümleri üretiyoruz.</p>',
                    'en' => '<p>We develop custom software solutions for your business needs. We provide services in a wide range from web applications to mobile applications.</p><h3>Development Areas:</h3><ul><li>Web applications</li><li>Mobile applications (iOS/Android)</li><li>E-commerce platforms</li><li>Enterprise software</li><li>API development</li><li>Database design</li></ul><p>We produce quality software solutions using modern technologies and best practices.</p>',
                    'ar' => '<p>نطور حلول برمجيات مخصصة لاحتياجات عملك. نقدم خدمات في نطاق واسع من التطبيقات الويب إلى التطبيقات المحمولة.</p><h3>مجالات التطوير:</h3><ul><li>تطبيقات الويب</li><li>تطبيقات الهاتف المحمول (iOS/Android)</li><li>منصات التجارة الإلكترونية</li><li>برمجيات المؤسسات</li><li>تطوير واجهات برمجة التطبيقات</li><li>تصميم قواعد البيانات</li></ul><p>ننتج حلول برمجيات عالية الجودة باستخدام التقنيات الحديثة وأفضل الممارسات.</p>',
                ],
                'slug' => [
                    'tr' => 'yazilim-gelistirme-hizmetleri',
                    'en' => 'software-development-services',
                    'ar' => 'خدمات-تطوير-البرمجيات',
                ],
                'post_type_id' => $servicePostType->id,
                'category_id' => $consultingCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
            [
                'title' => [
                    'tr' => 'Siber Güvenlik Hizmetleri',
                    'en' => 'Cybersecurity Services',
                    'ar' => 'خدمات الأمن السيبراني',
                ],
                'content' => [
                    'tr' => '<p>Kurumların dijital varlıklarını korumak için kapsamlı siber güvenlik hizmetleri sunuyoruz. Modern tehditlere karşı proaktif koruma sağlıyoruz.</p><h3>Güvenlik Hizmetleri:</h3><ul><li>Güvenlik değerlendirmesi ve testleri</li><li>Penetrasyon testleri</li><li>Güvenlik izleme ve analiz</li><li>Incident response</li><li>Güvenlik eğitimleri</li><li>Compliance danışmanlığı</li></ul><p>Uzman güvenlik ekibimizle, kurumunuzun siber güvenlik ihtiyaçlarını karşılıyoruz.</p>',
                    'en' => '<p>We provide comprehensive cybersecurity services to protect organizations\' digital assets. We provide proactive protection against modern threats.</p><h3>Security Services:</h3><ul><li>Security assessment and tests</li><li>Penetration tests</li><li>Security monitoring and analysis</li><li>Incident response</li><li>Security training</li><li>Compliance consulting</li></ul><p>With our expert security team, we meet your organization\'s cybersecurity needs.</p>',
                    'ar' => '<p>نقدم خدمات أمن سيبراني شاملة لحماية الأصول الرقمية للمؤسسات. نقدم حماية استباقية ضد التهديدات الحديثة.</p><h3>خدمات الأمان:</h3><ul><li>تقييم واختبارات الأمان</li><li>اختبارات الاختراق</li><li>مراقبة وتحليل الأمان</li><li>الاستجابة للحوادث</li><li>التدريب على الأمان</li><li>استشارات الامتثال</li></ul><p>مع فريق الأمان الخبير لدينا، نلبي احتياجات الأمن السيبراني لمؤسستك.</p>',
                ],
                'slug' => [
                    'tr' => 'siber-guvenlik-hizmetleri',
                    'en' => 'cybersecurity-services',
                    'ar' => 'خدمات-الأمن-السيبراني',
                ],
                'post_type_id' => $servicePostType->id,
                'category_id' => $technicalSupportCategory->id,
                'user_id' => $user->id,
                'status' => 'published',
            ],
        ];

        foreach ($services as $serviceData) {
            $service = Post::create([
                'title' => $serviceData['title'],
                'content' => $serviceData['content'],
                'slug' => $serviceData['slug'],
                'post_type_id' => $serviceData['post_type_id'],
                'category_id' => $serviceData['category_id'],
                'user_id' => $serviceData['user_id'],
                'status' => $serviceData['status'],
            ]);
        }
    }
}
