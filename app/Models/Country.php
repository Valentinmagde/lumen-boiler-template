<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'Country';
    protected $primaryKey = 'country_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'iso_code',
        'iso_code_2',
        'iso_code_3',
        'phone_country_code',
        'valid_from',
        'valid_to',
    ];

    protected $dates = [
        'valid_from',
        'valid_to',
    ];

    /**
     * Get the corresponding ipv4 of a country.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @return CountryIpv4
     */
    public function ipv4()
    {
        return $this->hasOne(CountryIpv4::class, 'iso_code_2', 'country_code_2');
    }
}
