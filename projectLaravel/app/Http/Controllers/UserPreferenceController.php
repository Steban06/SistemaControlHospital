<?php

namespace App\Http\Controllers;

use App\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPreferenceController extends Controller
{
    /**
     * Get the authenticated user's preferences.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show()
    {
        $preferences = UserPreference::getOrCreateForUser(Auth::id());

        return response()->json([
            'success' => true,
            'preferences' => [
                'theme' => $preferences->theme,
                'notify_new_assets' => $preferences->notify_new_assets,
                'notify_maintenance' => $preferences->notify_maintenance,
                'notify_reports' => $preferences->notify_reports,
                'auto_backup_enabled' => $preferences->auto_backup_enabled,
            ]
        ]);
    }

    /**
     * Update the authenticated user's preferences.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'theme' => 'nullable|string|in:light,dark,auto',
            'notify_new_assets' => 'nullable|boolean',
            'notify_maintenance' => 'nullable|boolean',
            'notify_reports' => 'nullable|boolean',
            'auto_backup_enabled' => 'nullable|boolean',
        ]);

        $preferences = UserPreference::getOrCreateForUser(Auth::id());
        $preferences->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Preferencias guardadas exitosamente',
            'preferences' => [
                'theme' => $preferences->theme,
                'notify_new_assets' => $preferences->notify_new_assets,
                'notify_maintenance' => $preferences->notify_maintenance,
                'notify_reports' => $preferences->notify_reports,
                'auto_backup_enabled' => $preferences->auto_backup_enabled,
            ]
        ]);
    }

    /**
     * Update only the theme preference.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTheme(Request $request)
    {
        $validated = $request->validate([
            'theme' => 'required|string|in:light,dark,auto',
        ]);

        $preferences = UserPreference::getOrCreateForUser(Auth::id());
        $preferences->update(['theme' => $validated['theme']]);

        return response()->json([
            'success' => true,
            'message' => 'Tema actualizado exitosamente',
            'theme' => $preferences->theme
        ]);
    }
}
