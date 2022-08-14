<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CustomerService;
use App\Services\CacheKey;

class CustomerServiceTest extends TestCase
{
    public function test_get_all_customers()
    {
        $customerService = new CustomerService(new CacheKey());
        $customers = $customerService->getFilteredData([]);
        $this->assertNotEmpty($customers);
    }

    public function test_filter_by_year()
    {
        $customerService = new CustomerService(new CacheKey());
        $customers = $customerService->getFilteredData(['year'  =>  1928]);
        $this->assertNotEmpty($customers);
    }

    public function test_filter_by_month()
    {
        $customerService = new CustomerService(new CacheKey());
        $customers = $customerService->getFilteredData(['month'  =>  12]);
        $this->assertNotEmpty($customers);
    }

    public function test_filter_by_year_month()
    {
        $customerService = new CustomerService(new CacheKey());
        $customers = $customerService->getFilteredData(['year'  =>  1928, 'month'  =>  12]);
        $this->assertNotEmpty($customers);
    }

    public function test_cache_key()
    {
        $cacheKey = new CacheKey();
        $getCacheKey = $cacheKey->get(2018, 12);
        $this->assertNotEmpty($getCacheKey);
    }

    public function test_get_customer()
    {
        $customerService = new CustomerService(new CacheKey());
        $customers = $customerService->getCustomers(1930, 11);
        $this->assertNotEmpty($customers);
    }
}
