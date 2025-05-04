<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'role_menu');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
