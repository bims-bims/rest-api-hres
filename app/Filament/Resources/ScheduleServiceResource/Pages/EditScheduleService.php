<?php

namespace App\Filament\Resources\ScheduleServiceResource\Pages;

use App\Filament\Resources\ScheduleServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScheduleService extends EditRecord
{
    protected static string $resource = ScheduleServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
