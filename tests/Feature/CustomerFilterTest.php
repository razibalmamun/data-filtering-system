<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Models\Customer;

class CustomerFilterTest extends TestCase
{


    public function test_get_all_customers()
    {
        $response = $this->get('/');
        $response->assertStatus(200)
        ->assertViewIs('customer');
    }

    public function test_filter_by_year()
    {
        $response = $this->get('/?year=1928');
        $response->assertStatus(200)
        ->assertViewIs('customer')
        ->assertViewHas([
            'year' => 1928, 
            'month' => ""
        ]);
    }

    public function test_filter_by_month()
    {
        $response = $this->get('/?month=10');
        $response->assertStatus(200)
        ->assertViewIs('customer')
        ->assertViewHas([
            'year' => "", 
            'month' => 10
        ]);
    }

    public function test_filter_by_year_month()
    {
        $response = $this->get('/?year=1928&month=10');
        $response->assertStatus(200)
        ->assertViewIs('customer')
        ->assertViewHas([
            'year' => 1928, 
            'month' => 10
        ]);
    }

    public function test_filter_pagination_by_year()
    {
        $response = $this->get('/?year=1928&page=2');
        $response->assertStatus(200)
        ->assertViewIs('customer');
    }

    public function test_filter_pagination_by_month()
    {
        $response = $this->get('/?month=11&page=2');
        $response->assertStatus(200)
        ->assertViewIs('customer');
    }
}
