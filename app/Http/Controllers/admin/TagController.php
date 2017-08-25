<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\tag;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Uzimam sve iz baze/kolone tags
        $tags = Tag::all();

        // Prokazujem na strani
        return view('admin.tag.show', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.tag');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacija
        $this->validate($request, [
            'name' => 'required', 
            'slug' => 'required'
            ]);

        // Kreiram tag
        $tag = new Tag;

        $tag->name = $request->name;
        $tag->slug = $request->slug;

        $tag->save();

        // Redirekcija
        return redirect(route('tag.index'));
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
        // Trazim tag u bazi po id-u i uzimam prvi kad naidjem na id koji trazim 
       $tag = Tag::where('id', $id)->first();      

       // Prikazujem tag za editovanje, sva polja popunjavam
       return view('admin.tag.edit', compact('tag'));
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
            'name' => 'required', 
            'slug' => 'required'
            ]);

        // Ubacujem update-ovanu kategoriju u bazu
        $tag = Tag::find($id);

        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();

        // Redirektujem 
        return redirect(route('tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Uzimam tag iz baze po id-u i brisem ga
        Tag::where('id', $id )->delete();

        // Redirekcija
        return redirect()->back();
    }
}
