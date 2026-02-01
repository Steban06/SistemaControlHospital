<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of notifications for the authenticated user.
     */
    public function index(Request $request)
    {
        $query = Notification::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc');

        // Filtrar por tipo si se especifica
        if ($request->has('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        // Filtrar por estado de lectura
        if ($request->has('read_status')) {
            if ($request->read_status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->read_status === 'read') {
                $query->where('is_read', true);
            }
        }

        $notifications = $query->paginate(10);

        return view('notificaciones', compact('notifications'));
    }

    /**
     * Get unread notifications for dropdown (max 5 recent).
     */
    public function getUnread()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->where('is_read', false)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return response()->json([
            'success' => true,
            'notifications' => $notifications,
            'count' => $notifications->count()
        ]);
    }

    /**
     * Get count of unread notifications.
     */
    public function getCount()
    {
        $count = Notification::where('user_id', Auth::id())
            ->where('is_read', false)
            ->count();

        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }

    /**
     * Mark a specific notification as read.
     */
    public function markAsRead($id)
    {
        $notification = Notification::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $notification->update(['is_read' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Notificación marcada como leída.'
        ]);
    }

    /**
     * Mark all notifications as read for the authenticated user.
     */
    public function markAllAsRead()
    {
        Notification::where('user_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Todas las notificaciones han sido marcadas como leídas.'
        ]);
    }

    /**
     * Delete a notification.
     */
    public function destroy($id)
    {
        $notification = Notification::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $notification->delete();

        return response()->json([
            'success' => true,
            'message' => 'Notificación eliminada.'
        ]);
    }
}
