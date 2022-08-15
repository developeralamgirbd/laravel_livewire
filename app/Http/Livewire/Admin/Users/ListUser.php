<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class ListUser extends Component
{
    public bool $show;
    public $state = [];
    public $user;
    public $userIdBeingRemoved = null;
    public $isCreateFromOpen = false;
    public $isEditFromOpen = false;
    public function render()
    {
        try {
            $users = User::latest()->paginate();
            return view('livewire.admin.users.list-user', [
                'users' => $users,
            ]);
        }catch (\Exception $e){

        }

    }
    public function create(){
        $this->resetCreateForm();
        $this->openCreateFrom();
    }
    public function edit(User $user){
        $this->user = $user;
        $this->state = $user->toArray();
        $this->openEditFrom();
    }
    public function openCreateFrom(){
        $this->isCreateFromOpen = true;
        $this->isEditFromOpen =false;
    }
    public function openEditFrom(){
        $this->isEditFromOpen = true;
        $this->isCreateFromOpen = false;
    }

    public function closeCreateFrom(){
        $this->isCreateFromOpen = false;
    }
    public function closeEditFrom(){
        $this->isEditFromOpen = false;
    }

    public function resetCreateForm(){
        $this->state = [];
    }
    public function store(){
       $validated = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|max:50|regex:"^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"',
        ], [
            'password.regex' => 'The password must be a character, a number and a special character',
       ])->validate();
       $validated['password'] = bcrypt($validated['password']);
       User::create($validated);
        $this->resetCreateForm();
        $this->dispatchBrowserEvent('form-msg', ['message' => 'User added successfully']);
       $this->isCreateFromOpen = false;
    }

    public function update(){
        $validated = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed|min:8|max:50|regex:"^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"',
        ], [
            'password.regex' => 'The password must be a character, a number and a special character',
        ])->validate();
        if (!empty($validated['password'])){
            $validated['password'] = bcrypt($validated['password']);
        }
        $this->dispatchBrowserEvent('form-msg', ['message' => 'User updated successfully']);
        $this->isEditFromOpen = false;
    }
    public function confirmUserRemoval($id){
        $this->userIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function hideDeleteModal(){
        $this->dispatchBrowserEvent('hide-delete-modal');
    }
    public function delete(){
        $user = User::findOrFail($this->userIdBeingRemoved);
        $user->delete();
        $this->dispatchBrowserEvent('delete-msg', ['message' => 'User deleted successfully']);
        return redirect()->back();
    }

}
