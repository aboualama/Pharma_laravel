<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = Medicine::all();

        return response(['Status' => '200', 'Message' => 'Show All Medicine Successfully', 'Data' => $record]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new Medicine;
        $record->medicine = $request->medicine;
        $record->save();

        return response(['Status' => '200', 'Message' => 'Medicine Created Successfully', 'Data' => $record]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Medicine::findOrFail($id);
        return response(['Status' => '200', 'Message' => 'Show Medicine Successfully', 'Data' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Medicine::find($id);
        $record->medicine = $request->medicine;
        $record->update();

        return response(['Status' => '200', 'Message' => 'Medicine Update Successfully', 'Data' => $record]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Medicine::destroy($id);
        return response(['Status' => '200', 'Message' => 'Medicine Deleted Successfully', 'Deleted Row Count' => $row]);
    }
}
