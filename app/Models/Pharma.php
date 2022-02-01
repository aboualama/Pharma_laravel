<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pharma extends Model
{
    protected $table = 'pharma';
    protected $fillable = [
        'patientId',
        'cf',
        'patientName',
        'patientLastName',
        'aifaCode',
        'quantity',
        'unit', 'responsable', 'reciveDate', 'patientBirthdate', 'user', 'doctor', 'doctorId',
        'innovative',
        'requestNumber',
        'note',

    ];
    public function rdr()
    {
        return $this->belongsTo(PaymentRequest::class,'requestNumber');
    }
}
