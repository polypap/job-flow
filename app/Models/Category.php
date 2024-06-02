<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'description','job_id'];

    public static function getRecords(){
        return self::select('categories.*')
        ->where('deleted_at',null)
        ->orderBy('id','desc')
        ->paginate(10);
    }

    public static function getCategories(){
        return self::select('categories.*')
        ->where('deleted_at',null)
        ->where('status','=', 1)
        ->get();
    }

    public function job():BelongsTo{
        return $this->belongsTo(Job::class);
    }
}
