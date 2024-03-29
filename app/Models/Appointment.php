<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function visitor()
    {
        return $this->hasOne(Visitor::class, 'id', 'visitor_id');
    }
}
