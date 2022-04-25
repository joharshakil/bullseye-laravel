<?php

namespace BullsEye;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    // fields can be filled
    protected $fillable = ['body', 'user_id','em_id','gpr_id','cement_id','pel_id'];

    public function em_project()
    {
        return $this->belongsTo(Em_service::class);
    }

    public function cement_project()
    {
        return $this->belongsTo(Cement_service::class);
    }

    public function gpr_project()
    {
        return $this->belongsTo(Gpr_service::class);
    }
    public function Pel()
    {
        return $this->belongsTo(Pel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
