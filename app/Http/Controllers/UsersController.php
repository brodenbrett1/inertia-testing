<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
            ->through(fn ($user) => $this->_present($user));

        return Inertia::render('Users/Index', [
            'users' => $users,
            'filters' => $validated,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit(?User $user = null)
    {
        return Inertia::render('Users/User', ['user' => $this->_present($user)]);
    }

    public function create()
    {
        dump('test');

        return Inertia::render('Users/User');
    }

    public function store(UserRequest $request)
    {
        User::create($request->validated());

        return to_route('users.index');
    }

    public function update(UserRequest $request, ?User $user = null)
    {
        $user->update($request->validated());

        return to_route('users.index');
    }

    public function show(User $user)
    {
        return Inertia::render('Users/Show', [
            'user' => $this->_present($user),
        ]);
    }

    public function destroy(User $user)
    {
        //
    }

    private function _present(User $user)
    {
        return [
            'id' => $user->uuid,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at->format('l, F jS Y, g:i A'),
        ];
    }
}
