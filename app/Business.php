<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jaysson\EloquentFileField\FileFieldTrait;

class Business extends Model
{
    use FileFieldTrait;
    public $fileFields = ['logo' => []];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'about', 'slug', 'logo'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
