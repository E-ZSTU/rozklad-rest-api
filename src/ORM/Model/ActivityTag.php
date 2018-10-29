<?php
declare(strict_types = 1);

namespace App\ORM\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Day
 *
 * @property int    $day_id
 * @property string $day_name
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
