<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = ['name', 'text', 'email', 'moderated'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
