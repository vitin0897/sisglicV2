<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computadores extends Model
{
    use HasFactory;

    protected $connection = "sisglic";

    protected $table = "computadores";

    public function licencas(){
        return $this->hasMany(Licencas::class);
    }
}
