<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    protected $notificationService;

    public function __construct(\App\Services\NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

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
        $user = User::findOrFail($id);
        $currentUser = auth()->user();

        // Check Permissions: Admin can edit anyone; User can only edit themselves
        if ($currentUser->role !== 'admin' && $currentUser->id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Validation Rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8',
        ];

        // Only Admin can update Role and Status
        if ($currentUser->role === 'admin') {
            $rules['role'] = ['required', Rule::in(['admin', 'user', 'guest'])];
            $rules['status'] = ['nullable', Rule::in(['Activo', 'Inactivo'])];
        }

        $validated = $request->validate($rules);

        $dataToUpdate = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        // Apply Role and Status changes only if Admin
        if ($currentUser->role === 'admin') {
            $dataToUpdate['role'] = $validated['role'];
            if (isset($validated['status'])) {
                $dataToUpdate['status'] = $validated['status'];
            }
        }

        // Update password if provided
        if (!empty($validated['password'])) {
            $dataToUpdate['password'] = Hash::make($validated['password']);
        }

        $user->update($dataToUpdate);

        // Notify Admins if a normal user updated their profile
        if ($currentUser->role !== 'admin') {
             $this->notificationService->notifyProfileUpdated($user, $dataToUpdate);
        }

        // Return logic: If it's a JSON request (AJAX) or HTML form
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Usuario actualizado correctamente',
                'user' => $user
            ]);
        }
        
        return redirect()->back()->with('success', 'Información actualizada correctamente');
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
