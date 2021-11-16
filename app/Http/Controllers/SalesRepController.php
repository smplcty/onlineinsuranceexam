<?php

namespace App\Http\Controllers;

use App\Models\SalesRep;
use Illuminate\Http\Request;

class SalesRepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('salesrep');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'id'=>1,
            'name'=>'testing',
            'commission'=>0,
            'tax'=>0,
        ];
        return $data;
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
        $status = true;
        $message = '';
        $data = [];

        $salesrep = new SalesRep();

        $get_existing_data = SalesRep::where('name', $request->name)->get();

        if (count($get_existing_data)){
            $status = false;
            $message = 'Already Exists!';
        }else{
            $salesrep->name = $request->name;
            $salesrep->commission = $request->commission;
            $salesrep->tax = $request->tax;
            $salesrep->bonus = 0;
            $salesrep->save();

            $message = 'Sales Representative has been created!';
        }

        // $data['request'] = $request->all();
        // $data['record'] = $salesrep;
        // $data['existing'] = $get_existing_data;
        // $data['response'] = $this->response($status, $message, $data);

        // return $data;


        return $this->response($status, $message, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesRep  $salesRep
     * @return \Illuminate\Http\Response
     */
    public function show(SalesRep $salesRep, Request $request)
    {
        //
        $salesrep = new SalesRep();

        if (!empty($request->id)){
            $person = $salesrep->select('id','name','commission','tax','bonus')
                                ->where('id', $request->id)
                                ->get();

            if(count($person)){
                return $this->response(
                    true,
                    'List Retrieved',
                    $person[0]
                );
            }else{
                return $this->response( false, 'No Data!', null );
            }
        }else{
            return $this->response(
                true,
                'List Retrieved',
                $salesrep->select('id','name','commission','tax','bonus')->get()
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesRep  $salesRep
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesRep $salesRep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalesRep  $salesRep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesRep $salesRep)
    {
        //
        $status = true;
        $message = '';
        $data = [];

        if (!count($salesRep->where('id', $request->id)->get())){
            $status = false;
            $message = 'No data!';
        }else{
            SalesRep::where('id', $request->id)->update([
                'name' => $request->name,
                'commission' => $request->commission,
                'tax' => $request->tax
            ]);

            $message = 'Updated Successfully';
            $data = $salesRep->select('id', 'name','commission','tax','bonus')
                            ->where('id', $request->id)
                            ->get()[0];
        }

        return $this->response($status, $message, $data);
    }

    /**
     * Delete an item
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalesRep  $salesRep
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request, SalesRep $salesRep)
    {
        //
        $status = true;
        $message = '';
        $data = [];

        if (!count($salesRep->where('id', $request->id)->get())){
            $status = false;
            $message = 'No data!';
        }else{
            SalesRep::where('id', $request->id)->delete();

            $message = 'Deleted Successfully';
        }

        return $this->response($status, $message, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesRep  $salesRep
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesRep $salesRep)
    {
        //
    }

    public function response($status, $message, $data){
        $response = [
            'status'=>$status,
            'message'=>$message,
            'data'=>$data,
        ];
        return $response;
    }
}
