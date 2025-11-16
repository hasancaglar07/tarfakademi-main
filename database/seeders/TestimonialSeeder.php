<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostType;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get testimonial post type
        $testimonialPostType = PostType::where('name->tr', 'Referans')->first();

        if (! $testimonialPostType) {
            $this->command->error('Testimonial post type not found. Please run PostTypeSeeder first.');

            return;
        }

        // Get first user
        $user = User::first();
        if (! $user) {
            $this->command->error('No users found. Please create a user first.');

            return;
        }

        // Create a category for testimonials
        $category = Category::firstOrCreate([
            'name' => [
                'tr' => 'Müşteri Referansları',
                'en' => 'Customer Testimonials',
                'ar' => 'شهادات العملاء',
            ],
            'post_type_id' => $testimonialPostType->id,
        ]);

        $testimonials = [
            [
                'title' => [
                    'tr' => 'Shoko Mugikura',
                    'en' => 'Shoko Mugikura',
                    'ar' => 'شوكو موغيكورا',
                ],
                'excerpt' => [
                    'tr' => 'Karşılaştığım en iyi şablonlardan biri. Çok düzenli, harika tasarım stili ve kullanımı kolay.',
                    'en' => 'One of the best templates I have encountered. Very organized, great design style and easy to use.',
                    'ar' => 'واحدة من أفضل القوالب التي واجهتها. منظمة جداً، تصميم رائع وسهل الاستخدام.',
                ],
                'content' => [
                    'tr' => 'Karşılaştığım en iyi şablonlardan biri. Çok düzenli, harika tasarım stili ve kullanımı kolay. Bu platform sayesinde işlerimizi çok daha verimli hale getirdik.',
                    'en' => 'One of the best templates I have encountered. Very organized, great design style and easy to use. Thanks to this platform, we have made our work much more efficient.',
                    'ar' => 'واحدة من أفضل القوالب التي واجهتها. منظمة جداً، تصميم رائع وسهل الاستخدام. بفضل هذه المنصة، جعلنا عملنا أكثر كفاءة بكثير.',
                ],
                'slug' => [
                    'tr' => 'shoko-mugikura',
                    'en' => 'shoko-mugikura',
                    'ar' => 'shoko-mugikura',
                ],
            ],
            [
                'title' => [
                    'tr' => 'Matthew Taylor',
                    'en' => 'Matthew Taylor',
                    'ar' => 'ماثيو تايلور',
                ],
                'excerpt' => [
                    'tr' => 'Mükemmel bir eğitim deneyimi yaşadık. Profesyonel yaklaşım ve kaliteli içerikler.',
                    'en' => 'We had an excellent training experience. Professional approach and quality content.',
                    'ar' => 'كان لدينا تجربة تدريب ممتازة. نهج مهني ومحتوى عالي الجودة.',
                ],
                'content' => [
                    'tr' => 'Mükemmel bir eğitim deneyimi yaşadık. Profesyonel yaklaşım ve kaliteli içerikler. Ekibimizin gelişimine büyük katkı sağladı.',
                    'en' => 'We had an excellent training experience. Professional approach and quality content. It contributed greatly to the development of our team.',
                    'ar' => 'كان لدينا تجربة تدريب ممتازة. نهج مهني ومحتوى عالي الجودة. ساهم بشكل كبير في تطوير فريقنا.',
                ],
                'slug' => [
                    'tr' => 'matthew-taylor',
                    'en' => 'matthew-taylor',
                    'ar' => 'matthew-taylor',
                ],
            ],
            [
                'title' => [
                    'tr' => 'Herman Miller',
                    'en' => 'Herman Miller',
                    'ar' => 'هيرمان ميلر',
                ],
                'excerpt' => [
                    'tr' => 'Teknoloji alanında aldığımız eğitimler sayesinde şirketimizin dijital dönüşümü hızlandı.',
                    'en' => 'Thanks to the training we received in the field of technology, our company\'s digital transformation accelerated.',
                    'ar' => 'بفضل التدريب الذي تلقيناه في مجال التكنولوجيا، تسارع التحول الرقمي لشركتنا.',
                ],
                'content' => [
                    'tr' => 'Teknoloji alanında aldığımız eğitimler sayesinde şirketimizin dijital dönüşümü hızlandı. Uzman kadro ve güncel içeriklerle çok memnunuz.',
                    'en' => 'Thanks to the training we received in the field of technology, our company\'s digital transformation accelerated. We are very satisfied with the expert staff and up-to-date content.',
                    'ar' => 'بفضل التدريب الذي تلقيناه في مجال التكنولوجيا، تسارع التحول الرقمي لشركتنا. نحن راضون جداً عن الموظفين الخبراء والمحتوى المحدث.',
                ],
                'slug' => [
                    'tr' => 'herman-miller',
                    'en' => 'herman-miller',
                    'ar' => 'herman-miller',
                ],
            ],
        ];

        foreach ($testimonials as $testimonialData) {
            Post::create([
                'title' => $testimonialData['title'],
                'excerpt' => $testimonialData['excerpt'],
                'content' => $testimonialData['content'],
                'slug' => $testimonialData['slug'],
                'post_type_id' => $testimonialPostType->id,
                'category_id' => $category->id,
                'user_id' => $user->id,
                'status' => 'published',
                'is_published' => true,
                'is_featured' => false,
            ]);
        }

        $this->command->info('Testimonials created successfully.');
    }
}
