<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'leave_type_id', 'start_date', 'duration', 'status', 'reason'];

    public function employee()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class,'leave_type_id','id');
    }
}
