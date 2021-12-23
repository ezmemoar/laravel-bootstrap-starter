<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable, HasFactory, HasRoles;

    protected $fillable = ['name', 'username', 'password', 'status'];

    protected $hidden = ['password'];

    public function getMainRole(){
        return $this->roles->pluck('name')[0];
    }
}
