<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Package;
use App\Models\CompanyPackage;
use App\Models\CompanyPayment;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 3; $i++) { 
            $company = Company::create([
                'site_url' => $faker->lastname,
                'name' => $faker->name,
                'lastname' => $faker->lastname,
                'company_name' => $faker->company,
                'email' => $faker->companyEmail,
                'password' => Hash::make('password'),
                'status' => '1',
                'token' => Str::random(20),
            ]);

            $package = Package::create([
                'package_name' => $faker->name,
                'price' => rand(10000,30000),
                'priceUnit' => 'TRY',
                'package_status' => '1',
            ]);

            $companyPackage = CompanyPackage::create([
                'company_id' => $company->company_id,
                'package_id' => $package->packages_id,
                'company_package_status' => '1',
                'token' => $company->token,
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s",strtotime('+31 days')),
            ]);
            
            CompanyPayment::create([
                'company_package_id' => $companyPackage->company_packages_id,
                'payment_period' => 'monthly',
            ]);
            
        }
    }
}
