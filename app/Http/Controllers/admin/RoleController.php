<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Model\admin\role;
use App\Http\Controllers\Controller;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = role::all();
        return view ('admin.role.show', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
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
        $this->validate($request,[
                'name' => 'required|min:4,max:20|unique:roles'
            ]);

        $role = new role;
        $role->name = $request->name;
        $role->save();
        // Redirekcija
        return redirect(route('role.index'))->with('message', 'Role created succesfully.');
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
         // Trazim role u bazi po id-u i uzimam prvi kad naidjem na id koji trazim 
       $role = Role::where('id', $id)->first();      

       // Prikazujem role za editovanje, sva polja popunjavam
       return view('admin.role.edit', compact('role'));
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
        // Validacija
        $this->validate($request,[
                'name' => 'required|min:4,max:20unique:roles'
            ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        // Redirekcija
        return redirect(route('role.index'))->with('message', 'Role updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        role::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Role deleted succesfully.');
    }
}
