<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeOpen($query)
    {
        $query->where('closed', false);
    }

    public function scopeClosed($query)
    {
        $query->where('closed', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getReporterAttribute()
    {
        return $this->user->name;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
