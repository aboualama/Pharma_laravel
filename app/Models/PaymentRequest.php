<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PaymentRequest
 *
 * @property int $id
 * @property int|null $pdr
 * @property string|null $paymentProposal
 * @property string|null $sentDate
 * @property int|null $PaymentIsseud
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pharma[] $pharmas
 * @property-read int|null $pharmas_count
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest wherePaymentIsseud($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest wherePaymentProposal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest wherePdr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest whereSentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $rdrNumber
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRequest whereRdrNumber($value)
 */
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
