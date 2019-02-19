@extends('layouts.empty')

@section('rightcard')
<h1> Identify Ticket </h1>
<form method="post" action="api/recurringticket">
	{{ csrf_field() }}
	<div class="input-group mx-auto" style="width: 25em; margin-bottom: 1.5em; margin-top: 1em">
	  <input type="text" name="issueID" class="form-control" style="width: 50%;  padding: 1em;" placeholder="Issue ID">
	 </div>
	<button type="button" class="btn btn-primary btn-lg"><i class="fas fa-arrow-left" style="padding-right: 0.5em;"></i>Back</button>
	<button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-arrow-right" style="padding-right: 0.5em;"></i>Continue</button>
</form>
@endsection