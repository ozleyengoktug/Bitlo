<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Package;
use App\Models\CompanyPackage;
use App\Models\CompanyPayment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BitloController extends Controller
{

    //Add New Company To DB
    //Request site_url, name,lastname, company_name, email, password. Response status, token ve company_id.
    public function addNewCompany(Request $req){
        $company = Company::create([
            'site_url' => $req->site_url,
            'name' => $req->name,
            'lastname' => $req->lastname,
            'company_name' => $req->company_name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'status' => '1',
            'token' => Str::random(20),
        ]);

        return json_encode([
            'message' => 'Success',
            'data' => [
                'status' => $company->status,
                'token' => $company->token,
                'company_id' => $company->company_id
            ]
        ]);
    }

    //Assign Packages To Company
    //Request company_id, package_id. Response status, start_date, end_date
    public function packageToCompany(Request $req){
        $company = Company::where('company_id', $req->company_id)->first();
        $companyPackage = CompanyPackage::create([
            'company_id' => $req->company_id,
            'package_id' => $req->package_id,
            'token' => $company->token,
            'start_date' => date('Y-m-d H:i:s'),
            'end_date' => date("Y-m-d H:i:s",strtotime('+31 days')),
            'company_package_status' => 1
        ]);

        $packageData = Package::where('package_id', $req->package_id)->first();

        CompanyPayment::create([
            'company_package_id' => $companyPackage->company_packages_id,
            'payment_period' => 'monthly',
        ]);

        return json_encode([
            'message' => 'Success',
            'data' => [
                'company_package_status' => $companyPackage->company_package_status,
                'start_date' => $companyPackage->start_date,
                'end_date' => $companyPackage->end_date,
                'package_name' => $packageData->package_name,
                'package_price' => $packageData->price
            ]
        ]);
    }

    //Get All Data From Token
    //Request token response full data
    public function getCompanyPackages(Request $req){
        $companyPackage = CompanyPackage::where('token', $req->token)->first()->makeHidden('company_package_id','company_id','package_id','token');
        $package = Package::where('package_id', $companyPackage->package_id)->first()->makeHidden('package_id');
        $company = Company::where('company_id', $companyPackage->company_id)->first()->makeHidden('token','company_id');

        return json_encode([
            'message' => 'Success',
            'Informations' => [
                'CompanyPackageInfo' => [
                    $companyPackage,
                ],
                'PackageInfo' => [
                    $package,
                ],
                'CompanyInfo' => [
                    $company,
                ],
            ],
        ]);
    }
}
