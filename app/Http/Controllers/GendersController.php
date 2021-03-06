<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;
use App\Http\Requests\GendersRequest;

class GendersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = Gender::orderBy('name','asc')->get();
        return response()->json($genders);
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
    public function store(GendersRequest $request)
    {
        $gender = new Gender($request->all());
        $gender->save();
        return response()->json($gender);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gender = Gender::find($id);

        if (is_null($gender)) {
            return response()->json("Registro no encontrado");
        }else{
            return response()->json($gender);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GendersRequest $request, $id)
    {
        $gender = Gender::find($id);

        if (is_null($gender)) {
            return response()->json("Registro no encontrado");
        }else{
            $gender->update($request->all());
            return response()->json($gender);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gender = Gender::find($id);

        if (is_null($gender)) {
            return response()->json("Registro no encontrado", 404);
        }else{
            $gender->delete();
            return response()->json("Registro Eliminado Satisfactoriamente");
        }
    }
}
