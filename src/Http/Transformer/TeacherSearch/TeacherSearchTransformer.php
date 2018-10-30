<?php
declare(strict_types = 1);

namespace App\Http\Transformer\TeacherSearch;

use App\Domain\Teacher\Search\ResultData\AbstractTeacherSearchResultData;
use App\Http\Transformer\TeacherTransformer;
use League\Fractal\Resource\ResourceAbstract;
use League\Fractal\TransformerAbstract;

/**
 * Class TeacherSearchTransformer
 *
 * @package App\Http\Transformer\TeacherSearch
 */
class TeacherSearchTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['searched', 'suggest'];

    /**
     * @param AbstractTeacherSearchResultData $data
     *
     * @return array
     */
    public function transform(AbstractTeacherSearchResultData $data): array
    {
        return [

        ];
    }

    /**
     * @param AbstractTeacherSearchResultData $data
     *
     * @return ResourceAbstract
     */
    public function includeSearched(AbstractTeacherSearchResultData $data): ResourceAbstract
    {
        return $data->searched()
            ? $this->item($data->searched(), new TeacherTransformer())
            : $this->null();
    }

    /**
     * @param AbstractTeacherSearchResultData $data
     *
     * @return ResourceAbstract
     */
    public function includeSuggest(AbstractTeacherSearchResultData $data): ResourceAbstract
    {
        return $data->suggest()
            ? $this->collection($data->suggest(), new TeacherTransformer())
            : $this->null();
    }
}
