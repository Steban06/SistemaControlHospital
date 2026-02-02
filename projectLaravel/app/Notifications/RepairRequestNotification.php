<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RepairRequestNotification extends Notification
{
    use Queueable;

    protected $repair;
    protected $reporter;

    /**
     * Create a new notification instance.
     */
    public function __construct($repair, $reporter)
    {
        $this->repair = $repair;
        $this->reporter = $reporter;
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
        $assetCode = $this->repair->asset->codigo ?? 'Desconocido';

        return [
            'type' => 'repair', // Podemos mantener el tipo interno como 'repair' o cambiarlo a 'predictive_alert' si prefieres
            'title' => 'Alerta Predictiva',
            'message' => "El sistema detectó anomalías en el equipo {$assetCode}. Se recomienda revisión.",
            'repair_id' => $this->repair->id,
            'asset_id' => $this->repair->asset_id ?? null,
            'reporter_id' => $this->reporter->id, // En este caso sería el 'sistema' o null, pero mantenemos compatibilidad por ahora
            'reporter_name' => 'Sistema Inteligente',
            'priority' => 'high',
            'icon' => 'brain-circuit',
            'color' => 'indigo',
        ];
    }
}
