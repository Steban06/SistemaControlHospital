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
    /**
     * Enviar notificación cuando se registra un nuevo bien
     */
    public function notifyNewAsset($asset, $createdByUser)
    {
        $users = User::all();
        
        foreach ($users as $user) {
            $preferences = $user->preferences ?? [];
            $shouldNotify = $preferences['notify_new_assets'] ?? true; 

            if (!$shouldNotify) continue;

            // Mensaje personalizado
            $assetCode = $asset->numero_bn ?? 'Desconocido';
            $message = ($user->id === $createdByUser->id)
                ? "Has registrado exitosamente el bien {$assetCode}"
                : "{$createdByUser->name} registró el nuevo bien {$assetCode}";

            // Crear notificación usando el modelo personalizado
            \App\Models\Notification::create([
                'user_id' => $user->id,
                'type' => 'new_asset', // O 'inventory' para coincidir con el frontend
                'title' => 'Nuevo Bien Registrado',
                'message' => $message,
                'is_read' => false
            ]);
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

            // Obtener código del activo
            $assetCode = 'Desconocido';
            if ($maintenance->asset) {
                // Soportar BN y AirAcond usando numero_bn
                $assetCode = $maintenance->asset->numero_bn ?? 'Desconocido';
            }

            $message = ($user->id === $createdByUser->id)
                ? "Has registrado mantenimiento para el equipo {$assetCode}"
                : "{$createdByUser->name} registró mantenimiento para {$assetCode}";

            \App\Models\Notification::create([
                'user_id' => $user->id,
                'type' => 'maintenance',
                'title' => 'Mantenimiento Registrado',
                'message' => $message,
                'is_read' => false
            ]);
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
