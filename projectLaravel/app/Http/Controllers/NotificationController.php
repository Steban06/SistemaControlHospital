<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Get user notifications (paginated) for the view.
     */
    public function index(Request $request)
    {
        $query = auth()->user()->notifications();

        // Filter by type if specified
        if ($request->has('type') && $request->type !== 'all') {
            $query->where('type', 'like', "%{$request->type}%");
        }

        // Filter by read status
        if ($request->has('read_status')) {
            if ($request->read_status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->read_status === 'read') {
                $query->where('is_read', true);
            }
        }

        $notifications = $query->paginate(20);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'notifications' => $notifications
            ]);
        }
        
        // Return view if not making an API call (if you have a dedicated notifications page)
        return view('notificaciones', compact('notifications'));
    }

    /**
     * Get unread notifications (API).
     */
    public function getUnread()
    {
        // Custom logic for 'is_read'
        $notifications = auth()->user()->notifications()
                            ->where('is_read', false)
                            ->limit(10)
                            ->get();
        return response()->json(['success' => true, 'notifications' => $notifications]);
    }

    /**
     * Get count of unread notifications (API).
     */
    public function getCount()
    {
        $count = auth()->user()->notifications()
                    ->where('is_read', false)
                    ->count();
        return response()->json(['success' => true, 'count' => $count]);
    }

    /**
     * Mark a notification as read.
     */
    public function markAsRead($id)
    {
        $notification = auth()->user()
            ->notifications()
            ->where('id', $id)
            ->first();

        if ($notification) {
            // Update custom column
            $notification->is_read = true;
            $notification->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Notification not found'], 404);
    }
    
    /**
     * Mark all notifications as read.
     */
    public function markAllAsRead()
    {
        auth()->user()->notifications()
            ->where('is_read', false)
            ->update(['is_read' => true]);
            
        return response()->json(['success' => true]);
    }

    /**
     * Delete a notification.
     */
    public function destroy($id)
    {
        $notification = auth()->user()
            ->notifications()
            ->where('id', $id)
            ->first();

        if ($notification) {
            $notification->delete();
            return response()->json(['success' => true, 'message' => 'Notificación eliminada']);
        }

        return response()->json(['success' => false, 'message' => 'Notification not found'], 404);
    }
}
