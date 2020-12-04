@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                @if (Session::has('sukses1'))
                <div class="alert alert-success">
                    {{ Session::get('sukses1') }}
                </div>
                @endif
                @if (Session::has('sukses2'))
                <div class="alert alert-warning">
                    {{ Session::get('sukses2') }}
                </div>
                @endif
                @if (Session::has('sukses3'))
                <div class="alert alert-danger">
                    {{ Session::get('sukses3') }}
                </div>
                @endif
                @if (Session::has('gagal'))
                <div class="alert alert-info">
                    {{ Session::get('gagal') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                                <div class="col-lg-6">
                                    <h1 style="text-align: left; margin-left: 10px;">Data Kategori</h1>
                                </div>
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal" style="margin-left: 30px; margin-top: 25px;"><i class="fa fa-check-circle"></i> Tambah</button>
                                    &nbsp;
                                    @if(Auth::user()->role == 'Admin')
                                    <button type="button" class="btn" style="margin-left: 5px; background-color: #ff3399; margin-top: 25px;"><i class="lnr lnr-printer"></i><a href="/kategori/export" style="margin-bottom: 10px; color: white;"> Export Excel</a></button>
                                    <button type="button" class="btn" style="margin-left: 5px; background-color: #ff6600; margin-top: 25px;"><i class="lnr lnr-printer"></i><a href="/kategori/exportpdf" style="margin-bottom: 10px; color: white;"> Export PDF</a></button>
                                    @endif
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                         <tr class="table-active">
                                            <th scope="col">Nama Kategori</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($posts_category as $category)
                                            <tr>
                                                <td scope="row">{{$category->name}}</td>
                                                <td>{{$category->status}}</td>
                                                <td align="center">
                                                    <a href="/kategori/{{$category->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                                                    <a href="/kategori/{{$category->id}}/delete" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kategori/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="input_name">Nama Kategori</label>
                        <input name="name" type="text" class="form-control" id="input_name" placeholder="Nama Kategori" required>
                    </div>
                    <input type="hidden" name="status" value="Aktif">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!-- <script type="text/javascript"> 
        $(function () {
            $("#btnDeleted").click(function () {
                alert("Yakin Ingin Menghapus Data");
                return true;
            });
        });
</script> -->