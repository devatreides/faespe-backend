<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseRequest extends Model
{
    use CrudTrait, SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'purchase_requests';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function city()
    {
        return $this->belongsToMany(City::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopePublishedRequests(Builder $query)
    {
        return $query->where('status', true)
            ->orderBy('situation','asc')
            ->orderBy('publication_date','desc');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setTermOfReferenceAttribute($value)
    {
        $attribute_name = "term_of_reference";
        $disk = "public";
        $destination_path = 'terms';

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setRequestWinnerFileAttribute($value)
    {
        $attribute_name = "request_winner_file";
        $disk = "public";
        $destination_path = 'winners';

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value == 1);
    }
}
