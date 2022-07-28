<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'prog_db';
    protected $primaryKey = 'progid';

     public function program_run_type()
    {
        return $this->belongsTo(ProgramRunType::class,'runtype','runtype');
    }
    public function program_type()
    {
        return $this->belongsTo(ProgramType::class,'progtype','type');
    }
    public function student()
    {
        return $this->hasMany(Student::class, 'progid');
    }

}
