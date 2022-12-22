<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserRepository extends BaseRepository
{
    public function getModel(): User
    {
        return new User();
    }

    public function getAllUsers(): Collection
    {
        return User::select('id', 'name', 'lastname', 'email', 'phone', 'company', 'disabled_at')->get();
    }

    public function updateUser(Request $data, User $user): void
    {
        $user->name = $data->name;
        $user->lastname = $data->lastname;
        $user->phone = $data->phone;
        $user->company = $data->company;
        $user->address = $data->address;

        $user->save();

        Log::channel('contlog')->info('The user '.Auth::user()->name.' with id '.Auth::user()->id.
            ' updated the user with id '.$user->id);
    }

    public function usersSearch(Request $request): Collection
    {
        return User::whereDate('created_at', '>=', $request->get('initial-date'))
            ->whereDate('created_at', '<=', $request->get('end-date'))->orderBy('created_at', 'Asc')
            ->get(['id', 'name', 'lastname', 'identification', 'address', 'phone', 'email', 'created_at']);
    }

    public function toggleUser(User $user): void
    {
        $user->disabled_at = $user->disabled_at ? null : now();

        $user->save();

        if ($user->disabled_at === null) {
            Log::warning('The user '.auth()->user()->name.' with id '.auth()->user()->id.
                ' enabled user account with id: '.$user->id);
        } else {
            Log::warning('The user '.auth()->user()->name.' with id '.auth()->user()->id.
                ' disabled user account with id: '.$user->id);
        }
    }
}
