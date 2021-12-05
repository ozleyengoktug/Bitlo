<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\Package;
use App\Models\CompanyPackage;
use App\Models\CompanyPayment;
use Illuminate\Support\Facades\Validator;

class ValidationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $prefix = 'api/company/';

        if (Str::contains($request->path(), $prefix.'register')) {

            $validator = Validator::make($request->all(), [
                'site_url' => 'required|max:100',
                'name' => 'required|max:25',
                'lastname' => 'required|max:25',
                'company_name' => 'required|max:100',
                'email' => 'required|max:50|email:rfc,dns',
                'password' => 'required|max:255',
            ]);
    
            if ($validator->fails()) {
                return response(json_encode([
                    'errors' => $validator->messages()
                ]), 503);
            }

            $isCompanyExist = Company::where('company_name', $request->company_name)
                                     ->orWhere('email', $request->email)
                                     ->count();
                                    
            if($isCompanyExist) //If company exists, return error
                return response(json_encode([
                    'message' => 'Company Already Exists!'
                ]), 503);
            
        }else if (Str::contains($request->path(), $prefix.'add-package')) {
            $companyInfos = Company::where('company_id', $request->company_id);
            $isCompanyActive = $companyInfos->first();
            $isCompanyExist = $companyInfos->count();

            $isCompanyPackageExist = CompanyPackage::where('company_id', $request->company_id)
                                     ->count();
                                     
            $isPackageExist = Package::where('package_id', $request->package_id)
                                     ->count();
                                        
            if(!$isCompanyExist) //Company is exist check
                return response(json_encode([
                    'message' => 'Company Not Found!'
                ]), 503);
            if($isCompanyPackageExist) //Has company package already exist
                return response(json_encode([
                    'message' => 'Company Already Has A Package!'
                ]), 503);
            if(!$isPackageExist)
                return response(json_encode([
                    'message' => 'Package Not Found!'
                ]), 503);
            if(!$isCompanyActive->status)
                return response(json_encode([
                    'message' => 'Company Not Active!'
                ]), 503);

        }else if (Str::contains($request->path(), $prefix.'packages')) {
            $isCompanyExists = CompanyPackage::where('token', $request->token);

            if(!$isCompanyExists->count()) //Company is exist check
                return response(json_encode([
                    'message' => 'Company or Package Not Found!'
                ]), 503); 

        }
        return $next($request);
    }
}
