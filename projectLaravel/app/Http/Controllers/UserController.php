<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Enforce Admin Access (Double check, though middleware should handle this)
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $users = User::all();
        return response()->json([
            'success' => true,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => ['required', Rule::in(['admin', 'user', 'guest'])],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Usuario creado exitosamente',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8',
            'role' => ['required', Rule::in(['admin', 'user', 'guest'])],
            'status' => ['nullable', Rule::in(['Activo', 'Inactivo'])],
        ]);

        $dataToUpdate = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];

        // Update status if provided
        if (isset($validated['status'])) {
            $dataToUpdate['status'] = $validated['status'];
        }

        // Only update password if provided
        if (!empty($validated['password'])) {
            $dataToUpdate['password'] = Hash::make($validated['password']);
        }

        $user->update($dataToUpdate);

        return response()->json([
            'success' => true,
            'message' => 'Usuario actualizado correctamente',
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $user = User::findOrFail($id);
        
        // Prevent deleting self
        if ($user->id === auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'No puedes eliminar tu propio usuario.'
            ], 400);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Usuario eliminado correctamente'
        ]);
    }
}
