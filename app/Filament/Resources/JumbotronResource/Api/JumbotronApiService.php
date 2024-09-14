<?php
namespace App\Filament\Resources\JumbotronResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\JumbotronResource;
use Illuminate\Routing\Router;


class JumbotronApiService extends ApiService
{
    protected static string | null $resource = JumbotronResource::class;

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
