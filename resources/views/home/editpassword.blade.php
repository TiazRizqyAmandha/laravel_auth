@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
<div class="container">
	<h1>Ubah Data {{Auth::user()->role}} Website Alumni</h1>
	<div class="row">
		<div class="col-lg-12">
			<form action="/home/{{ Auth::user()->id}}/updatepassword" method="POST">
				<input type="hidden" name="status" value="Aktif">
				{{csrf_field()}}
				<div class="form-group">
					<div class="form-group">
						<label><strong>Password</strong></label>
						<input type="checkbox" onclick="myFunction()"></label>
						<input type="password" name="password" class="form-control" id="myInput" required>
					</div>
					<div class="form-group">
						<label><strong>Konfirmasi Password</strong></label>
						<input type="checkbox" onclick="myFunction2()"></label>
						<input type="password" name="password_confirmation" class="form-control" id="myInput2" required>
					</div>
					<button type="submit" class="btn btn-warning" id="btnSubmit" value="Submit">Ubah</button>
				</form>
			</div>
		</div>
	</div>
	@endsection
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") 
        {
        	x.type = "text";
       	} 
        else 
        {
            x.type = "password";
        }
		}
		function myFunction2() {
			var x = document.getElementById("myInput2");
			if (x.type === "password") 
			{
				x.type = "text";
			} 
			else 
			{
				x.type = "password";
			}
		} 
		$(function () {
			$("#btnSubmit").click(function () {
				var password = $("#myInput").val();
				var confirmPassword = $("#myInput2").val();
				if (password != confirmPassword) {
					alert("Passwords do not match.");
					return false;
				}
				return true;
			});
		});
</script>