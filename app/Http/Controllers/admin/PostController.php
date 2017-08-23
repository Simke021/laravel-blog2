<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Utimam iz baze sve iz kolone posts
        $posts = Post::all();

        // Prikaz na strani 
        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacija umosa
        $this->validate($request, [
            'title'    => 'required', 
            'subtitle' => 'required',
            'slug'     => 'required',
            'body'     => 'required'
            ]);

        // Kreiram Post i ubacujem ga u bazu
        $post = new Post;

        $post->title    = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug     = $request->slug;
        $post->body     = $request->body;

        $post->save();

        // Redirekcija
        return redirect(route('post.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Trazim post u bazi po id-u i uzimam prvi kad naidjem na id koji trazim 
       $post = Post::where('id', $id)->first();      

       // Prikazujem post za editovanje, sva polja popunjavam
       return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validacija editovanog posta
        $this->validate($request, [
            'title'    => 'required', 
            'subtitle' => 'required',
            'slug'     => 'required',
            'body'     => 'required'
            ]);

        // Ubacujem update-ovan post u bazu
        $post = Post::find($id);

        $post->title    = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug     = $request->slug;
        $post->body     = $request->body;

        $post->save();

        // Redirektujem 
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Uzimam post iz baze po id-u i brisem ga
        Post::where('id', $id )->delete();

        // Redirekcija
        return redirect()->back();
    }
}
