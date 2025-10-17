<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message', 'property_id'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
