<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Softwares extends Model
{
    use HasFactory;

    protected $connection = "sisglic";

    protected $table = "softwares";

    protected $guarded = [];

    public function licenca(){
        return $this->hasOne(Licencas::class);
    }
}
