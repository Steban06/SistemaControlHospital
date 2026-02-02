<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MaintenanceNotification extends Notification
{
    use Queueable;

    protected $maintenance;
    protected $creator;

    /**
     * Create a new notification instance.
     */
    public function __construct($maintenance, $creator)
    {
        $this->maintenance = $maintenance;
        $this->creator = $creator;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        // El activo asociado al mantenimiento
        $assetCode = $this->maintenance->asset->codigo ?? 'Desconocido';

        $message = ($notifiable->id === $this->creator->id)
            ? "Has registrado mantenimiento para el equipo {$assetCode}"
            : "{$this->creator->name} registró mantenimiento para {$assetCode}";

        return [
            'type' => 'maintenance',
            'title' => 'Mantenimiento Registrado',
            'message' => $message,
            'maintenance_id' => $this->maintenance->id,
            'asset_id' => $this->maintenance->asset_id ?? null,
            'creator_id' => $this->creator->id,
            'creator_name' => $this->creator->name,
            'icon' => 'wrench',
            'color' => 'amber',
        ];
    }
}
