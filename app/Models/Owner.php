<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ['name', 'dob'];

    public function pets() {
        return $this->hasMany(Pet::class);
    }

}
