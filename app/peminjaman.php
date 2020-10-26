<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    //
    
    protected $table = 'peminjaman';

    protected $fillable = ['id_buku','jumlah','tgl_peminjaman','tgl_kembali','total_hari','total_harga'];
}
