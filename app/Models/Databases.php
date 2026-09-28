<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Databases extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function pull($perpus, $z)
    {
        return DB::table($perpus)->where($z)->first();
    }

    public function tampil($table)
    {
        return DB::table($table)->get();
    }
    public function tampilBetween($table, $kolom, $awal, $akhir)
    {
        return DB::table($table)->whereBetween($kolom, [$awal, $akhir])->get();
    }
}