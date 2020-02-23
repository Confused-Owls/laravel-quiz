<?php

namespace App\Services;

use App\User;

class UsersServices
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function get()
    {
        return $this->user->get();
    }

    public function store()
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255','unique:App\User'],
            'password' => ['required', 'string', 'min:8'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg','max:2048']
            ]);
    
            if($request->hasFile('image')){
                $image = $request->file('image');
                $random_name = md5(rand().time().rand());
                $new_name = $random_name . '.'. $image->getClientOriginalExtension();
                $avatar = Image::make($image)->resize(100,100);
                $image->move(public_path('images/users'),$new_name);
                $avatar->save(public_path('images/users/avatar/'.$new_name));
                $avatar->save();
            }
            
    }
}