<?php
namespace App\Filament\Resources\ScheduleServiceResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\ScheduleServiceResource;
use Illuminate\Routing\Router;


class ScheduleServiceApiService extends ApiService
{
    protected static string | null $resource = ScheduleServiceResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
