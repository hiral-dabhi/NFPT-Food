<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_number',
        'address',
        'city',
        'state',
        'zipcode',
        'country',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'user_type',
        'user_id',  
        'document_name',
        'document_file'   
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function userRole()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
    }

    public function restaurantDetail()
    {
        return $this->belongsTo(RestaurantMaster::class, 'id','user_id');
    }

    public function restaurantMasterDetail()
    {
        return $this->belongsTo(RestaurantMaster::class, 'id','user_id')->where('type','0');
    }

    public function staffRestaurant()
    {
        return $this->hasOne(StaffHasRestaurant::class, 'staff_id');
    }
    public function hasCountry()
    {
        return $this->belongsTo(Country::class, 'country','id');
    }
    public function bankDetail()
    {
        return $this->hasOne(UserBankDetail::class, 'user_id');
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
