<?php

namespace App\Http\Controllers;

use App\Models\Omang;
use App\Services\AppService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class OmangController extends Controller
{

    use ApiResponser;


    /**
     * The service to consume notes microservice
     * @var AppService
     */
    public $appService;


    /**
     * The base uri to consume the authors service
     * @var int
     */
    public $user;

    public function __construct(AppService $appService)
    {
//        $this->user = auth()->user()->id;
        $this->appService = $appService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateOmang(Request $request, $idno)
    {

        try {
            return $data = json_decode($this->appService->validate($idno));
        }
        catch(\Exception $error)
        {
            return $error->getMessage();
        }

//        if(Omang::where('ID_NO',$idno)->exists())
//        {
//            return response()->json([
//                'status' => 'success',
//                "message" => "omang found",
//                'data' => Omang::where('ID_NO',$idno)->first(),
//            ]);
//        }
//        return response()->json([
//            'status' => 'error',
//            "message" => "omang not found",
//            'data' => null,
//        ]);


        if ($data->status === 'success') {
            return response()->json([
                "status" => "success",
                "message" => "omang found",
                "data" => $data->data
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "omang not found",
                "data" => ''
            ]);
        }
    }

    public function verifyOmang(Request $request, $omang)
    {
        if (Omang::where('ID_NO', $omang)->exists()) {
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Omang $omang
     * @return \Illuminate\Http\Response
     */
    public function show(Omang $omang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Omang $omang
     * @return \Illuminate\Http\Response
     */
    public function edit(Omang $omang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Omang $omang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Omang $omang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Omang $omang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Omang $omang)
    {
        //
    }
}
