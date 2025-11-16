<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Only add slug column if it doesn't exist
        if (! Schema::hasColumn('forms', 'slug')) {
            Schema::table('forms', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('name');
            });

            // Generate slugs for existing forms
            DB::table('forms')->get()->each(function ($form) {
                $slug = Str::slug($form->name);
                $originalSlug = $slug;
                $counter = 1;

                // Ensure unique slug
                while (DB::table('forms')->where('slug', $slug)->where('id', '!=', $form->id)->exists()) {
                    $slug = $originalSlug.'-'.$counter++;
                }

                DB::table('forms')->where('id', $form->id)->update(['slug' => $slug]);
            });

            // Make slug required and unique
            Schema::table('forms', function (Blueprint $table) {
                $table->string('slug')->nullable(false)->unique()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
