<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeUserRequest;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Profile/Information', [
            'user' => auth()->user(),
        ]);
    }

    public function update(ChangeUserRequest $request, User $user)
    {
        $request->user()->update($request->validated());

        return redirect()->route('profile')->with('message', 'Je profiel was succesvol opgeslagen!');
    }
}
