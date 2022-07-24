<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Student extends Model
{
    use HasFactory;
    use Searchable;
    protected $primaryKey = 'studid';

    protected $table = 'students_db';

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function toSearchableArray()
    {
        return [
            'studid' => $this->studid,
        ];
    }
}
