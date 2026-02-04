<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\UserPreference; // Asegurar que este modelo existe o usar DB directa si no
use Carbon\Carbon;

use App\Models\Notification;

class BackupController extends Controller
{
    // Ruta al ejecutable de mysqldump y mysql en XAMPP
    // Ajustar si la instalación está en otro disco
    protected $dumpBinaryPath = 'c:\\xampp\\mysql\\bin\\mysqldump.exe';
    protected $mysqlBinaryPath = 'c:\\xampp\\mysql\\bin\\mysql.exe';

    public function downloadBackup()
    {
        $dbName = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST', '127.0.0.1');

        $filename = 'backup-hospital-' . Carbon::now()->format('Y-m-d-H-i-s') . '.sql';
        $path = storage_path('app/backups/' . $filename);
        
        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        $command = "\"{$this->dumpBinaryPath}\" --user={$username} --host={$host} {$dbName} > \"{$path}\"";
        if (!empty($password)) {
            $command = "\"{$this->dumpBinaryPath}\" --user={$username} --password={$password} --host={$host} {$dbName} > \"{$path}\"";
        }

        $output = [];
        $returnVar = 0;
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            // Notify failure
            Notification::create([
                'user_id' => auth()->id(),
                'type' => 'system', 
                'title' => 'Error de Respaldo',
                'message' => 'Falló la generación del respaldo manual.',
                'is_read' => false
            ]);
            return back()->with('error', 'Falló la generación del respaldo. Verifique la ruta de mysqldump.');
        }

        // Notify success
        Notification::create([
            'user_id' => auth()->id(),
            'type' => 'system',
            'title' => 'Respaldo Generado',
            'message' => 'Se ha generado y descargado un nuevo respaldo de la base de datos.',
            'is_read' => false
        ]);

        return response()->download($path)->deleteFileAfterSend(true);
    }

    public function restoreBackup(Request $request)
    {
        $request->validate([
            'backup_file' => 'required|file|mimes:sql,txt'
        ]);

        $file = $request->file('backup_file');
        $path = $file->getRealPath();
        $originalName = $file->getClientOriginalName();

        $dbName = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST', '127.0.0.1');

        $command = "\"{$this->mysqlBinaryPath}\" --user={$username} --host={$host} {$dbName} < \"{$path}\"";
        if (!empty($password)) {
            $command = "\"{$this->mysqlBinaryPath}\" --user={$username} --password={$password} --host={$host} {$dbName} < \"{$path}\"";
        }

        $output = [];
        $returnVar = 0;
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            // Notify failure
            Notification::create([
                'user_id' => auth()->id(),
                'type' => 'system',
                'title' => 'Error de Restauración',
                'message' => 'Falló el intento de restaurar la base de datos desde ' . $originalName,
                'is_read' => false
            ]);

            if($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Error al restaurar la base de datos.'], 500);
            }
            return back()->with('error', 'Error al restaurar la base de datos.');
        }

        // Notify success
        Notification::create([
            'user_id' => auth()->id(),
            'type' => 'system', // or 'backup' if you want a specific icon
            'title' => 'Sistema Restaurado',
            'message' => 'La base de datos se ha restaurado exitosamente desde el archivo ' . $originalName,
            'is_read' => false
        ]);

        if($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Sistema restaurado correctamente.']);
        }
        return back()->with('success', 'Sistema restaurado correctamente.');
    }

    public function toggleAutoBackup(Request $request)
    {
        // Guardar preferencia
        $user = auth()->user();
        if (!$user) return response()->json(['error' => 'Unauthorized'], 401);

        // Usar el modelo UserPreference que tiene columnas específicas
        try {
            $preferences = UserPreference::firstOrCreate(
                ['user_id' => $user->id],
                ['auto_backup_enabled' => false] // Default
            );

            $preferences->auto_backup_enabled = $request->enabled;
            $preferences->save();
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
