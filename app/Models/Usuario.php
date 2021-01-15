<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Usuario extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['nome', 'email', 'senha'];

    public function notas(){
        return $this->hasMany(Nota::class);
    }
}
