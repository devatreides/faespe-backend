<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_manager',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsAdminAttribute($value)
    {
        return $value ? 'Sim' : 'Não';
    }

    public function setIsAdminAttribute($value)
    {
        $this->attributes['is_admin'] = ($value === 'Sim' || $value == 1);
    }

    public function getIsManagerAttribute($value)
    {
        return $value ? 'Sim' : 'Não';
    }

    public function setIsManagerAttribute($value)
    {
        $this->attributes['is_manager'] = ($value === 'Sim' || $value == 1);
    }
}
