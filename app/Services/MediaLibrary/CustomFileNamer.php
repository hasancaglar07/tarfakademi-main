<?php

namespace App\Services\MediaLibrary;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\Support\FileNamer\FileNamer;

class CustomFileNamer extends FileNamer
{
    public function originalFileName(string $fileName): string
    {
        // Orijinal dosya için benzersiz bir isim
        return Str::uuid();
    }

    public function conversionFileName(string $fileName, Conversion $conversion): string
    {
        // Dönüştürülmüş dosya için benzersiz bir isim
        return Str::uuid().'-'.$conversion->getName();
    }

    public function responsiveFileName(string $fileName): string
    {
        // Responsive dosya için benzersiz bir isim
        return Str::uuid();
    }
}
