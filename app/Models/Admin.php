<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class Admin extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = ['name', 'username', 'password', 'role_id'];

    protected $hidden = ['password'];

    public function role(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
