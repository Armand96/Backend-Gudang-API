<?php

namespace App;

// use Illuminate\Auth\Authenticatable;
// use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Audits extends Model //implements AuthenticatableContract, AuthorizableContract
{
    //use Authenticatable, Authorizable;
    protected $table = 'audits';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid','tipe_audit', 'nomor_barang', 'barang_keluar_id', 
        'barang_masuk_id', 'nilai_lama', 'nilai_baru',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        // 'created_at', 'updated_at'
    ];
}
