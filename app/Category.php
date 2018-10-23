<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany('App\Category','parent_id')->orderBy('cat_name','asc');
    }
}
