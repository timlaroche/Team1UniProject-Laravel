@extends('layouts.empty')

@section('rightcard')
<h1> Identify user </h1>
<form method="post" action="/api/employeesearch">
	{{ csrf_field() }}
	<div class="input-group mx-auto" style="width: 25em; margin-bottom: 1.5em; margin-top: 1em">
	  <input type="text" name="Extension" class="form-control" style="width: 25%;  padding: 1em;" placeholder="Extension">
	  <input type="text" name="ID" class="form-control" style="width: 25%;  padding: 1em;" placeholder="ID">
	 </div>
	<button type="button" class="btn btn-primary btn-lg"><i class="fas fa-arrow-left" style="padding-right: 0.5em;"></i>Back</button>
	<button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-arrow-right" style="padding-right: 0.5em;"></i>Continue</button>
</form>
@endsection