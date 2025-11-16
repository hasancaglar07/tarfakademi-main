@echo off
echo ====================================
echo Laravel + Next.js Baslatma Scripti
echo ====================================
echo.

REM PHP ve Composer kontrol
echo [1/6] PHP kontrolu yapiliyor...
C:\xampp\php\php.exe -v
if errorlevel 1 (
    echo HATA: PHP bulunamadi! XAMPP kurulu mu?
    pause
    exit /b 1
)
echo ✓ PHP OK
echo.

echo [2/6] Composer kontrolu yapiliyor...
composer --version
if errorlevel 1 (
    echo HATA: Composer bulunamadi! Terminal'i yeniden baslatmayi deneyin.
    echo Veya Composer'i kurun: https://getcomposer.org
    pause
    exit /b 1
)
echo ✓ Composer OK
echo.

REM Composer install
echo [3/6] Laravel bagimliliklari kuruluyor...
if not exist "vendor\" (
    echo vendor klasoru yok, composer install calistiriliyor...
    composer install
    if errorlevel 1 (
        echo HATA: Composer install basarisiz!
        pause
        exit /b 1
    )
) else (
    echo ✓ vendor klasoru mevcut, atlaniyor
)
echo.

REM .env check
echo [4/6] .env dosyasi kontrol ediliyor...
if not exist ".env" (
    echo .env dosyasi yok, olusturuluyor...
    copy .env.example .env
    C:\xampp\php\php.exe artisan key:generate
) else (
    echo ✓ .env dosyasi mevcut
)
echo.

REM Laravel serve
echo [5/6] Laravel server baslatiliyor...
echo.
echo ====================================
echo Backend: http://localhost:8000
echo Admin:   http://localhost:8000/admin
echo API:     http://localhost:8000/api/v1/posts?locale=tr
echo ====================================
echo.
echo CTRL+C ile durdurun
echo.

C:\xampp\php\php.exe artisan serve