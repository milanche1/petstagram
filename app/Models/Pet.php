<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'owner_id', 'dob'];


    public function owner() {
        return $this->belongsTo(Owner::class);
    }
}
