<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'url'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_menu');
    }
}
