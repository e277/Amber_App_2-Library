<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutUser extends Component
{
    public function render()
    {
        return view('livewire.logout-user');
    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect('/');
    }
}
