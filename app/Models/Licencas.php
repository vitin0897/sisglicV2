<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencas extends Model
{
    use HasFactory;

    protected $connection = "sisglic";

    protected $table = "licencas";

    protected $guarded = [];

    public function computador()
    {
        return $this->hasOne(Computadores::class);
    }
}
