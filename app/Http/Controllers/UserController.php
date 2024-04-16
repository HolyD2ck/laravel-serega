<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Validate the request.
     */
    public function valid(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'phone' => 'sometimes|string',
            'avatar' => 'sometimes|image',
            'role' => 'sometimes|string',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $this->valid($request);

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $file_name = '/img/avatars/' . time() . $file->getClientOriginalName();
                $file->move(public_path('img/avatars'), $file_name);
                $validatedData['avatar'] = $file_name;
            }

            $validatedData['password'] = Hash::make($validatedData['password']);

            $user = User::create($validatedData);
            $user->save();

            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error creating user: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->valid($request);

            $user = User::findOrFail($id);

            $file_name = $user->avatar;

            if ($request->hasFile('avatar')) {
                try {
                    if ($user->Фото != '/img/user.jpg' && !str_contains($user->Фото, '/faker/')) {
                        unlink(public_path($file_name));
                    }
                } catch (\Exception $e) {
                }
                $file_name = '/img/avatars/' . time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('img/avatars'), $file_name);

            }

            $validatedData['password'] = Hash::make($validatedData['password']);

            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'phone' => $validatedData['phone'] ?? null,
                'role' => $validatedData['role'],
                'avatar' => $file_name,
            ]);

            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error updating user: ' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        try {
            $user = User::find($id);

            $user->delete();
            if ($user->Фото != '/img/user.jpg' && !str_contains($user->Фото, '/faker/')) {
                unlink(public_path($user->avatar));
            }
            return redirect()->back()->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error deleting user: ' . $e->getMessage()]);
        }
    }
}