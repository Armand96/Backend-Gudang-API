<?php

namespace App;

// use Illuminate\Auth\Authenticatable;
// use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class NoOrder extends Model //implements AuthenticatableContract, AuthorizableContract
{
    //use Authenticatable, Authorizable;
    protected $table = 'no_order';
    protected $primaryKey = 'no_order';
    protected $keyType = 'int';
    public $incrementing = false;

    // public function BarangList()
    // {
    //     return $this->belongsTo('App\Models\BarangList');
    // }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_order', 'bengkel'
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
