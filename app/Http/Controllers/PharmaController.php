<?php

namespace App\Http\Controllers;

use App\Models\Pharma;
use Illuminate\Http\Request;

class PharmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getall()
    {

        $record = Pharma::all();

        if($record->count() == 0)
        {
            return response(['Status' => '204', 'Message' => 'There Is No Reservations Found','Data'=>[]]);
        }
        return  $record;
    }











    public function index(Request $request)
    {

        $record = Pharma::where(function($query) use($request)
            {
                if($request->has('doctor'))
                {
                    $query->where('doctor' , $request->doctor);
                }
                if($request->has('startDate') && $request->has('endDate'))
                {
                    $query->whereBetween('reciveDate' , [$request->startDate , $request->endDate]);
                }
                if($request->has('innovative'))
                {
                    $query->where('innovative' , $request->innovative);
                }
                if($request->has('medicine'))
                {
                    $query->where('medicine' , $request->medicine);
                }

            })->get();

        if($record->count() == 0)
        {
            return response(['Status' => '204', 'Message' => 'There Is No Reservations Found','Data'=>[]]);
        }
        return response(['Status' => '200', 'Message' => 'Show All Reservations Successfully', 'Data' => $record,'filters'=>$request->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new Pharma;
        $record->patientId = $request->patientId;
        $record->cf = $request->cf;
        $record->patientName = $request->patientName;
        $record->patientLastName = $request->patientLastName;
        $record->medicine = $request->medicine;

        $record->aifaCode = $request->aifaCode;
        $record->quantity = $request->quantity;
        $record->unit = $request->unit;
        $record->responsable = $request->responsable;
        $record->reciveDate = $request->reciveDate;
        $record->patientBirthdate = $request->patientBirthdate;
        $record->user = json_encode($request->user);

        $record->doctor = $request->doctor;
        $record->doctorId = $request->doctorId;

        $record->innovative = $request->innovative;
        $record->requestNumber = $request->requestNumber;
        $record->save();

        // $record = Reservation::create($request->all());
        return response(['Status' => '200', 'Message' => 'Reservation Created Successfully', 'Data' => $record]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Pharma $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Pharma::with('rdr')->findOrFail($id);
        return response(['Status' => '200', 'Message' => 'Show Reservation Successfully', 'Data' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pharma $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Pharma::find($id);
        $record->patientId = $request->patientId;
        $record->cf = $request->cf;
        $record->patientName = $request->patientName;
        $record->patientLastName = $request->patientLastName;
        $record->medicine = $request->medicine;

        $record->aifaCode = $request->aifaCode;
        $record->quantity = $request->quantity;
        $record->unit = $request->unit;
        $record->responsable = $request->responsable;
        $record->reciveDate = $request->reciveDate;
        $record->patientBirthdate = $request->patientBirthdate;
        $record->user = json_encode($request->user);

        $record->doctor = $request->doctor;
        $record->doctorId = $request->doctorId;

        $record->innovative = $request->innovative;
        $record->requestNumber = $request->requestNumber;
        $record->update();

        // $record->update($request->all());
        return response(['Status' => '200', 'Message' => 'Reservation Update Successfully', 'Data' => $record]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Pharma $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Pharma::destroy($id);
        return response(['Status' => '200', 'Message' => 'Reservation Deleted Successfully', 'Deleted Row Count' => $row]);
    }
}
