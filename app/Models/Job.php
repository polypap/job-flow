<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
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
        'title', 'location','description','salary','company_id', 'category_id', 'status','experience','open_date','close_date','state_id','city','zip','str_address'
    ];

    protected $dates = ['open_date','close_date'];
    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'] ;

    public function category():BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function company():BelongsTo{
        return $this->belongsTo(Company::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function jobApplications() {
        return $this->hasMany(JobApplication::class);
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

    public function scopeGetJobRecords(){
        return self::query()->latest()->orderBy('jobs.id','desc')->with(['state','category','company']);
    }

    // public function hasUserApplied(Authenticatable|User|int $user) : bool {
    //     return $this->where('id', $this->id)
    //         ->whereHas(
    //             'jobApplications',
    //             fn($query) => $query->where('user_id', '=', $user->id ?? $user)
    //         )->exists();
    // }

    public function hasUserApplied(User|int $user){
        return $this->where('id', $this->id)
                ->whereHas('jobApplications' , function($query) use ($user){
                    $query->where('user_id', '=',$user->id??$user);
                }
        )->exists();
    }
}
