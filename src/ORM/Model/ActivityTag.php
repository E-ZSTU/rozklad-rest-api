<?php
declare(strict_types = 1);

namespace App\ORM\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Day
 *
 * @property int    $activity_tag_id
 * @property string $activity_tag_name
 *
 * @package App\ORM\Model
 */
class ActivityTag extends Model
{
    /**
     * @var string
     */
    protected $table = 'activities_tags';
}
