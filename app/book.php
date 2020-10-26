<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    //
    
    protected $table = 'book';

    protected $fillable = ['no_buku','nama_buku','penerbit','tahun_terbit','keterangan','total_buku'];
}
