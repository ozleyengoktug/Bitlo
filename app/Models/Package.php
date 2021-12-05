<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $primaryKey = 'packages_id';

    protected $fillable = [
        'package_name',
        'package_status',
        'price',
        'priceUnit',
        'token',
        'start_date',
        'end_date'
    ];
}
