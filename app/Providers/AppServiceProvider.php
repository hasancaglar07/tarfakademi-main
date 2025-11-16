<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Health\Checks\Checks\BackupsCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\MeilisearchCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\QueueCheck;
use Spatie\Health\Checks\Checks\RedisCheck;
use Spatie\Health\Checks\Checks\RedisMemoryUsageCheck;
use Spatie\Health\Checks\Checks\ScheduleCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;
use Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Health::checks([
            // Core application checks
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),

            // Database checks
            DatabaseCheck::new(),

            BackupsCheck::new()
                ->locatedAt(storage_path('app/private/'.env('APP_NAME').'/*.zip'))
                ->youngestBackShouldHaveBeenMadeBefore(now()->subDays(1)),

            // Cache checks
            CacheCheck::new(),

            // System resource checks
            UsedDiskSpaceCheck::new()
                ->warnWhenUsedSpaceIsAbovePercentage(70)
                ->failWhenUsedSpaceIsAbovePercentage(90),

            // Queue and background job checks
            QueueCheck::new(),
            ScheduleCheck::new(),

            // Additional checks you can uncomment if needed:
            // RedisCheck::new(),
            // HorizonCheck::new(),
            // PingCheck::new()->url('https://example.com'),
            SecurityAdvisoriesCheck::new(),

            // MeilisearchCheck::new()->url(config('scout.meilisearch.host').'/health')->token(config('scout.meilisearch.key')),
            // RedisCheck::new(),
            // RedisMemoryUsageCheck::new()
            //     ->warnWhenAboveMb(900)
            //     ->failWhenAboveMb(1000),

        ]);
    }
}
