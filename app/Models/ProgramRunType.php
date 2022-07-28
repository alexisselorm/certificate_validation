<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProgramRunType extends Model
{
    use HasFactory;
    use Searchable;

    protected $table='prog_runtypes';

    public function program()
    {
        return $this->hasMany(Program::class);
    }

}
