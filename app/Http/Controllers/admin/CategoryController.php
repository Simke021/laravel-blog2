<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\category;


class CategoryController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        // Utimam iz baze sve iz kolone category
        $categories = Category::all();

        return view('admin.category.show', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.category');
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
        $category = new Category;

        $category->name = $request->name;
        $category->slug = $request->slug;

        $category->save();

        // Redirekcija
        return redirect(route('category.index'));
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
        // Trazim category u bazi po id-u i uzimam prvi kad naidjem na id koji trazim 
       $category = Category::where('id', $id)->first();      

       // Prikazujem category za editovanje, sva polja popunjavam
       return view('admin.category.edit', compact('category'));
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
            'name'    => 'required', 
            'slug' => 'required'
            ]);

        // Ubacujem update-ovanu kategoriju u bazu
        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        // Redirektujem 
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Uzimam categoriju iz baze po id-u i brisem je
        Category::where('id', $id )->delete();

        // Redirekcija
        return redirect()->back();
    }
}
