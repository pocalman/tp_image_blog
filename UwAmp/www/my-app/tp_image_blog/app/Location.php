<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name'];  //

    public function images()
    {
        return $this->BelongToMany(Image::class);
    }
}
