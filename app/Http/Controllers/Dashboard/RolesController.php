<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleAbility;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.create',[
            'role'=> new Role(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'abilities'=> 'required|array',
        ]);

        $role = Role::createWithAbilies($request);

        return redirect()->route('dashboard.roles.index')
        ->with('success','Role Created Successully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('dashboard.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'abilities'=> 'required|array',
        ]);

        $role->updateWithAbilies($request);

        return redirect()->route('dashboard.roles.index')
        ->with('success','Role Created Successully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::destroy($id);
    }

    // public function trash(){
    //     $roles = Role::onlyTrashed()->paginate();
    //     return view('dashboard.roles.trash',compact('roles'));
    // }
    // public function restore(Request $request,$id){
    //     $category = Role::onlyTrashed()->findOrFail($id);
    //     $category->restore();

    //     return redirect()->route('dashboard.roles.trash')
    //     ->with('success','Role restored!');
    // }
    // public function forceDelete($id){
    //     $category = Role::onlyTrashed()->findOrFail($id);
    //     $category->forceDelete();

    //     return redirect()->route('dashboard.roles.trash')
    //     ->with('success','Role deleted forever!');
    // }
}
