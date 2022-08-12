<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Models\Customer;

class CustomerFilterTest extends TestCase
{


    public function testGetAllCustomers()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testFilterByYear()
    {
        $response = $this->get('/filter?year=1928');
        $response->assertStatus(200);
    }

    public function testFilterByMonth()
    {
        $response = $this->get('/filter?month=10');
        $response->assertStatus(200);
    }

    public function testFilterByYearMonth()
    {
        $response = $this->get('/filter?year=1928&month=10');
        $response->assertStatus(200);
    }

    public function testFilterPaginationByYear()
    {
        $response = $this->get('/filter?year=1928&page=2');
        $response->assertStatus(200);
    }

    public function testFilterPaginationByMonth()
    {
        $response = $this->get('/filter?month=11&page=2');
        $response->assertStatus(200);
    }
}
