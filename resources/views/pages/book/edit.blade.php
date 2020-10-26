<html>
    <head>
        <title>CRUD Penjualan </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>

        <div class="jumbotron text-center">
            <h1>Form Ubah Buku</h1>
        </div>
        <div class="container">
		    <div class="row">
			    <div class="col-sm-12">
                    <form role="form" action="{{ route('update-buku', $data->id) }}" method="POST" id="form" class="needs-validation" novalidate="">
                    {{ csrf_field() }}
                    <div >
                        
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> No Buku</label>
                            <div class="col-sm-9">
                            <input type="text" name="no_buku" class="form-control" placeholder="Nomor Barang" value="{{ $data->no_buku ?? old('no_buku') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Judul Buku</label>
                            <div class="col-sm-9">
                            <input type="text" name="nama_buku" class="form-control" placeholder="Nama Buku" value="{{ $data->nama_buku ?? old('nama_buku') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Penerbit </label>
                            <div class="col-sm-9">
                            <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="{{ $data->penerbit ?? old('penerbit') }}"required>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Tahun Terbit </label>
                            <div class="col-sm-9">
                            <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" value="{{ $data->tahun_terbit ?? old('tahun_terbit') }}" onkeypress="return hanyaAngka(event)" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Keterangan </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan" required>{{$data->keterangan}}</textarea>
                            </div>
                        </div> 
                    </div>
                    <div >
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        <a class="btn btn-danger" href="{{ url('buku') }}"><i class="fas fa-times"></i> Kembali</a>
                    </div>
                    </form>
		
                </div>
			</div>
        </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
