<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ad extends Model
{
    use HasFactory;
    protected $with = ["images"];
    protected $fillable = ['title',
        'description',
         'price',
        'address',
         'rooms',
        'statuses_id',
         'users_id',
        'branches_id',
         'gender',
        'image'];
public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
return $this->belongsTo(Branch::class,"branches_id");
}
public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
  return $this->belongsTo(Status::class,"statuses_id");
}
public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
  return $this->belongsTo(User::class,"users_id")  ;
}
    public function bookmarkedByUsers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'ad_id', 'user_id');
    }
    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Images::class, 'ad_id','id');
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'users_id');
    }




}
