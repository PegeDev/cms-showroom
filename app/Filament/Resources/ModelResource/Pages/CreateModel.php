<?php

namespace App\Filament\Resources\ModelResource\Pages;

use App\Filament\Resources\ModelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use function Laravel\Prompts\error;

class CreateModel extends CreateRecord
{
    protected static string $resource = ModelResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }
}
