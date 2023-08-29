<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'tbl_patient';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'date_of_birth',
    ];

    /**
     * Get the gender associated with the patient
     */
    public function gender() {
        return $this->belongsTo(Gender::class);
    }

    /**
     * Get the service associated with the patient
     */
    public function service() {
        return $this->hasMany(Service::class);
    }

}
