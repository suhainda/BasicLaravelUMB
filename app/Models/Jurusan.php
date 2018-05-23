<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_jurusan'];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::deleting(function ($model) {
//            $model->mahasiswa()->delete();
//        });
//
//    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
