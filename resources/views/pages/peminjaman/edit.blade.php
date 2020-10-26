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
            <h1>Form Ubah Peminjaman</h1>
        </div>
        <div class="container">
		    <div class="row">
			    <div class="col-sm-12">
                    <form role="form" action="{{ route('update-peminjaman', $data->id) }}" method="post" id="form" class="needs-validation" novalidate="">
                    {{ csrf_field() }}
                    <div >
                    <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Name Buku </label>
                            <div class="col-sm-9">
                            <input type="hidden" name="id_buku" value="{{ $data->id_buku }}" class="form-control" >

                            <select class="form-control" name="kete_buku" required readonly>
                                @foreach($book as $brg)

                                    @if ($brg->id == $data->id_buku)
                                        <option value="{{$brg->id_buku}}" selected>{{$brg->nama_buku}}</option>                                
                                     
                                    @endif

                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> No hp </label>
                            <div class="col-sm-9">
                                <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP Peminjam" value="{{ $data->no_hp ?? old('no_hp') }}">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Nama Peminjam </label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_peminjam" class="form-control" placeholder="Nama Peminjam" value="{{ $data->nama_peminjam ?? old('nama_peminjam') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Tgl Peminjaman </label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_peminjaman" value="{{ $data->tgl_peminjaman ?? old('tgl_peminjaman') }}" class="form-control" placeholder="Tanggal Peminjaman" >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Tgl Pengembalian </label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_pengembalian" value="{{ $data->tgl_kembali ?? old('tgl_kembali') }}" class="form-control" placeholder="Tanggal Pengembalian" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Total Hari</label>
                            <div class="col-sm-9">
                                <input type="text" id="total_hari" name="total_hari" value="{{ $data->total_hari ?? old('total_hari') }}" class="form-control" placeholder="Total Hari" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Harga </label>
                            <div class="col-sm-9">
                            <input type="text" id="harga" name="harga" class="form-control harga" value="{{ $data->total_harga ?? old('total_harga') }}" readonly placeholder="Harga " >
                            </div>
                        </div>

                    </div>
                    <div >
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        <a class="btn btn-danger" href="{{ url('home') }}"><i class="fas fa-times"></i> Kembali</a>
                    </div>
                    </form>
		
                </div>
			</div>
        </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
     $(document).ready(function () {
        $('#total_hari').on( 'keyup', function () {
            var hari = $(this).val();
            var harga = hari * 5000 ;
            document.getElementById('harga').value = harga;
        });

     });

     function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            
        return true;
    }
  

    </script>    
</body>
</html>
