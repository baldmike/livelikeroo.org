<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount', 'name_on_card', 'first_name', 'last_name', 'email','donation_type', 'frequency', 'honoree', 'recipient_name', 'recipient_email', 'recipient_msg', 'fund'
    ];
}
