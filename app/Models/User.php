<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'self_introduction', 'sex', 'avatar_file_name',
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

    public function soldItems()
     {
         return $this->hasMany(Item::class, 'seller_id');
     }

     public function boughtItems()
     {
         return $this->hasMany(Item::class, 'buyer_id');
     }

     public function followers(): BelongsToMany
     {
         return $this->belongsToMany('App\Models\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
     }

     public function isFollowedBy(?User $user): bool
     {
        return $user
            ? (bool)$this->followers->where('id', $user->id)->count()
            : false;
     }

     public function followings(): BelongsToMany
     {
         return $this->belongsToMany('App\Models\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
     }

     public function likes(): BelongsToMany
     {
         return $this->belongsToMany('App\Article', 'likes')->withTimestamps();
     }

     public function getCountFollowersAttribute(): int
     {
        return $this->followers->count();
     }

    public function getCountFollowingsAttribute(): int
    {
        return $this->followings->count();
    }

    public function articles(): HasMany
    {
        return $this->hasMany('App\Article');
    }

    public function toUserId()
    {
        return $this->hasMany('App\Reaction', 'to_user_id', 'id');
    }

    public function fromUserId()
    {
        return $this->hasMany('App\Reaction', 'from_user_id', 'id');
    }
}
