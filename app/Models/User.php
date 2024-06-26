<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        // 'firstname',
        // 'lastname',
        'email',
        'password',
        // 'address',
        // 'city',
        // 'country',
        // 'postal',
        // 'about'
        'phone_num',
        'role'
    ];


    //specifying user table primary key
    protected $primaryKey = "user_ID";

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Define the relationship between User and Vendor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vendor()
    {
        return $this->hasOne(vendor::class, 'user_ID'); // Assuming 'user_ID' is the foreign key in the vendors table
    }
}
