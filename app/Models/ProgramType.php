<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProgramType extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'prog_types';

    public function program()
    {
        return $this->hasMany(Program::class);
    }

}
