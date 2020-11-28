@extends('layouts.master')
@section('content')
<h1>Edit Data Posts Category</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <form action="/kategori/{{$posts_category->id}}/update" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="update_name">Name</label>
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
@endsection