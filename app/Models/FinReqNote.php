<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinReqNote extends Model
{
    protected $fillable = [
        'fin_req_id', 'note', 'user_id'
    ];

    public function finreq()
    {
        return $this->belongsTo('App\Models\FinReq');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
