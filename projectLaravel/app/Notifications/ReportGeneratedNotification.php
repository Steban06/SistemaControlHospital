<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportGeneratedNotification extends Notification
{
    use Queueable;

    protected $reportType;
    protected $format;

    /**
     * Create a new notification instance.
     */
    public function __construct($reportType, $format)
    {
        $this->reportType = $reportType;
        $this->format = $format;
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
        return [
            'type' => 'report',
            'title' => 'Reporte Generado',
            'message' => "Se ha generado un nuevo reporte de {$this->reportType} en formato {$this->format}",
            'icon' => 'file-text',
            'color' => 'purple',
        ];
    }
}
