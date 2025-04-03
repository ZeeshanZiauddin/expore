<?php

namespace App\Filament\Resources\EmailTemplateResource\Pages;

use App\Filament\Resources\EmailTemplateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditEmailTemplate extends EditRecord
{
    protected static string $resource = EmailTemplateResource::class;

    // public function mutateFormDataBeforeSave(array $data): array
    // {
    //     // Fetch the existing template (if updating)
    //     $existingTemplate = $this->getRecord();

    //     if ($existingTemplate && !empty($existingTemplate->blade_path)) {
    //         self::deleteBladeFile($existingTemplate->blade_path);
    //     }

    //     // Generate new Blade file
    //     $data['blade_path'] = self::generateBladeFile($data['name'], $data['html_content']);

    //     return $data;
    // }

    // private function generateBladeFile($name, $html)
    // {
    //     $fileName = Str::slug($name) . '.blade.php';
    //     $path = "emails/templates/$fileName";

    //     // Save new HTML content as Blade file
    //     Storage::disk('views')->put($path, $html);

    //     return str_replace('.blade.php', '', $path); // Store path without extension
    // }

    // private static function deleteBladeFile($bladePath)
    // {
    //     $fullPath = "emails/templates/{$bladePath}.blade.php";

    //     if (Storage::disk('views')->exists($fullPath)) {
    //         Storage::disk('views')->delete($fullPath);
    //     }
    // }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}