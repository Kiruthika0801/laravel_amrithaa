<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'join_date',
        'last_login',
        'phone_number',
        'status',
        'role_name',
        'email',
        'role_name',
        'avatar',
        'position',
        'department',
        'password',
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

    // protected static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $getUser = self::orderBy('user_id', 'desc')->first();

    //         if ($getUser) {
    //             $latestID = intval(substr($getUser->user_id, 4));
    //             $nextID = $latestID + 1;
    //         } else {
    //             $nextID = 1;
    //         }
    //         $model->user_id = 'KH_' . sprintf("%04s", $nextID);
    //         while (self::where('user_id', $model->user_id)->exists()) {
    //             $nextID++;
    //             $model->user_id = 'KH_' . sprintf("%04s", $nextID);
    //         }
    //     });
    // }

    protected static function boot() 
    { 
        parent::boot(); 
        self::creating(function ($model) { 
            $latestID = self::latest('created_at')->first(); 
 
            $currentYear  = date('Y'); 
            $currentMonth = date('m'); 
            $currentDay   = date('d'); 
 
            $userIdPrefix = 'KH-' . $currentYear . '-' . $currentMonth . '-'; 
 
            if ($latestID && strpos($latestID->user_id, $userIdPrefix) === 0) { 
                $latestIDNumber = intval(substr($latestID->user_id, -5)); 
                $nextIDNumber = $latestIDNumber + 1; 
            } else { 
                $nextIDNumber = 1; 
            } 
 
            $model->user_id = $userIdPrefix . sprintf("%05s", $nextIDNumber); 
        }); 
    }
}
