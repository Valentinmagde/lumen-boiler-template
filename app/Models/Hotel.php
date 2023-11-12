<?php
namespace App\Models\Api\V1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *  @OA\Xml(name="Hotel"),
 *  required={"name", "type", "postal_street", "postal_city", "tel", "	fax", 
 *   "url", "check_in", "check_out", "order_id", "menu_order_id",
 *   "video_code", "pms_property_code", "site_url", "latitude",
 *   "longitude", "facebook_url", "googleplus_url"
 *  },
 *  @OA\Property(property="hotel_id", type="integer", example="number"),
 *  @OA\Property(property="country_id", type="integer", example="number"),
 *  @OA\Property(property="region_id", type="integer", example="number"),
 *  @OA\Property(property="rating_id", type="integer", example="number"),
 *  @OA\Property(property="name", type="string", example="string"),
 *  @OA\Property(property="type", type="string", example="string"),
 *  @OA\Property(property="postal_street", type="string", example="string"),
 *  @OA\Property(property="postal_city", type="string", example="string"),
 *  @OA\Property(property="tel", type="string", example="string"),
 *  @OA\Property(property="fax", type="string", example="string"),
 *  @OA\Property(property="url", type="string", example="string"),
 *  @OA\Property(property="check_in", type="date", example="2022-07-22T14:00:00.000000Z"),
 *  @OA\Property(property="check_out", type="date", example="2022-07-22T14:00:00.000000Z"),
 *  @OA\Property(property="status", type="integer", example="number"),
 *  @OA\Property(property="valid_from", type="date", example="2022-07-22T14:00:00.000000Z"),
 *  @OA\Property(property="valid_to", type="date", example="2022-07-22T14:00:00.000000Z"),
 *  @OA\Property(property="thumb_image", type="string", example="string"),
 *  @OA\Property(property="default_image", type="string", example="string"),
 *  @OA\Property(property="order_id", type="integer", example="number"),
 *  @OA\Property(property="menu_order_id", type="integer", example="number"),
 *  @OA\Property(property="hotel_code", type="string", example="string"),
 *  @OA\Property(property="video_code", type="string", example="string"),
 *  @OA\Property(property="pms_property_code", type="integer", example="integer"),
 *  @OA\Property(property="rm_code", type="string", example="string"),
 *  @OA\Property(property="has_villa", type="integer", example="integer"),
 *  @OA\Property(property="has_golf", type="integer", example="integer"),
 *  @OA\Property(property="is_hotel", type="integer", example="integer"),
 *  @OA\Property(property="on_wedding_calendar", type="integer", example="integer"),
 *  @OA\Property(property="site_url", type="string", example="string"),
 *  @OA\Property(property="asterix_id", type="integer", example="integer"),
 *  @OA\Property(property="latitude", type="string", example="string"),
 *  @OA\Property(property="longitude", type="string", example="string"),
 *  @OA\Property(property="facebook_url", type="string", example="string"),
 *  @OA\Property(property="googleplus_url", type="string", example="string"),
 *  @OA\Property(property="reviewpro_script_url", type="string", example="string"),
 *  @OA\Property(property="doc_logo", type="string", example="string"),
 *  @OA\Property(property="status_report_order", type="integer", example="integer"),
 *  @OA\Property(property="on_status_report", type="integer", example="integer"),
 *  @OA\Property(property="wihp_id", type="integer", example="integer"),
 *  @OA\Property(property="ratetiger_code", type="integer", example="integer")
 * )
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
