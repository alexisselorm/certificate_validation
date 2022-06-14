<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramType extends Model
{
    use HasFactory;
    use Searchable;

    public function program()
    {
        return $this->hasMany(Program::class, 'program_type_id');
    }

}
