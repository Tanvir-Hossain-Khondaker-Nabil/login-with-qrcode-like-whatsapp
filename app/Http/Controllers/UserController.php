<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::get();
        return view ('backend.modules.user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_data = $request->except(['photo']);

        $file = " ";   
         
        if($file = $request->file('photo')){
            $name = $request->email.'.'.$file->getClientOriginalExtension();
            $user_data['photo'] = $file->move('upload/admin/',$name);
        }

        Admin::create($user_data);

        session()->flash('msg','Create Successfully');    
        session()->flash('cls','success');
            
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view ('backend.modules.user.create',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $user_data = $request->except(['photo']);

        $file = " ";
        $deleteOldImage = $admin->photo;

        if($file = $request->file('photo')){
            if(file_exists($deleteOldImage)){
                unlink($deleteOldImage);
            }
            $imageName = $request->email.'.'.$file->getClientOriginalExtension();
            $user_data['photo'] = $file->move('upload/admin/',$imageName);
        }
        else{
            $user_data['photo'] = $admin->photo;
        }

        $admin->update($user_data);

        session()->flash('msg','Update Successfully');    
        session()->flash('cls','warning');
            
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $deleteOldImage = $admin->photo;
        if(file_exists($deleteOldImage)){
            unlink($deleteOldImage);
        }

        $admin->delete();
        session()->flash('msg','Delete Successfully');
        session()->flash('cls','error');
        return redirect()->route('admin.index');
    }
}
