<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->warn('No users found. Please create users first.');
            return;
        }

        $notifications = [
            [
                'type' => 'maintenance',
                'title' => 'Mantenimiento Pendiente',
                'message' => 'El equipo de Aire Acondicionado Sala de Espera requiere su revisión trimestral programada.',
            ],
            [
                'type' => 'inventory',
                'title' => 'Stock Crítico',
                'message' => 'Quedan menos de 5 unidades de Filtros de Aire (Modelo X-200).',
            ],
            [
                'type' => 'reports',
                'title' => 'Reporte Generado',
                'message' => 'El Reporte Mensual de Activos de Octubre ha sido generado exitosamente.',
            ],
            [
                'type' => 'maintenance',
                'title' => 'Mantenimiento Completado',
                'message' => 'Se completó el mantenimiento preventivo del equipo BN-0045.',
            ],
            [
                'type' => 'inventory',
                'title' => 'Nuevo Bien Nacional Registrado',
                'message' => 'Se ha registrado un nuevo bien nacional: Computadora de Escritorio HP.',
            ],
            [
                'type' => 'reports',
                'title' => 'Reporte Programado',
                'message' => 'El reporte semanal de mantenimiento está programado para generarse mañana.',
            ],
            [
                'type' => 'maintenance',
                'title' => 'Alerta de Mantenimiento',
                'message' => 'El aire acondicionado AC-012 requiere atención urgente.',
            ],
        ];

        // Create notifications for each user
        foreach ($users as $user) {
            // Skip guest users
            if ($user->role === 'guest') {
                continue;
            }

            foreach ($notifications as $index => $notificationData) {
                Notification::create([
                    'user_id' => $user->id,
                    'type' => $notificationData['type'],
                    'title' => $notificationData['title'],
                    'message' => $notificationData['message'],
                    'is_read' => $index > 2, // First 3 are unread
                    'created_at' => now()->subHours(rand(1, 48)),
                ]);
            }
        }

        $this->command->info('Notifications seeded successfully!');
    }
}
