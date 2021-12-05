<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPackage extends Model
{
    use HasFactory;

    protected $table = 'company_packages';
    protected $primaryKey = 'company_packages_id';

    protected $fillable = [
        'company_id',
        'package_id',
        'company_package_status',
        'start_date',
        'end_date',
        'token'
    ];
}
