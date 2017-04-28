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

    public function can_delete(User $user)
    {
        return $user->is_moderator() || $this->user_id == $user->id;
    }
}
