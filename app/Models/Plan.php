<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'majal_awl',
        'hadf_istratiji',
        'hadf_tachghili',
        'mohima',
        'wasf_mohima',
        'date_start',
        'date_end',
        'al_moda',
        'adaa_idara',
        'adaa_madariss',
        'nokat_qiass',
        'ijraat',
        'amakin_tanfid',
        'asalib_tanfid',
        'aljihat_mosanida'
    ];
}
