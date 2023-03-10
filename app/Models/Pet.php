<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'owner_id', 'dob'];
    protected $hidden = ['updated_at'];


    public function owner() {
        return $this->belongsTo(Owner::class);
    }

    public function image() {
        return $this->hasOne(Image::class);
    }
}
