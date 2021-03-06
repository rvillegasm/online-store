<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Order;
use App\CustomerDetails;
use App\Comment;

/*
    Watch Model Class
    Attributes : id, name, email, email_verified_at, password,
                 role, google_id, remember_token, created_at, updated_at
*/

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Values that can take the role attribute of a user
     *
     * @var array
     */
    public const ROLES = [
        'admin' => 'ROLE_ADMIN',
        'customer' => 'ROLE_CUSTOMER',
        'default' => 'ROLE_CUSTOMER',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'google_id', 'credit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getEmailVerifiedAt()
    {
        return $this->attributes['email_verified_at'];
    }

    public function getRole()
    {
        return $this->attributes['role'];
    }

    public function setRole($role)
    {
        $this->attributes['role'] = $role;
    }

    public function hasRole($role)
    {
        return $this->attributes['role'] == User::ROLES[$role];
    }

    public function setGoogleId($google_id)
    {
        $this->attributes['google_id'] = $google_id;
    }

    public function getGoogleId($google_id)
    {
        return $this->attributes['google_id'];
    }

    public function getCredit()
    {
        return $this->attributes['credit'];
    }

    public function setCredit($credit)
    {
        $this->attributes['credit'] = $credit;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function customerDetails()
    {
        return $this->hasMany(CustomerDetails::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
