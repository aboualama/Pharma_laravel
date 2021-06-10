<?php

namespace App\Http\Controllers;

use App\Models\PaymentRequest;
use App\Models\Pharma;
use Illuminate\Http\Request;

class PaymentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = PaymentRequest::all();
        return response(['Status' => '200', 'Message' => 'Show All PaymentRequest Successfully', 'Data' => $record]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new PaymentRequest;
        $record->pdr             = $request->pdr;
        $record->paymentProposal = $request->paymentProposal;
        $record->sentDate        = $request->sentDate;
        $record->PaymentIsseud   = $request->PaymentIsseud;
        $record->save();

        return response(['Status' => '200', 'Message' => 'PaymentRequest Created Successfully', 'Data' => $record]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = PaymentRequest::with('pharmas')->findOrFail($id);
        return response(['Status' => '200', 'Message' => 'Show PaymentRequest Successfully', 'Data' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = PaymentRequest::find($id);
        $record->rdrNumber             = $request->rdrNumber;
        $record->paymentProposal = $request->paymentProposal;
        $record->sentDate        = $request->sentDate;
        $record->PaymentIsseud   = $request->PaymentIsseud;
        $record->update();

        return response(['Status' => '200', 'Message' => 'PaymentRequest Update Successfully', 'Data' => $record]);
    }

    public function newPaymentRdr(Request $request)
    {
        $record = PaymentRequest::where('rdrNumber','=',$request->rdrNumber)->firstOrNew();
        $record->rdrNumber = $request->rdrNumber;
        $record->save();
        $pharmas = Pharma::whereIn('id',$request->pharmasIds)->update(['requestNumber'=>$record->id]);

        return response(['Status' => '200', 'Message' => 'PaymentRequest Update Successfully', 'Data' => $record]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = PaymentRequest::destroy($id);
        return response(['Status' => '200', 'Message' => 'PaymentRequest Deleted Successfully', 'Deleted Row Count' => $row]);
    }


}
