<?php

namespace App\Http\Controllers;

use App\Imports\CustomersImport;
use App\Models\Customer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index', [
            'customers' => Customer::groupBy('product')
                ->selectRaw('count(customer) as orders')
                ->limit(30)
                ->orderBy('orders', 'DESC')
                ->get(),

            'customers_by_status' => Customer::groupBy('status')->groupBy('file')
                ->selectRaw('count(file) as customers, file, status')
                ->orderBy('customers', 'DESC')
                ->get(),

            'customers_by_group_and_country' => Customer::groupBy('group_id')->groupBy('country')
                ->selectRaw('count(customer) as orders, group_id, country')
                ->orderBy('orders', 'DESC')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function csvImport(Request $request)
    {
        Excel::import(new CustomersImport, $request->file('csv')->store('temp'));
        return back();
    }

    public function jsonImport(Request $request)
    {
        $json = $request->file('json');
        $data = file_get_contents($json);
        $objs = json_decode($data, true);

        foreach ($objs['data'] as $row) {

            $customer = new Customer();
            $customer->customer = $row[0];
            $customer->country = $row[1];
            $customer->order = $row[2];
            $customer->status = $row[3];
            $customer->group = $row[4];
            $customer->file = Customer::JSON;
            $customer->save();
        }

        return back();
    }

    public function ldifImport(Request $request)
    {
        $ldif = $request->file('ldif');
        $data = file_get_contents($ldif);
        dd($data);
    }
}
