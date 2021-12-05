<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPayment extends Model
{
    use HasFactory;

    protected $table = 'company_payments';
    protected $primaryKey = 'company_payments_id';

    protected $fillable = [
        'company_package_id',
        'payment_period',
    ];
}
