<?php

namespace BullsEye;

use Illuminate\Database\Eloquent\Model;

class Cement_service extends Model
{
    //
    protected $table = 'cement_service';

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
        return $this->hasMany(Comment::class,'cement_id');
    }
}
