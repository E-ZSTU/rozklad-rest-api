<?php
declare(strict_types = 1);

namespace App\Http\Transformer\RoomSearch;

use App\Domain\Room\Search\ResultData\AbstractRoomSearchResultData;
use App\Http\Transformer\RoomTransformer;
use League\Fractal\Resource\ResourceAbstract;
use League\Fractal\TransformerAbstract;

/**
 * Class RoomSearchTransformer
 *
 * @package App\Http\Transformer\RoomSearch
 */
class RoomSearchTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['searched', 'suggest'];

    /**
     * @param AbstractRoomSearchResultData $data
     *
     * @return array
     */
    public function transform(AbstractRoomSearchResultData $data): array
    {
        return [

        ];
    }

    /**
     * @param AbstractRoomSearchResultData $data
     *
     * @return ResourceAbstract
     */
    public function includeSearched(AbstractRoomSearchResultData $data): ResourceAbstract
    {
        return $data->searched()
            ? $this->item($data->searched(), new RoomTransformer())
            : $this->null();
    }

    /**
     * @param AbstractRoomSearchResultData $data
     *
     * @return ResourceAbstract
     */
    public function includeSuggest(AbstractRoomSearchResultData $data): ResourceAbstract
    {
        return $data->suggest()
            ? $this->collection($data->suggest(), new RoomTransformer())
            : $this->null();
    }
}
