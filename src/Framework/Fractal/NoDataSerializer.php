<?php
declare(strict_types = 1);

namespace App\Framework\Fractal;

use League\Fractal\Serializer\ArraySerializer;

/**
 * Class NoDataSerializer
 *
 * @package App\Framework\Fractal
 */
class NoDataSerializer extends ArraySerializer
{
    /**
     * @param string $resourceKey
     * @param array  $data
     *
     * @return array
     */
    public function collection($resourceKey, array $data): array
    {
        return $data;
    }
}
