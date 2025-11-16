<?php

namespace App\Filament\Widgets;

use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Artisan;

class CacheClearWidget extends Widget
{
    protected string $view = 'filament.widgets.cache-clear-widget';

    protected int|string|array $columnSpan = 'full';

    public function clearApplicationCache(): void
    {
        try {
            Artisan::call('cache:clear');

            Notification::make()
                ->title('Önbellek Temizlendi')
                ->body('Uygulama önbelleği başarıyla temizlendi.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Hata')
                ->body('Önbellek temizlenirken bir hata oluştu: '.$e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function clearConfigCache(): void
    {
        try {
            Artisan::call('config:clear');

            Notification::make()
                ->title('Config Önbelleği Temizlendi')
                ->body('Yapılandırma önbelleği başarıyla temizlendi.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Hata')
                ->body('Config önbelleği temizlenirken bir hata oluştu: '.$e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function clearRouteCache(): void
    {
        try {
            Artisan::call('route:clear');

            Notification::make()
                ->title('Route Önbelleği Temizlendi')
                ->body('Yönlendirme önbelleği başarıyla temizlendi.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Hata')
                ->body('Route önbelleği temizlenirken bir hata oluştu: '.$e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function clearViewCache(): void
    {
        try {
            Artisan::call('view:clear');

            Notification::make()
                ->title('View Önbelleği Temizlendi')
                ->body('Görünüm önbelleği başarıyla temizlendi.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Hata')
                ->body('View önbelleği temizlenirken bir hata oluştu: '.$e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function clearAllCaches(): void
    {
        try {
            Artisan::call('optimize:clear');

            Notification::make()
                ->title('Tüm Önbellekler Temizlendi')
                ->body('Tüm uygulama önbellekleri başarıyla temizlendi.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Hata')
                ->body('Önbellekler temizlenirken bir hata oluştu: '.$e->getMessage())
                ->danger()
                ->send();
        }
    }
}
