<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
 use Laravel\Sanctum\HasApiTokens;

 class User extends Authenticatable
{
    use HasFactory, Notifiable , HasApiTokens ;


    public function bookmarkAds(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Ad::class, 'bookmarks', 'user_id', 'ad_id');
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
