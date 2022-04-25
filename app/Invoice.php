<?php

namespace BullsEye;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = ['service_id','service_title','title', 'price', 'payment_status'];

    public function getPaidAttribute() {
        if ($this->payment_status == 'Invalid') {
            return false;
        }
        return true;
    }
}
