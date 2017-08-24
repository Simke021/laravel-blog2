@extends('user.app')

@section('bg-img', asset('user/img/home-bg.jpg'))

@section('title', 'Welcome to My Blog')

@section('sub-title', 'A Clean Blog Theme by Start Bootstrap')

@section('main-content')
	<!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">                
            @foreach($posts as $post)

                <div class="post-preview">
                    <a href="{{ route('post', $post->slug) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                    </a>
                    <h3 class="post-subtitle">{{ $post->subtitle }}</h3>
                    <p class="post-meta">Posted by: <strong><a href="#">Admin</a></strong> {{ $post->created_at->diffForHumans() }}</p>

                </div>
                <hr>
            @endforeach            
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        {{ $posts->links() }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>
@endsection