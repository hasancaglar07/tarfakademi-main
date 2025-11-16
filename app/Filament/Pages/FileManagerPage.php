<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\File;

class FileManagerPage extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolder;

    protected static ?string $navigationLabel = 'Dosya Yöneticisi';

    protected static ?string $title = 'Dosya Yöneticisi';

    protected static ?int $navigationSort = 100;

    protected string $view = 'filament.pages.file-manager';

    public ?string $selectedFile = null;

    public ?string $fileContent = null;

    public ?string $selectedDirectory = 'views';

    public array $expandedFolders = [];

    public function mount(): void
    {
        // Mount işlemleri
    }

    public function toggleFolder(string $folderPath): void
    {
        if (in_array($folderPath, $this->expandedFolders)) {
            $this->expandedFolders = array_values(array_diff($this->expandedFolders, [$folderPath]));
        } else {
            $this->expandedFolders[] = $folderPath;
        }
    }

    public function isFolderExpanded(string $folderPath): bool
    {
        return in_array($folderPath, $this->expandedFolders);
    }

    public function isPathVisible(string $path, string $basePath): bool
    {
        // Root level items are always visible
        if (dirname($path) === $basePath) {
            return true;
        }

        // Check all parent directories
        $currentPath = dirname($path);
        while ($currentPath !== $basePath && $currentPath !== dirname($currentPath)) {
            if (! $this->isFolderExpanded($currentPath)) {
                return false;
            }
            $currentPath = dirname($currentPath);
        }

        return true;
    }

    public function getFiles(?string $directory = null): array
    {
        $basePath = resource_path('views');
        $files = [];

        if (File::exists($basePath)) {
            $this->buildFileTree($basePath, $basePath, $files);
        }

        return [
            'files' => $files,
            'basePath' => $basePath,
        ];
    }

    protected function buildFileTree(string $basePath, string $currentPath, array &$files, int $depth = 0): void
    {
        $items = File::glob($currentPath.'/*');

        if (empty($items)) {
            return;
        }

        // Separate directories and files
        $directories = [];
        $regularFiles = [];

        foreach ($items as $item) {
            $filename = basename($item);

            // Skip hidden files
            if (str_starts_with($filename, '.')) {
                continue;
            }

            if (File::isDirectory($item)) {
                $directories[] = $item;
            } else {
                $regularFiles[] = $item;
            }
        }

        // Sort directories and files alphabetically
        sort($directories);
        sort($regularFiles);

        // First add all directories
        foreach ($directories as $dir) {
            $filename = basename($dir);
            $relativePath = str_replace($basePath.'/', '', $dir);

            $files[] = [
                'name' => $filename,
                'path' => null,
                'full_path' => $dir,
                'is_directory' => true,
                'depth' => $depth,
                'relative_path' => $relativePath,
                'size' => 0,
                'modified' => File::lastModified($dir),
            ];

            // Recursively add files from subdirectory
            $this->buildFileTree($basePath, $dir, $files, $depth + 1);
        }

        // Then add all files
        foreach ($regularFiles as $file) {
            $filename = basename($file);

            $files[] = [
                'name' => $filename,
                'path' => $file,
                'parent_path' => $currentPath,
                'is_directory' => false,
                'depth' => $depth,
                'relative_path' => str_replace($basePath.'/', '', $file),
                'size' => File::size($file),
                'modified' => File::lastModified($file),
            ];
        }
    }

    public function getAssetFiles(): array
    {
        $basePath = public_path('assets');
        $files = [];

        if (File::exists($basePath)) {
            $this->buildAssetFileTree($basePath, $basePath, $files);
        }

        return [
            'files' => $files,
            'basePath' => $basePath,
        ];
    }

    protected function buildAssetFileTree(string $basePath, string $currentPath, array &$files, int $depth = 0): void
    {
        $items = File::glob($currentPath.'/*');

        if (empty($items)) {
            return;
        }

        // Separate directories and files
        $directories = [];
        $regularFiles = [];

        foreach ($items as $item) {
            $filename = basename($item);

            // Skip hidden files
            if (str_starts_with($filename, '.')) {
                continue;
            }

            if (File::isDirectory($item)) {
                $directories[] = $item;
            } else {
                $regularFiles[] = $item;
            }
        }

        // Sort directories and files alphabetically
        sort($directories);
        sort($regularFiles);

        // First add all directories
        foreach ($directories as $dir) {
            $filename = basename($dir);
            $relativePath = str_replace($basePath.'/', '', $dir);

            $files[] = [
                'name' => $filename,
                'path' => null,
                'full_path' => $dir,
                'is_directory' => true,
                'depth' => $depth,
                'relative_path' => $relativePath,
                'size' => 0,
                'modified' => File::lastModified($dir),
            ];

            // Recursively add files from subdirectory
            $this->buildAssetFileTree($basePath, $dir, $files, $depth + 1);
        }

        // Then add all files
        foreach ($regularFiles as $file) {
            $filename = basename($file);

            $files[] = [
                'name' => $filename,
                'path' => $file,
                'parent_path' => $currentPath,
                'is_directory' => false,
                'depth' => $depth,
                'relative_path' => str_replace($basePath.'/', '', $file),
                'size' => File::size($file),
                'modified' => File::lastModified($file),
            ];
        }
    }

    public function selectFile(string $filePath): void
    {
        $this->selectedFile = $filePath;

        if (File::exists($filePath)) {
            $this->fileContent = File::get($filePath);
        }
    }

    public function saveFile(): void
    {
        if (! $this->selectedFile || ! $this->fileContent) {
            Notification::make()
                ->title('Hata')
                ->body('Dosya seçilmemiş veya içerik boş')
                ->danger()
                ->send();

            return;
        }

        try {
            File::put($this->selectedFile, $this->fileContent);

            Notification::make()
                ->title('Başarılı')
                ->body('Dosya başarıyla kaydedildi')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Hata')
                ->body('Dosya kaydedilemedi: '.$e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function getCurrentFiles(): array
    {
        if ($this->selectedDirectory === 'assets') {
            return $this->getAssetFiles();
        }

        return $this->getFiles($this->selectedDirectory);
    }
}
