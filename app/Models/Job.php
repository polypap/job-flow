<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'location','description','salary','company_id', 'category_id', 'status','experience','open_date','close_date'
    ];

    protected $dates = ['open_date','close_date'];
    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'] ;

    public function category():HasMany {
        return $this->hasMany(Category::class);
    }

    public function company():BelongsTo{
        return $this->belongsTo(Company::class);
    }

    public function jobApplications() {

    }

    public static function getSingle($id){
        return self::find($id);
    }

    public function scopeGetRecords(Builder | QueryBuilder $query){
        return self::select('jobs.*', 'categories.title as category_name')
            ->leftJoin('categories', function($join){
                $join->on( 'categories.id', '=', 'jobs.category_id');
            }
        )->orderBy('jobs.id','desc');
    }
}
