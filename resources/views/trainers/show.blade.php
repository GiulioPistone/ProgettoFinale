@extends('layouts.app')

@section('content')
<div class="container">

        <trainer-component 
        :id="{{  json_encode($trainer->id )}}"
        :image="{{ json_encode($trainer->image ) }}"
        :name="{{ json_encode($trainer->name ) }}"
        :content="{{json_encode($trainer->content)  }}"
        :email="{{ json_encode($trainer->email) }}"
        :auth_id="{{ Auth::user()->id }}"
        :user_username="'{{ Auth::user()->username }}'"
        :users_avatar="'{{ Auth::user()->avatar }}'"
        :comments_enabled="true"
        :rating="true"
        :trainer_id="{{ $trainer->id }}">
        
        </trainer-component>


</div>
@include('layouts.footer')
@endsection
