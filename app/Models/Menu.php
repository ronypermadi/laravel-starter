<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['title','text','icon','href','parent_id'];

    public function childs() {
        return $this->hasMany(Menu::class,'parent_id','id') ;
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
        : static::where('title', 'like', '%'.$query.'%')
            ->orWhere('text', 'like', '%'.$query.'%');
    }
}
