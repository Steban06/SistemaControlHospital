<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAssetNotification extends Notification
{
    use Queueable;

    protected $asset;
    protected $creator;

    /**
     * Create a new notification instance.
     */
    public function __construct($asset, $creator)
    {
        $this->asset = $asset;
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
        // Mensaje personalizado según quién recibe la notificación
        $message = ($notifiable->id === $this->creator->id)
            ? "Has registrado exitosamente el bien {$this->asset->codigo}"
            : "{$this->creator->name} registró el nuevo bien {$this->asset->codigo}";

        return [
            'type' => 'new_asset',
            'title' => 'Nuevo Bien Registrado',
            'message' => $message,
            'asset_id' => $this->asset->id,
            'creator_id' => $this->creator->id,
            'creator_name' => $this->creator->name,
            'icon' => 'box', // Para usar iconos dinámicos en el frontend
            'color' => 'emerald',
        ];
    }
}
