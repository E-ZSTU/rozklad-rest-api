<?php
declare(strict_types = 1);

namespace App\Http\SubstituteBinding;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Mockery\Exception;

/**
 * Class SubstituteBindingException
 *
 * @package App\Http\SubstituteBinding
 */
class SubstituteBindingException extends Exception implements Responsable
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        return JsonResponse::create([
            'message' => $this->getMessage(),
        ])->setStatusCode(Response::HTTP_NOT_FOUND);
    }
}