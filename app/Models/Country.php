<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $table = 'country';
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

    public function countryIpv4(): HasOne
    {
        return $this->hasOne(CountryIpv4::class, 'country_name', 'name');
    }
}
