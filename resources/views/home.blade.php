@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Peminjaman Buku</div>
                <div class="card-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="/buku" class="btn btn-success"> Data Buku</a>
                                <a href="/peminjaman/create" class="btn btn-primary"> + Tambah Peminjaman</a><br><br>

                                <table class="table table-striped">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama Peminjam</th>
                                        <th>No Hp</th>
                                        <th>Nama Buku</th>
                                        <th>Tgl Peminjaman</th>
                                        <th>Tgl pengembalian</th>
                                        <th>Total Hari</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>


						            @foreach($data as $no => $p)
                                        <tr>
							                <td>{{ $data->firstItem() + $no }}</td>
                                            <td>{{ $p->nama_peminjam }}</td>
                                            <td>{{ $p->no_hp }}</td>
                                            <td>{{ $p->nama_buku }}</td>
                                            <td>{{ $p->tgl_peminjaman }}</td>
                                            <td>{{ $p->tgl_kembali }}</td>
                                            <td>{{ $p->total_hari }}</td>
                                            <td>{{ $p->total_harga }}</td>
                                            <td>
                                                <a href="/peminjaman/edit/{{ $p->id }}" class="btn btn-info">Edit</a>
                                                <a href="/delete/{{ $p->id }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach


                                </table>
                                    {{ $data->links() }}
                                    
                                    <br><br>
                                    <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    

</script>