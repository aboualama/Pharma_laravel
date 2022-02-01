<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    protected $table = 'payment_requests';
    protected $fillable = [
        'rdrNumber',
        'paymentProposal',
        'sentDate',
        'PaymentIsseud',
        'note'
    ];

    public function pharmas()
    {
        return $this->hasMany(Pharma::class,'requestNumber');
    }

}
