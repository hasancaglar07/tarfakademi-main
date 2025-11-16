import { api } from '@/lib/api'
import { normalizeLocale } from '@/lib/i18n'
import { buildPageMetadata } from '@/lib/seo'
import { Header } from '@/components/layout/header'
import { Footer } from '@/components/layout/footer'
import { Hero } from '@/components/sections/hero'
import { BlogSection } from '@/components/sections/blog-section'
import { VideoSection } from '@/components/sections/video-section'
import { EventsCarousel } from '@/components/sections/events-carousel'
import { ContactCTA } from '@/components/sections/contact-cta'
import { FutureContribution } from '@/components/sections/future-contribution'
import { StatsShowcase } from '@/components/sections/stats-showcase'
import { ValuePillars } from '@/components/sections/value-pillars'
import { StrategicPages } from '@/components/sections/strategic-pages'

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>
}) {
  const { locale: rawLocale } = await params
  const locale = normalizeLocale(rawLocale)
  return buildPageMetadata({ locale, page: 'home', pathSegments: [] })
}

export default async function Home({ 
  params 
}: { 
  params: Promise<{ locale: string }> 
}) {
  const { locale: rawLocale } = await params
  const locale = normalizeLocale(rawLocale)
  const data = await api.getHome(locale)

  return (
    <>
      <Header locale={locale} settings={data.settings} />
      
      <main className="min-h-screen bg-[linear-gradient(180deg,#fff4e7_0%,#fffefb_40%,#f7f7ff_100%)]">
        {/* Hero Section - Bilim, teknoloji ve irfan ile geleceği inşa ediyoruz */}
        <Hero locale={locale} data={data.heroes?.[0]} />

        {/* Events Carousel - Aktif etkinliklerimiz ve seminerler */}
        {data.events && data.events.length > 0 && (
          <EventsCarousel
            locale={locale}
            events={data.events}
          />
        )}

        {/* Blog Section - Düşünce yazıları, araştırmalar ve makaleler */}
        {data.blog_posts && data.blog_posts.length > 0 && (
          <BlogSection
            locale={locale}
            posts={data.blog_posts}
            categories={data.categories || []}
          />
        )}

        {/* Future Contribution - Projelerimiz ve teknoloji takımları */}
        <FutureContribution locale={locale} />

        {/* Value Pillars - Vizyonumuz ve değerlerimiz */}
        <ValuePillars locale={locale} />

        {/* Strategic Pages - Alt sayfalara giden bağlantılar */}
        <StrategicPages locale={locale} />

        {/* Video Section - Eğitim videoları ve konuşmalar */}
        {data.videos && data.videos.length > 0 && (
          <VideoSection
            locale={locale}
            videos={data.videos}
          />
        )}

        {/* Stats Showcase - Sayılarla TARF ekosistemi */}
        <StatsShowcase
          locale={locale}
          servicesCount={data.services?.length || 0}
          eventsCount={data.events?.length || 0}
          blogCount={data.blog_posts?.length || 0}
          videosCount={data.videos?.length || 0}
          podcastsCount={data.podcasts?.length || 0}
          categories={data.categories}
        />

        {/* Contact CTA - Bize ulaşın ve projelerimize katılın */}
        <ContactCTA locale={locale} settings={data.settings} />
      </main>

      <Footer locale={locale} settings={data.settings} />
    </>
  )
}
