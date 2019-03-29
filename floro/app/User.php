<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;


class User extends Authenticatable
{   
    
    
        use SoftDeletes;
        use Notifiable;
        use Sortable;
    

    
    protected $fillable = [
        'user_name','email','first_name','last_name','address',
        'house_number','postal_number','city','phone_number','last_login_at',
        'last_login_ip','http_user_agent'
    ];

    public $sortable = ['user_name','email','first_name','last_name'];


    public function passwordSecurity()
    {
        return $this->hasOne('App\PasswordSecurity');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getFullName()
    {
    return "{$this->first_name} {$this->surname}";
    }
   
}
