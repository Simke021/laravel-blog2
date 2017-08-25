@extends('user.app')

@section('bg-img', Storage::disk('local')->url($post->image))

@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/prism.css')}}">
@endsection

@section('title', $post->title)

@section('sub-title', $post->subtitle)

@section('main-content')
	
	<!-- Post Content -->

<!-- Facebook Comments -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/sr_RS/sdk.js#xfbml=1&version=v2.10&appId=265648440606199";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <article>  
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <small>Created At: <strong>{{ $post->created_at->diffForHumans() }}</strong></small>
                
                    @foreach($post->categories as $category)
                      <a href="{{ route('category',$category->slug) }}"><small class="pull-right" style="margin-right: 10px;">{{ $category->name }}</small></a>
                    @endforeach 
                
                    {!! htmlspecialchars_decode($post->body) !!}
                    
                    <h4>Tag Clouds:</h4>

                    @foreach($post->tags as $tag)
                        <a href="{{ route('tag',$tag->slug) }}"><small style="margin-right: 10px; border-radius: 5px; border: 1px solid gray; padding: 5px;">{{ $tag->name }}</small></a>
                    @endforeach 
                </div>
                <div>
                  <hr>
                </div>

                @if (Auth::user())
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                      <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5"></div>
                    </div>
                @else
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 text-center">
                      <h4 class="alert alert-danger">You must be logged in to post a comment!</h4>
                    </div>
                @endif
                
            </div>
        </div>
    </article>
    <hr>
@endsection

@section('footer')
    <script src="{{ asset('user/js/prism.js')}}"></script>
@endsection