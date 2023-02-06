<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    use HasFactory;
        protected $fillable = [
        'date',
        'chember_id',
        'start_time',
        'end_time',
        'slotOnOff',
        'patients_allowed'
        ];
}
