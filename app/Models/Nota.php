<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['autor','titulo', 'nota', 'alteracao'];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function getAlteracao(){
        return Carbon::parse( $this->alteracao )->format('d/m/Y - H:i:s');
    }
}
