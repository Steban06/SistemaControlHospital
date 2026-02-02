<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProfileUpdatedNotification extends Notification
{
    use Queueable;

    protected $user;
    protected $changes;

    /**
     * Create a new notification instance.
     */
    public function __construct($user, $changes = [])
    {
        $this->user = $user;
        $this->changes = $changes;
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
            'type' => 'profile_update',
            'title' => 'Perfil de Usuario Actualizado',
            'message' => "El usuario {$this->user->name} ha actualizado su información de perfil.",
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'changes' => $this->changes, // Opcional: lista de campos cambiados
            'icon' => 'user-pen',
            'color' => 'blue',
        ];
    }
}
