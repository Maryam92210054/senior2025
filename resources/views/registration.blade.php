@extends('layouts.app')
@section('title','register')
@section('content')
<div class="container">
<form class="ms-auto me-auto mt-5" style="width:500px">
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control" name="name">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label class="form-label">Full Name</label>
    <input type="email" class="form-control" name="email" >
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection