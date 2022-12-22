<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $repository)
    {
        $this->userRepo = $repository;
    }

    public function index(): View
    {
        $users = $this->userRepo->getAllUsers();

        return view('admin.user.index', compact('users'));
    }

    public function show(User $user): View
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $this->userRepo->updateUser($request, $user);

        return redirect()->route('user.index')
            ->with('status_success', 'user update successfully');
    }

    public function toggle(User $user): RedirectResponse
    {
        $this->userRepo->toggleUser($user);

        return redirect()->route('user.index');
    }
}
