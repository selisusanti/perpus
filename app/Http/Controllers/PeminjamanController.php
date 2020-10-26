<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use App\Book;
use DB;
use Validator;

class PeminjamanController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    }

    public function create()
    {
       
        $book =  Book::select('id','nama_buku'
                )->where('status',false)
                ->get();
    
        return view('pages/peminjaman/create',compact('book'));
    }


    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'id_buku' => 'required|max:255', 
            'tgl_peminjaman' => 'required|max:255', 
            'tgl_pengembalian' => 'required|max:255', 
            'no_hp' => 'required|max:255', 
            'nama_peminjam' => 'required|max:255', 
            'total_hari' => 'required|integer', 
            'harga' => 'required|integer',
        ])->validate();

        \DB::beginTransaction();
        try{
       
            $buku = Book::where('id',$request->id_buku)->first();
            $buku->status =true;
            $buku->save();

            $store                      = new Peminjaman();
            $store->id_buku             = $request->id_buku; 
            $store->tgl_peminjaman      = $request->tgl_peminjaman;
            $store->tgl_kembali         = $request->tgl_pengembalian; 
            $store->total_hari          = $request->total_hari;   
            $store->total_harga         = $request->harga;      
            $store->no_hp          = $request->no_hp;   
            $store->nama_peminjam         = $request->nama_peminjam;            
            $store->save();
            
            \DB::commit();
            return \Redirect::to("/home")->with('success', 'Data Peminjaman Berhasil Ditambahkan');
        
          
        } catch(\Error $e){
            return \Redirect::to("/home")->with('error', 'Data Peminjaman Gagal Ditambahkan');
        }    

    }


    public function edit($id)
    {

        $data = Peminjaman::find($id);
        $book = Book::all();
        return view('pages/peminjaman/edit', compact('data','book'));
    }



}
