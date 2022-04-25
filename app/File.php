<?php

namespace BullsEye;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class File extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'title',
        'overview',
        'em_project',
        'gpr_project',
        'cement_project',
        'pel_project',
        'type'
//        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
