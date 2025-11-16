<x-app-layout>
    <x-page-title
        :title="$page->postType->getTranslation('name', app()->getLocale())"
        :subtitle="$page->title"/>



    <!-- start section -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="offset-lg-1 col-md-8 last-paragraph-no-margin text-center text-md-start">
                            <div class="blog-content">
                                {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make(
                                    $page->getTranslation('content', app()->getLocale()) ?:
                                    $page->getTranslation('content', 'tr') ?:
                                    $page->getTranslation('content', 'en') ?:
                                    [],
                                )->customBlocks([
                                        \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock::class,
                                        \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\CalloutBlock::class,
                                    ])->toHtml() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

</x-app-layout>
