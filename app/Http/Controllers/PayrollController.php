<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\SalesRep;
use Illuminate\Http\Request;
// use Codedge\Fpdf\Fpdf\Fpdf;

use PDF;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('payroll');
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
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate_payrol(Request $request)
    {
        //
        $data = json_decode($request->input('jsonquery'), true);
        $currency = '$';

        $pdf_data = [];
        $pdf_data['sr_info'] = SalesRep::where('id', $data['id'])->get()[0];
        $pdf_data['clients'] = [];

        $current_date = date('d-m-Y');
        $total = 0;

        foreach($data['clients'] as $k => $v){
            $v['date'] = $current_date;
            $v['description'] = "Commission from client: {$v['name']}";
            $commission_formatted = number_format($v['commission'], 2, '.', ',');
            $v['commission_formatted'] = "{$currency} {$commission_formatted}";
            $total = $total + $v['commission'];


            $pdf_data['clients'][] = $v;
        }
        
        $pdf_data['total'] = $total;
        $total_formatted = number_format($total, 2, '.', ',');
        $pdf_data['total_formatted'] = "{$currency} {$total_formatted}";


        // return view('pdf');
        // return $pdf_data;
        

        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y')
        // ];

        $pdf = PDF::loadView('pdf', $pdf_data);

        return $pdf->stream('onlineinsurance-payroll.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll)
    {
        //
    }
}
