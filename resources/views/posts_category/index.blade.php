@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<div class="row">
    <div class="col-6">
        <h1>Data Kategori</h1>
    </div>
    <div class="col-6">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">
            Tambah
        </button>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="table-active">
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts_category as $category)
            <tr>
                <td scope="row">{{$category->name}}</td>
                <td>{{$category->status}}</td>
                <td>
                    <a href="/kategori/{{$category->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Posts Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kategori/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="input_name">Name</label>
                        <input name="name" type="text" class="form-control" id="input_name" placeholder="Name">
                    </div>
                    <input type="hidden" name="status" value="Aktif">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection