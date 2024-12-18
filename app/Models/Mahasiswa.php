<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mhs';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama','nim','prodi','jurusan'];

}
