<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CountryIpv4 extends Model
{
    protected $table = 'Country_IPv4';

    protected $fillable = [
        'start_ip_num',
        'end_ip_num',
        'country_code_2',
        'country_code',
        'country_name',
    ];

    /**
     * Get the corresponding country of an ipv4.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @return CountryIpv4
     */
    public function country()
    {
            return $this->belongsTo(Country::class, 'country_name', 'name');
    }
}
