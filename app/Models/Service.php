<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'tbl_patient_services';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'type_of_service',
        'comments',
    ];

    /**
     * Get the patient associated with the service
     */
    public function patient() {
        return $this->belongsTo(Patient::class);
    }

}
