@extends('layouts.app')

@section('content')
<div class="">
    <div class="w-75 mx-auto" style="margin-top: 100px !important;">
        <h2 class="text-center mt-5">Ehy <u>{{ Auth::user()->username }}</u>!</h2>
    </div>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-4 text-center">
            <img src="{{ asset('avatars/' . Auth::user()->avatar) }}" alt="User avatar"
                style="width:150px; height:150px; border-radius: 50%; object-fit: cover;">
        </div>
        <div class="col-md-4 my-auto profile-data">
            <h5><strong>Your data:</strong></h5>
            <p class="text-right p-0 m-0"><u>Name</u>: {{ Auth::user()->name }}</p>
            <p class="text-right p-0 m-0"><u>Surname</u>: {{ Auth::user()->surname }}</p>
            <p class="text-right p-0 m-0"><u>Email</u>: {{ Auth::user()->email }}</p>
            <p class="text-right p-0 m-0"><u>Username</u>: {{ Auth::user()->username }}</p>
            <p class="text-right"><u>Registration date</u>: {{ Auth::user()->created_at->diffForHumans() }}</p>
        </div>
    </div>
    <hr class="mb-5 w-50 mx-auto mt-5">
    <div class="container w-75">
        <h3 class="text-center">Your Exercise </h3>
        <div class="row">
            <div class="alert alert-success mx-auto d-none" id="divMessages" role="alert">
   
            </div>
        </div>
</div>
@include('layouts.footer')
@endsection