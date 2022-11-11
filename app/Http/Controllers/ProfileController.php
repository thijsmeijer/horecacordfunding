<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeUserRequest;
use App\Http\Resources\UserProfileResource;
use App\Http\Resources\UserProjectResource;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Profile/Information', [
            'user' => new UserProfileResource(request()->user()),
        ]);
    }

    public function update(ChangeUserRequest $request, User $user)
    {
        $request->user()->update($request->validated());

        return redirect()->route('profile')->with('message', 'Je profiel was succesvol opgeslagen!');
    }

    public function projects(): Response
    {
        return Inertia::render('Profile/Projects/Index', [
            'user' => new UserProjectResource(request()->user()),
        ]);
    }
}
