<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            <div class="flex items-center gap-2">
                <x-filament::icon
                    icon="heroicon-o-arrow-path"
                    class="h-5 w-5 text-gray-500 dark:text-gray-400"
                />
                <span>Önbellek Yönetimi</span>
            </div>
        </x-slot>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <x-filament::button
                color="primary"
                icon="heroicon-o-trash"
                wire:click="clearApplicationCache"
                class="w-full"
            >
                Uygulama Önbelleği
            </x-filament::button>

            <x-filament::button
                color="info"
                icon="heroicon-o-cog-6-tooth"
                wire:click="clearConfigCache"
                class="w-full"
            >
                Config Önbelleği
            </x-filament::button>

            <x-filament::button
                color="warning"
                icon="heroicon-o-map"
                wire:click="clearRouteCache"
                class="w-full"
            >
                Route Önbelleği
            </x-filament::button>

            <x-filament::button
                color="success"
                icon="heroicon-o-eye"
                wire:click="clearViewCache"
                class="w-full"
            >
                View Önbelleği
            </x-filament::button>

            <x-filament::button
                color="danger"
                icon="heroicon-o-fire"
                wire:click="clearAllCaches"
                class="w-full md:col-span-2 lg:col-span-1"
            >
                Tüm Önbellekler
            </x-filament::button>
        </div>

        <div class="mt-4">
            <x-filament::section>
                <x-slot name="heading">
                    <div class="flex items-center gap-2 text-sm">
                        <x-filament::icon
                            icon="heroicon-o-information-circle"
                            class="h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <span>Önbellek Bilgisi</span>
                    </div>
                </x-slot>

                <div class="text-sm text-gray-600 dark:text-gray-400">
                    <ul class="list-inside list-disc space-y-1">
                        <li><strong>Uygulama Önbelleği:</strong> Genel uygulama verilerini temizler</li>
                        <li><strong>Config Önbelleği:</strong> Yapılandırma dosyalarını temizler</li>
                        <li><strong>Route Önbelleği:</strong> Yönlendirme önbelleğini temizler</li>
                        <li><strong>View Önbelleği:</strong> Derlenmiş görünüm dosyalarını temizler</li>
                        <li><strong>Tüm Önbellekler:</strong> Yukarıdaki tüm önbellekleri toplu olarak temizler</li>
                    </ul>
                </div>
            </x-filament::section>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>

