<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'location','description','salary','experience','open_date','close_date'
    ];

    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'] ;

    public function category():HasMany {
        return $this->hasMany(Category::class);
    }

    public function company(){

    }

    public function jobApplications() {
        
    }

}
