<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return $this->user->all();
    }

    public function view($id)
    {
        $user = $this->user->findOrFail($id);

        return $user;
    }

    public function updatePassword(array $data, $id)
    {
        if ($this->user()->hasRole('ADMIN')){
            $user = User::where('id', $id)->firstOrFail();

            if ($user){
                $user->update(['password' => bcrypt($data['password'])]);
            }
            else{
                return $this->error("User not found.");
            }
        }
        else{
            return $this->error("You are not authorized to update a badge.");
        }

        return $this->success("User password successfully updated.", $user);
    }

    public function delete($id)
    {
        $user = $this->user->findOrFail($id);
        $user->delete();
        return $user;
    }
}
