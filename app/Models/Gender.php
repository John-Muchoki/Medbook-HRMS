<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     */
    protected $table = 'tbl_gender';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'gender'
    ];

}
