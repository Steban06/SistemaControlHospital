<?php

use App\Http\Controllers\AirAcondController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BNController;
use App\Http\Controllers\MaintenanceController;
// Generacion de reportes
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UserPreferenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('login');
})->name('login');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('inicio')->with('login_success', 'Bienvenido de nuevo, ' . Auth::user()->name);
    }

    return back()->withErrors([
        'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ])->onlyInput('email');
})->name('login.post');

Route::any('/logout', function () {
    return redirect()->route('login');
})->name('logout');

use App\Http\Controllers\DashboardController;

// Route::get('/inicio', [DashboardController::class, 'index'])->name('inicio');
Route::get('/inicio', DashboardController::class)->name('inicio');

Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes');
Route::get('/reportes/general', [ReportesController::class, 'reporteGeneral'])->name('reportes.general');
Route::get('/reportes/aires', [ReportesController::class, 'reporteAires'])->name('reportes.aires');
Route::get('/reportes/mantenimiento', [ReportesController::class, 'reporteMantenimiento'])->name('reportes.mantenimiento');
Route::get('/reportes/analitico', [ReportesController::class, 'reporteAnalitico'])->name('reportes.analitico');
Route::get('/reportes/{tipo}/pdf', [ReportesController::class, 'generarPDF'])->name('reportes.pdf');
Route::post('/reportes/custom', [ReportesController::class, 'generarReportePersonalizado'])->name('reportes.custom');
Route::post('/reportes/export-excel', [App\Http\Controllers\ExcelExportController::class, 'exportarExcel'])->name('reportes.excel');

Route::prefix('bienes-nacionales')->group(function () {
    Route::get('/', [BNController::class, 'index'])->name('bienes-nacionales.index');
    Route::post('/', [BNController::class, 'store'])->name('bienes-nacionales.store');
    Route::put('/{id}', [BNController::class, 'update'])->name('bienes-nacionales.update');
    // Route::delete('/{id}', [BNController::class, 'destroy'])->name('bienes-nacionales.destroy');
    Route::get('/history/{id}', [BNController::class, 'history'])->name('bienes-nacionales.history');
    Route::get('/history/{id}/pdf', [BNController::class, 'downloadHistoryPDF'])->name('bienes-nacionales.history.pdf');
    Route::get('/{id}/pdf', [BNController::class, 'downloadPDF'])->name('bienes-nacionales.pdf');
    Route::get('/{id}/qr', [BNController::class, 'generateQR'])->name('bienes-nacionales.qr');
});

// Route::get('/bienes-nacionales', [BNController::class, 'index'])->name('bienes-nacionales.index');
// Route::post('/bienes-nacionales', [BNController::class, 'store'])->name('bienes-nacionales.store');
// Route::put('/bienes-nacionales/{id}', [BNController::class, 'update'])->name('bienes-nacionales.update');

// Route::delete('/bienes-nacionales/{id}', [BNController::class, 'destroy'])->name('bienes-nacionales.destroy');


Route::prefix('aires-acondicionados')->group(function () {
    Route::get('/', [AirAcondController::class, 'index'])->name('aires-acondicionados.index');
    Route::post('/', [AirAcondController::class, 'store'])->name('aires-acondicionados.store'); // Quita el texto extra
    Route::put('/{id}', [AirAcondController::class, 'update'])->name('aires-acondicionados.update');
    Route::get('/history/{id}', [AirAcondController::class, 'history'])->name('aires-acondicionados.history');
    Route::get('/history/{id}/pdf', [AirAcondController::class, 'downloadHistoryPDF'])->name('aires-acondicionados.history.pdf');
});

Route::get('/aires-acondicionados/{id}/edit', [AirAcondController::class, 'edit'])->name('aires-acondicionados.edit');
Route::get('/aires-acondicionados/{id}', [AirAcondController::class, 'show'])->name('aires-acondicionados.show');




Route::get('/mantenimiento', [MaintenanceController::class, 'index'])->name('mantenimiento.index');
Route::post('/mantenimiento', [MaintenanceController::class, 'store'])->name('mantenimiento.store');



// Manual generation routes
Route::get('/generate-manuals', [App\Http\Controllers\ManualController::class, 'generateBoth'])->name('manuals.generate');
Route::get('/generate-manual-usuario', [App\Http\Controllers\ManualController::class, 'generateUserManual'])->name('manuals.usuario');
Route::get('/generate-manual-tecnico', [App\Http\Controllers\ManualController::class, 'generateTechnicalManual'])->name('manuals.tecnico');

Route::middleware(['auth'])->group(function () {
    // Notifications Routes
    Route::get('/notificaciones', [App\Http\Controllers\NotificationController::class, 'index'])->name('notificaciones.index');
    
    // Notifications API Routes
    Route::prefix('api/notifications')->group(function () {
        Route::get('/unread', [App\Http\Controllers\NotificationController::class, 'getUnread'])->name('notifications.unread');
        Route::get('/count', [App\Http\Controllers\NotificationController::class, 'getCount'])->name('notifications.count');
        Route::post('/{id}/read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
        Route::post('/mark-all-read', [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
        Route::delete('/{id}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.destroy');
    });

    Route::get('/configuracion', function () {
        if (auth()->user()->role === 'guest') {
            abort(403, 'No tiene permisos para acceder a esta sección.');
        }

        $users = App\Models\User::all(); 
        
        $stats = [
            'admin' => $users->where('role', 'admin')->count(),
            'user' => $users->where('role', 'user')->count(),
            'guest' => $users->where('role', 'guest')->count(),
        ];

        // Obtener configuración de respaldo (por defecto false si no existe)
        $autoBackupEnabled = \App\Models\UserPreference::where('user_id', auth()->id())
            ->value('auto_backup_enabled') == 1;

        return view('configuracion', compact('users', 'stats', 'autoBackupEnabled'));
    })->name('configuracion');

    // User Management Routes
    Route::resource('users', UserController::class)->except(['create', 'show', 'edit']);

    // Profile Routes
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // User Preferences Routes
    Route::get('/user-preferences', [UserPreferenceController::class, 'show'])->name('preferences.show');
    Route::post('/user-preferences', [UserPreferenceController::class, 'update'])->name('preferences.update');
    Route::post('/user-preferences/theme', [UserPreferenceController::class, 'updateTheme'])->name('preferences.theme');

    // Backup Routes
    Route::get('/backup/download', [App\Http\Controllers\BackupController::class, 'downloadBackup'])->name('backup.download');
    Route::post('/backup/restore', [App\Http\Controllers\BackupController::class, 'restoreBackup'])->name('backup.restore');
    Route::post('/backup/auto-toggle', [App\Http\Controllers\BackupController::class, 'toggleAutoBackup'])->name('backup.auto-toggle');
});