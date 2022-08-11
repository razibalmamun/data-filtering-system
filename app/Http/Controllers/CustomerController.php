<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $customers = $this->customerService->getFilteredData($request->all());
        return view('customer', $customers);
    }

    public function customerFilter(CustomerRequest $request) {
        $customers = $this->customerService->getFilteredData($request->validated());
        return view('customer', $customers);
    }
}
