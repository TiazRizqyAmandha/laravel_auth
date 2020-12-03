@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-headline" style="background-color: #e6e6e6;">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="margin-top: 10px; font-size: 40px;">Ubah Kategori</h3>
                        </div>
                        <div class="panel-body" style="margin-left: 15px;">
                            <div class="row">
                               <form action="/kategori/{{$posts_category->id}}/update" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="update_name">Nama Kategori</label>
                                    <input name="name" type="text" class="form-control" id="update_name" aria-describedby="emailHelp" placeholder="Name" value="{{$posts_category->name}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="update_status">Status</label>
                                    <select name="status" class="form-control" id="update_status" required>
                                        <option value="Aktif" {{$posts_category->status == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                                        <option value="Tidak Aktif" {{$posts_category->status == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</div>
@endsection