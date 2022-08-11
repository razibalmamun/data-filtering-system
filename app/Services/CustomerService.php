<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Cache;
use App\Services\CacheKey;

class CustomerService
{
    protected $cacheKey;
    public function __construct(CacheKey $cacheKey)
    {
        $this->cacheKey = $cacheKey;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFilteredData($requestData) : Array
    {
        $year = $requestData['year']??'';
        $month = $requestData['month']??'';

        $data = [];

        if(empty($year) && empty($month)) {
            $customers = Customer::paginate(20);            
        } else {
            $cacheKey =  $this->cacheKey->get($month, $year);
            $customers = Cache::tags('cia')->remember($cacheKey, 60, function () use ($year, $month) {
                Cache::tags('cia')->flush();
                $customer = Customer::query();
                if($year) {
                    $customer = $customer->whereYear('birthday', $year);
                }
                if($month) {
                    $customer = $customer->whereMonth('birthday', $month);
                }
                return $customer->get();
            });
            $customers = $customers->paginate(20);
            $customers = $customers->appends(
                [
                    'year' => $year,
                    'month' => $month,
                ]
            );
        }

        $data['customers'] = $customers;
        $data['year'] = $year;
        $data['month'] = $month;

        return $data;
    }
}
