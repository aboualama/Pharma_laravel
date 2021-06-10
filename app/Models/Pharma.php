<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pharma
 *
 * @property int $id
 * @property string $patientId
 * @property string $cf
 * @property string $patientName
 * @property string $patientLastName
 * @property string $medicine
 * @property string|null $aifaCode
 * @property int|null $quantity
 * @property string|null $unit
 * @property string|null $responsable
 * @property string|null $reciveDate
 * @property string|null $patientBirthdate
 * @property mixed|null $user
 * @property string|null $doctor
 * @property string|null $doctorId
 * @property string|null $innovative
 * @property string|null $note
 * @property int|null $requestNumber
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereAifaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereCf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereDoctor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereInnovative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereMedicine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma wherePatientBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma wherePatientLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma wherePatientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereReciveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereRequestNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereResponsable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharma whereUser($value)
 * @mixin \Eloquent
 */
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
