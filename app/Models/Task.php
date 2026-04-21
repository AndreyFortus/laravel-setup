<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'due_date', 'project_id', 'author_id', 'assigned_to'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'entity', 'entity', 'entity_id');
    }
}
