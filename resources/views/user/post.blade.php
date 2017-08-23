@extends('user.app')

@section('bg-img', asset('user/img/post-bg.jpg'))

@section('title', $post->title)

@section('sub-heading', $post->subtitle)

@section('main-content')
	
	<!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <small>Created At: <strong>{{ $post->created_at->diffForHumans() }}</strong></small>
                
                    @foreach($post->categories as $category)
                        <small class="pull-right" style="margin-right: 10px;"><a href="#">{{ $category->name }}</a></small>
                    @endforeach 
                
                    {!! htmlspecialchars_decode($post->body) !!}
                    
                    <h4>Tag Clouds:</h4>

                    @foreach($post->tags as $tag)
                        <small style="margin-right: 10px; border-radius: 5px; border: 1px solid gray; padding: 5px;"><a href="#">{{ $tag->name }}</a></small>
                    @endforeach 
                </div>
            </div>
        </div>
    </article>
    <hr>
@endsection