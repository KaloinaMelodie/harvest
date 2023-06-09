<?php

namespace App\Http\Controllers;

use App\Models\Vip;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class VipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('VIP.dashboard02');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vip  $vip
     * @return \Illuminate\Http\Response
     */
    public function show(Vip $vip)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vip  $vip
     * @return \Illuminate\Http\Response
     */
    public function edit(Vip $vip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vip  $vip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vip $vip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vip  $vip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vip $vip)
    {
        //
    }


    public function lineChart()
    {
        return view('VIP.lineChart');
    }
    public function pieChart()
    {
        return view('VIP.pieChart');
    }

    public function list(Vip $vip)
    {
        $vip = comptevip::paginate(10)->get();

        return view('VIP.listeVIP', ['vip' => vip]);
    }


}
