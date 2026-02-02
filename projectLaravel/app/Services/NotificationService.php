<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\NewAssetNotification;
use App\Notifications\MaintenanceNotification;
use App\Notifications\RepairRequestNotification;
use Illuminate\Support\Facades\Notification;

class NotificationService
{
    /**
     * Enviar notificación cuando se registra un nuevo bien
     */
    public function notifyNewAsset($asset, $createdByUser)
    {
        // 1. Obtener todos los usuarios
        $users = User::all();
        
        foreach ($users as $user) {
            // Verificar preferencia (si existe en el JSON, default = false)
            // Asumimos que si no existe la key 'notify_new_assets', es true por defecto o false según lógica de negocio.
            // Aquí chequeamos explícitamente el JSON si lo estás usando.
            
            // NOTA: Laravel cast de JSON a array en el modelo User es útil aquí.
            $preferences = $user->preferences ?? [];
            $shouldNotify = $preferences['notify_new_assets'] ?? true; // Default true

            if (!$shouldNotify) continue;

            // Enviar notificación
            // La lógica del mensaje ("Has registrado" vs "User X registró") está dentro de la clase NewAssetNotification
            $user->notify(new NewAssetNotification($asset, $createdByUser));
        }
    }

    /**
     * Enviar notificación cuando se registra un mantenimiento
     */
    public function notifyMaintenance($maintenance, $createdByUser)
    {
        $users = User::all();

        foreach ($users as $user) {
            $preferences = $user->preferences ?? [];
            $shouldNotify = $preferences['notify_maintenance'] ?? true;

            if (!$shouldNotify) continue;

            $user->notify(new MaintenanceNotification($maintenance, $createdByUser));
        }
    }

    /**
     * Enviar notificación de solicitud de reparación (SOLO ADMINS)
     */
    /**
     * Enviar notificación de solicitud de reparación (SOLO ADMINS)
     */
    public function notifyRepairRequest($repair, $reportedByUser)
    {
        // Solo admins reciben esto
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            $preferences = $admin->preferences ?? [];
            $shouldNotify = $preferences['notify_repairs'] ?? true;

            if (!$shouldNotify) continue;

            // Manual creation for custom notification system
            \App\Models\Notification::create([
                'user_id' => $admin->id,
                'type' => 'repair_request', // O 'repair' según convención existente
                'title' => 'Alerta Predictiva',
                'message' => "El sistema detectó anomalías en el equipo. Se recomienda revisión (Solicitud #{$repair->id}).",
                'is_read' => false
            ]);
        }
    }

    /**
     * Notificar a los administradores cuando un usuario actualiza su perfil
     */
    public function notifyProfileUpdated($user, $changes = [])
    {
        // Solo notificar si el usuario que actualizó NO es administrador
        if ($user->role === 'admin') return;
        
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            // No notificarse a sí mismo si un admin actualiza su propio perfil (redundante con el check de arriba, pero seguro)
            if ($admin->id === $user->id) continue;

            \App\Models\Notification::create([
                'user_id' => $admin->id,
                'type' => 'profile_update',
                'title' => 'Perfil de Usuario Actualizado',
                'message' => "El usuario {$user->name} ha actualizado su información de perfil.",
                'is_read' => false
            ]);
        }
    }
}
