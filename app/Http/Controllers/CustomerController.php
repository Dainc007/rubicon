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
            'customer' => Customer::all()
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
