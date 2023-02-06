<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'chember_id',
        'start_time',
        'end_time',
        'slotOnOff',
        'patients_allowed'
    ];
}
