@extends('layouts.app')

@section('content')
<div class="container col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header " style="font-size: 35px">{{ __('GYM PARADISE') }}</div>

            
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                    
                    @endif
                    <div class=" container my-5 text-center"> <h2> <strong>PERSONAL TRAINER</strong></h2></div>
                        <gym-component
                         :auth_id="{{ Auth::user()->id }}" 
                         :user_username="'{{ Auth::user()->username }}'"
                         :users_avatar="'{{ Auth::user()->avatar }}'"
                        >
                    </gym-component>  
                
                    @if(Auth::user()->id = 1)
                    
                    <a href="{{ route('trainers.create') }} " class="btn btn-primary my-5">Area Privata</a>
                    @endif
               
                   
            
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
