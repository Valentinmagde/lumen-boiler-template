<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'Language';
    protected $primaryKey = 'language_id';
    public $timestamps = false;

    protected $fillable = [
        'language',
        'language_iso_code',
        'language_flag_name',
        'language_web',
        'language_paybox',
    ];
}
