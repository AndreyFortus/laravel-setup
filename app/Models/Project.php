<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'entity', 'entity', 'entity_id');
    }
}
