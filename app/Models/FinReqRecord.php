<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinReqRecord extends Model
{
    protected $fillable = [
        'fin_req_id', 'filename'
    ];

    public function finreq()
    {
        return $this->belongsTo('App\Models\FinReq');
    }
}
