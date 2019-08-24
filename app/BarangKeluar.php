<?php

namespace App;

// use Illuminate\Auth\Authenticatable;
// use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class BarangKeluar extends Model //implements AuthenticatableContract, AuthorizableContract
{
    //use Authenticatable, Authorizable;
    protected $table = 'barang_keluar';

    public function BarangList()
    {
        return $this->belongsTo('App\Models\BarangList');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proyek', 'no_order', 'bengkel', 'pekerjaan', 'tgl_keluar', 
        'nomor_barang', 'jml_klr_angka', 'jml_klr_huruf',
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
