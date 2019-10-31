<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    protected $table = 'bengkel';
    protected $primaryKey = 'id';
    // protected $incrementing = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_bengkel'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
