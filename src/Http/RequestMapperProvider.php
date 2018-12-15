<?php
declare(strict_types = 1);

namespace App\Http;

use App\Http\RequestData\RoomSearchRequestData;
use App\Http\RequestData\TeachersGetRequestData;
use Illuminate\Http\Request;

/**
 * Class RequestMapperProvider
 *
 * @package App\Http
 */
class RequestMapperProvider extends \Maksi\RequestMapperL\RequestMapperProvider
{
    /**
     * @param Request $request
     *
     * @return array
     */
    protected function resolveMap(Request $request): array
    {
        return [
            RoomSearchRequestData::class => [$request->all()],
            TeachersGetRequestData::class => [$request->all()],
        ];
    }
}
