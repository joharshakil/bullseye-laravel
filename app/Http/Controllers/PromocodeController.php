<?php

namespace BullsEye\Http\Controllers;
use BullsEye\Http\Requests;
use BullsEye\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promocodes =  Promocode::all();
         return view('admin.promocode.index', compact('promocodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promocode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promocode = new Promocode();
        $promocode->type = $request->type;
        $promocode->amount = $request->amount;
        $promocode->code  =  $request->code;
        $promocode->status  =  $request->status;
        $promocode->save();
        return redirect()->route('promocode.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BullsEye\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function show(Promocode $promocode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BullsEye\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function edit(Promocode $promocode)
    {
         return view('admin.promocode.edit',compact('promocode'));
    }

    public function promocoodeExist(Requests\AjaxUserExistsRequest  $request){
        return Promocode::where('code', $request->promocode)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BullsEye\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Promocode $promocode)
    {
        $promocode->type = $request->type;
        $promocode->amount = $request->amount;
        $promocode->code  =  $request->code;
        $promocode->status  =  $request->status;
        $promocode->save();
        return redirect()->route('promocode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BullsEye\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocode $promocode)
    {
        $promocode->delete();
        return view('admin.promocode.index');
    }
}
