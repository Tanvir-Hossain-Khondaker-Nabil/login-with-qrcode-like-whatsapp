<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $users = Admin::get();
    //     return view ('backend.modules.user.index', compact('users'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function loginform()
    {
        return view('backend.admin.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('backend.admin.login');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function loginstore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'email' => 'required',
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $user_data = $request->except(['photo']);

    //     $file = " ";   
         
    //     if($file = $request->file('photo')){
    //         $name = $request->email.'.'.$file->getClientOriginalExtension();
    //         $user_data['photo'] = $file->move('upload/user/',$name);
    //     }

    //     Admin::create($user_data);

    //     session()->flash('msg','Create Successfully');    
    //     session()->flash('cls','success');
            
    //     return redirect()->route('user.index');
    // }

    /**
     * Display the specified resource.
     */
    // public function show(Admin $user)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Admin $user)
    // {
    //     return view ('backend.modules.user.create',compact('user'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Admin $user)
    // {
    //     $user_data = $request->except(['photo']);

    //     $file = " ";
    //     $deleteOldImage = $user->photo;

    //     if($file = $request->file('photo')){
    //         if(file_exists($deleteOldImage)){
    //             unlink($deleteOldImage);
    //         }
    //         $imageName = $request->email.'.'.$file->getClientOriginalExtension();
    //         $user_data['photo'] = $file->move('upload/user/',$imageName);
    //     }
    //     else{
    //         $user_data['photo'] = $user->photo;
    //     }

    //     $user->update($user_data);

    //     session()->flash('msg','Update Successfully');    
    //     session()->flash('cls','warning');
            
    //     return redirect()->route('user.index');
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Admin $user)
    // {
    //     $deleteOldImage = $user->photo;
    //     if(file_exists($deleteOldImage)){
    //         unlink($deleteOldImage);
    //     }

    //     $user->delete();
    //     session()->flash('msg','Delete Successfully');
    //     session()->flash('cls','error');
    //     return redirect()->route('user.index');
    // }
}
