@extends('user.app')

@section('bg-img', asset('user/img/contact-bg.jpg'))

@section('head')

@section('title', ' Welcome to Home Page')

@section('sub-title', '' )

@section('main-content')
    
    <article>  
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    hello {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </article>
    <hr>
@endsection