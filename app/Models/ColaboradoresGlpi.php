<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboradoresGlpi extends Model
{
    use HasFactory;

    protected $connection = "glpi";

    protected $table = "glpi_plugin_fields_computerutilizadors";
}
