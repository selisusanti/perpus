<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\peminjaman;
use DB;
use Validator;

class BookController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Book::paginate(2);
        return view('pages/book/index', compact('data'));
    }

    public function create()
    {
        return view('pages/book/create');
    }


    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'no_buku' => 'required|max:255', 
            'nama_buku' => 'required|max:255', 
            'penerbit' => 'required|max:255', 
            'tahun_terbit' => 'required|integer', 
            'keterangan' => 'required|max:255', 
        ])->validate();

        \DB::beginTransaction();
        try{
       
           
            $store                = new Book;
            $store->no_buku       = $request->no_buku;
            $store->nama_buku     = $request->nama_buku; 
            $store->penerbit      = $request->penerbit; 
            $store->tahun_terbit  = $request->tahun_terbit;   
            $store->keterangan    = $request->keterangan;   
            $store->status    = false;            
            $store->save();
            
            \DB::commit();
            return \Redirect::to("/buku")->with('success', 'Data Buku Berhasil Ditambahkan');
        
          
        } catch(\Error $e){
            return \Redirect::to("/buku")->with('error', 'Data Buku Gagal Ditambahkan');
        }    

    }


    public function edit($id)
    {

        $data = Book::find($id);
        return view('pages/book/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        
        \Validator::make($request->all(), [
            'no_buku' => 'required|max:255', 
            'nama_buku' => 'required|max:255', 
            'penerbit' => 'required|max:255', 
            'tahun_terbit' => 'required|integer', 
            'keterangan' => 'required|max:255', 
        ])->validate();


        \DB::beginTransaction();
        try{
       
            $store = Book::where('id',$id)->first();
            $store->no_buku       = $request->no_buku;
            $store->nama_buku     = $request->nama_buku; 
            $store->penerbit      = $request->penerbit; 
            $store->tahun_terbit  = $request->tahun_terbit;   
            $store->keterangan    = $request->keterangan;           
            $store->save();
        
            \DB::commit();
            return \Redirect::to("/buku")->with('success', 'Data Buku Berhasil Update');
          
          
        } catch(\Error $e){
            return \Redirect::to("/buku")->with('error', 'Data Buku Gagal Update');
        }     
    }

    public function destroy($id)
    {     
        
        $checkdata = peminjaman::where('id_buku', $id)->first();
       
        \DB::beginTransaction();
        try{          

            if( empty($checkdata)) {
                $barang = Buku::where('id', $id)->delete();
                \DB::commit();

                return \Redirect::to("/buku")->with('success', 'Berhasil Menghapus Data Buku ');
            } else {
                // dd('gaaaaagal');
                \DB::rollBack();
                return \Redirect::to("/buku")->with('error', 'Gagal menghapus Data Buku karena data sudah digunakan');
            }

        } catch(\Error $e){
            \DB::rollBack();
            return \Redirect::to("/buku")->with('error', 'Gagal menghapus Data Buku karena data sudah digunakan');
        }

    }

}
