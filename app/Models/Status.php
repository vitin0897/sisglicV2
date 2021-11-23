<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $connection = "sisglic";

    protected $table = "status";

    protected $guarded = [];

    public function licenca(){
        return $this->hasMany(Licencas::class);
    }
}
