<?php

namespace App\Filament\Resources\ScheduleServiceResource\Pages;

use App\Filament\Resources\ScheduleServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateScheduleService extends CreateRecord
{
    protected static string $resource = ScheduleServiceResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
