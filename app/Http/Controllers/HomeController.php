<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use App\Book;
use DB;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Peminjaman::select('peminjaman.id','id_buku','no_hp','nama_peminjam','tgl_peminjaman','tgl_kembali', 'total_hari', 'total_harga', 'book.nama_buku')
        ->Join('book', 'book.id', '=', 'peminjaman.id_buku')
        ->orderBy('peminjaman.id','desc')
        ->paginate(2);
        return view('home', compact('data'));
    }

    public function destroy($id)
    {     
        $store = Peminjaman::where('id', $id)->first();

        $buku = Book::where('id',$store->id_buku)->first();
        $buku->status =false;
        $buku->save();
        
        $barang = Peminjaman::where('id', $id)->delete();

        return \Redirect::to("/home")->with('success', 'Berhasil Menghapus Data Buku ');
    }


    public function update(Request $request, $id)
    {
        
        // \Validator::make($request->all(), [
        //     'id_buku' => 'required|max:255', 
        //     'tgl_peminjaman' => 'required|max:255', 
        //     'tgl_pengembalian' => 'required|max:255', 
        //     'total_hari' => 'required|integer', 
        //     'harga' => 'required|integer',
        // ])->validate();

        \DB::beginTransaction();
        try{
            $buku = Book::where('id',$request->id_buku)->first();
            $buku->status =true;
            $buku->save();

            $store = Peminjaman::where('id', $id)->first();

            $store->id_buku             = $request->id_buku; 
            $store->tgl_peminjaman      = $request->tgl_peminjaman;
            $store->tgl_kembali         = $request->tgl_pengembalian; 
            $store->total_hari          = $request->total_hari;   
            $store->total_harga         = $request->harga; 
            $store->no_hp               = $request->no_hp;   
            $store->nama_peminjam         = $request->nama_peminjam;  
            $store->save();
                
            \DB::commit();
            return \Redirect::to("/home")->with('success', 'Data Peminjaman Berhasil DiUpdate');

        } catch(\Error $e){
            return \Redirect::to("/home")->with('error', 'Data Peminjaman Berhasil DiUpdate');
        }  


    }
    
}
