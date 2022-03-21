<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;

    public function resetFields()
    {
        $this->email = '';
        $this->password = '';
    }

    public function loginUser()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password]))
        {
            session()->flash("mesaage", "Successful Login 🌜");
            return redirect()->route('library.books');
        }
        session()->flash("message", "Incorrect credentials, Try again! 🌜");
        $this->resetFields();
        return back();

    }
    
    public function render()
    {
        return view('livewire.login-form');
    }
}
