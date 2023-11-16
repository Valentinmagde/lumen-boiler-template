<?php
namespace App\Models\Api\V1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Hotel
 * 
 * @property int $hotel_id
 * @property int $country_id
 * @property int $region_id
 * @property int $rating_id
 * @property string $name
 * @property string $type
 * @property string $postal_street
 * @property string $postal_city
 * @property string $tel
 * @property string $fax
 * @property string $url
 * @property Carbon $check_in
 * @property Carbon $check_out
 * @property string $status
 * @property Carbon $valid_from
 * @property Carbon $valid_to
 * @property string|null $thumb_image
 * @property string|null $default_image
 * @property int $order_id
 * @property int $menu_order_id
 * @property string|null $hotel_code
 * @property string $video_code
 * @property string $pms_property_code
 * @property string $rm_code
 * @property int $has_villa
 * @property int $has_golf
 * @property int $is_hotel
 * @property int $on_wedding_calendar
 * @property string $site_url
 * @property int $asterix_id
 * @property string $latitude
 * @property string $longitude
 * @property string $facebook_url
 * @property string $googleplus_url
 * @property string|null $reviewpro_script_url
 * @property string|null $doc_logo
 * @property int|null $status_report_order
 * @property int $on_status_report
 * @property int $wihp_id
 * @property int $ratetiger_code
 *
 * @package App\Models
 */
class Hotel extends Model
{
	use SoftDeletes;
	
	protected $table = 'hotel';
	protected $primaryKey = 'hotel_id';
	public $timestamps = false;

	protected $casts = [
		'country_id' => 'int',
		'region_id' => 'int',
		'rating_id' => 'int',
		'order_id' => 'int',
		'menu_order_id' => 'int',
		'has_villa' => 'int',
		'has_golf' => 'int',
		'is_hotel' => 'int',
		'on_wedding_calendar' => 'int',
		'asterix_id' => 'int',
		'status_report_order' => 'int',
		'on_status_report' => 'int',
		'wihp_id' => 'int',
		'ratetiger_code' => 'int'
	];

	protected $dates = [
		'check_in',
		'check_out',
		'valid_from',
		'valid_to'
	];

	protected $fillable = [
		'country_id',
		'region_id',
		'rating_id',
		'name',
		'type',
		'postal_street',
		'postal_city',
		'tel',
		'fax',
		'url',
		'check_in',
		'check_out',
		'status',
		'valid_from',
		'valid_to',
		'thumb_image',
		'default_image',
		'order_id',
		'menu_order_id',
		'hotel_code',
		'video_code',
		'pms_property_code',
		'rm_code',
		'has_villa',
		'has_golf',
		'is_hotel',
		'on_wedding_calendar',
		'site_url',
		'asterix_id',
		'latitude',
		'longitude',
		'facebook_url',
		'googleplus_url',
		'reviewpro_script_url',
		'doc_logo',
		'status_report_order',
		'on_status_report',
		'wihp_id',
		'ratetiger_code'
	];
}
