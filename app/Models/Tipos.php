<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    use HasFactory;

    protected $connection = "sisglic";

    protected $table = "tipos";

    protected $guarded = [];

    public function licenca(){
        return $this->hasMany(Licencas::class);
    }
}
