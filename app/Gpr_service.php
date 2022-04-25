<?php

namespace BullsEye;

use Illuminate\Database\Eloquent\Model;

class Gpr_service extends Model
{
    //

    protected $table = 'gpr_service';

    public function user()
    {
        return $this->belongsTo('BullsEye\User', 'user_id');

    }
    public function employee()
    {
        return $this->belongsTo('BullsEye\Employee', 'employee_id');

    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'gpr_id');
    }
}

