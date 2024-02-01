<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Receiver;
use Illuminate\Http\Request;

class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receivers = Receiver::get();
        return view ('backend.modules.receiver.index', compact('receivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

        return view('backend.modules.receiver.create',compact('string'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:3|max:255',
            'phone'=>'required',
            'email'=>'required|email|unique:users|unique:receivers',
            'password'=>'required',
            'amount'=>'required',
        ]);
        
        $user_data = $request->except(['photo']);

        $file = " ";   
         
        if($file = $request->file('photo')){
            $name = $request->email.'.'.$file->getClientOriginalExtension();
            $user_data['photo'] = $file->move('upload/user/',$name);
        }

        Receiver::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'amount' => $request->amount,
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        session()->flash('msg','Create Successfully');    
        session()->flash('cls','success');
            
        return redirect()->route('receiver.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Receiver $receiver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receiver $receiver)
    {
        $users = User::where('id',$receiver->id)->first();
        return view ('backend.modules.receiver.create',compact('receiver','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receiver $receiver,User $user)
    {
        $this->validate($request, [
            'name'=>'required|min:3|max:255',
            'phone'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'amount'=>'required',
        ]);

        $receiver->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'amount' => $request->amount,
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        session()->flash('msg','Update Successfully');    
        session()->flash('cls','warning');
            
        return redirect()->route('receiver.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receiver $receiver)
    {
        $receiver->delete();
        session()->flash('msg','Delete Successfully');
        session()->flash('cls','error');
        return redirect()->route('receiver.index');
    }
}
