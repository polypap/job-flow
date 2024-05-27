<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'description'];

    public static function getRecords(){
        return self::select('categories.*')
        ->where('deleted_at',null)
        ->orderBy('id','desc')
        ->paginate(10);
    }
}
