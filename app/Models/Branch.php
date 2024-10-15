<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'created_at',
        'updated_at',
    ];
    public function ads(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
    return $this->hasMany(Ad::class ,'branches_id');
    }
    public function getAdsCountAttribute()
    {
        return $this->ads()->count();
    }
    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

}
