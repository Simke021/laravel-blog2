<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.show', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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
            'name' => 'required|min:4, max:50|unique:permissions',
            'for'  => 'required'
            ]);

        $permission = new Permission;

        $permission->name = $request->name;
        $permission->for  = $request->for;
        // Save u bazu
        $permission->save();

        // Redirekcija
        return redirect(route('permission.index'))->with('message', 'Pesmission created succesfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        // Uzimam iz baze
        $permission = Permission::find($permission->id);

        // Prikazujem na strani
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        // Validacija
        $this->validate($request, [
            'name' => 'required|min:4, max:50|unique:permissions',
            'for'  => 'required'
            ]);

        $permission = Permission::find($permission->id);

        $permission->name = $request->name;
        $permission->for  = $request->for;
        // Save u bazu
        $permission->save();

        // Redirekcija i poruka
        return redirect(route('permission.index'))->with('message', 'Pesmission updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        Permission::where('id', $permission->id)->delete();
        return redirect()->back()->with('message', 'Pesmission deleted succesfully.');
    }
}
