<?php

namespace App\Console\Commands;

use App\Models\UserPreference;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class RunSystemBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a system backup if enabled in user preferences';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Check if any user (or specifically admins) has auto backup enabled
        // For broad safety, if ANY specific admin has it enabled, we run it.
        // Assuming we look for admins with the preference.
        
        $shouldRun = UserPreference::where('auto_backup_enabled', true)->exists();

        if (!$shouldRun) {
            $this->info('Auto backup is disabled.');
            return;
        }

        $this->info('Starting backup...');

        $dbName = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST', '127.0.0.1');
        
        // Paths - duplicated from controller (refactor candidate)
        $dumpBinaryPath = 'c:\\xampp\\mysql\\bin\\mysqldump.exe';
        
        $filename = 'backup-auto-' . Carbon::now()->format('Y-m-d-H-i-s') . '.sql';
        $path = storage_path('app/backups/' . $filename);
        
        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        $command = "\"{$dumpBinaryPath}\" --user={$username} --host={$host} {$dbName} > \"{$path}\"";
        if (!empty($password)) {
            $command = "\"{$dumpBinaryPath}\" --user={$username} --password={$password} --host={$host} {$dbName} > \"{$path}\"";
        }

        $output = [];
        $returnVar = 0;
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            $this->error('Backup failed.');
            // Find admins to notify
            $admins = User::where('role', 'admin')->get();
            foreach($admins as $admin) {
                Notification::create([
                    'user_id' => $admin->id,
                    'type' => 'system', 
                    'title' => 'Error de Respaldo Automático',
                    'message' => 'El sistema falló al generar el respaldo automático diario.',
                    'is_read' => false
                ]);
            }
            return;
        }

        $this->info('Backup generated successfully: ' . $path);
        
        // Notify admins
        $admins = User::where('role', 'admin')->get();
        foreach($admins as $adminSaved) {
            // Check if this specific admin wants notifications or simply notify all admins 
            // since this is a system event. logic: notify all admins.
            Notification::create([
                'user_id' => $adminSaved->id,
                'type' => 'system',
                'title' => 'Respaldo Automático Generado',
                'message' => 'El sistema ha generado automáticamente un respaldo de la base de datos.',
                'is_read' => false
            ]);
        }
    }
}
