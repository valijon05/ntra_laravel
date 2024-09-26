<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ad extends Model
{
    use HasFactory;
public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
return $this->belongsTo(Branch::class , 'branches_id');
}
public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
  return $this->belongsTo(Status::class,'statuses_id');
}
public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
  return $this->belongsTo(User::class,'users_id');  ;
}
}
