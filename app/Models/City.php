<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cost', 'department_id'];

    // Relacion uno a muchos
    public function districts(){
        return $this->HasMany(District::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
