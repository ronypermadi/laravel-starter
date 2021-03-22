<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $users, $name, $email, $password, $user_id;
    public $isOpen = 0;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.index');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->user_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
   
        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
  
        session()->flash('message', 
            $this->user_id ? 'User Updated Successfully.' : 'User Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
    
        $this->openModal();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }

}
