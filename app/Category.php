<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;


class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = ['slug','parent_id'];

    protected $guarded = ['id'];

    public function parent(){
        return $this->belongsTo('App\Category','parent_id');
    }
    public function children(){
        return $this->hasMany('App\Category','parent_id')->orderBy('name','asc');
    }

    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

}
