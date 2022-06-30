<?php

namespace App\Http\Controllers;

use App\Models\Omang;
use Illuminate\Http\Request;

class OmangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateOmang(Request $request, $omang)
    {
        if(Omang::where('ID_NO',$omang)->exists())
        {
            return response()->json([
                'status' => 'success',
                'data' => Omang::where('ID_NO',$omang)->first(),
            ]);
        }
        return response()->json([
            'status' => 'error',
            'data' => null,
        ]);
    }

    public function verifyOmang(Request $request, $omang)
    {
        if(Omang::where('ID_NO',$omang)->exists())
        {
            return 'true';
        }
        return false;
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
     * @param  \App\Models\Omang  $omang
     * @return \Illuminate\Http\Response
     */
    public function show(Omang $omang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Omang  $omang
     * @return \Illuminate\Http\Response
     */
    public function edit(Omang $omang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Omang  $omang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Omang $omang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Omang  $omang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Omang $omang)
    {
        //
    }
}
