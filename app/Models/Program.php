<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    use Searchable;

     public function program_run_type()
    {
        return $this->belongsTo(ProgramRunType::class);
    }
    public function program_type()
    {
        return $this->belongsTo(ProgramType::class);
    }
    public function student()
    {
        return $this->hasMany(Student::class, 'program_id');

    }

}
