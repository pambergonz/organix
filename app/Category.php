<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use SoftDeletes;
  protected $guarded = [];

  public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
