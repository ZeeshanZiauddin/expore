<?php

namespace App\Filament\Resources\EmailTemplateResource\Pages;

use App\Filament\Resources\EmailTemplateResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateEmailTemplate extends CreateRecord
{
    protected static string $resource = EmailTemplateResource::class;

    // public function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $data['blade_path'] = self::generateBladeFile($data['name'], $data['html_content']);
    //     return $data;
    // }

    // private function generateBladeFile($name, $html)
    // {
    //     $fileName = Str::slug($name) . '.blade.php';
    //     $path = "emails/templates/$fileName";

    //     // Save HTML content as Blade file
    //     Storage::disk('views')->put($path, $html);

    //     return str_replace('.blade.php', '', $path); // Store path without extension
    // }

}