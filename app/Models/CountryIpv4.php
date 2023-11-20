<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CountryIpv4 extends Model
{
    protected $table = 'country_ipv4';

    protected $fillable = [
        'start_ip_num',
        'end_ip_num',
        'country_code_2',
        'country_code',
        'country_name',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_name', 'name');
    }
}
