<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validated = $request->validate(['q' => 'nullable|string']);

        $searchTerm = $validated['q'] ?? null;

        $users = User::query()
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->whereLike('name', "%{$searchTerm}%");
                $query->orWhereLike('email', "%{$searchTerm}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString()
            ->onEachSide(1)
            ->through(fn ($user) => [
                'id' => $user->uuid,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('l, F jS Y, g:i A'),
            ]);

        return Inertia::render('Users/Index', [
            'users' => $users,
            'filters' => $validated,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function credit(?User $user = null)
    {
        return Inertia::render('Users/User', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function upsert(Request $request, ?User $user = null)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user?->id)],
            'password' => [$user ? 'sometimes' : 'required', 'string', 'min:8'],
        ]);

        if ($user?->exists) {
            $user->update($attributes);
        } else {
            $user = User::create($attributes);
        }

        $message = $user->wasRecentlyCreated
            ? 'Created a new user '.$user->name.'!'
            : 'Updated user '.$user->name.'!';

        return to_route('users.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return Inertia::render('Users/Show', [
            'user' => [
                'id' => $user->uuid,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('l, F jS Y, g:i A'),
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
