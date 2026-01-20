<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aires_acondicionados', function (Blueprint $table) {
            $table->id();
            $table->string('numero_bn')->unique();
            $table->string('nombre_aa');
            $table->string('modelo')->nullable();
            $table->string('capacidad')->nullable();
            $table->string('voltaje_rango')->nullable();
            $table->string('refrigerante_tc')->nullable();
            
            // Presiones, estados don forman un solo campo
            $table->string('presion_alta')->nullable();
            $table->string('presion_baja')->nullable();
            
            // Estado del equipo usando ENUM
            $table->enum('estado', [
                'operativo', 
                'mantenimiento', 
                'fuera de servicio'
            ])->default('operativo');

            $table->json('especificaciones')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('materiales_faltantes', function (Blueprint $table) {
            $table->id();
            
            // Relación con el Aire Acondicionado
            // Si el aire se elimina de la base de datos, sus materiales faltantes también se borran (onDelete cascade)
            $table->foreignId('aire_id')
                  ->constrained('aires_acondicionados')
                  ->onDelete('cascade');

            // Información del material
            $table->string('nombre_material'); // Ej: "Capacitador 45uF", "Filtro Secador"
            $table->integer('cantidad')->default(1);
            
            // Gestión de urgencia y estado
            $table->enum('prioridad', ['baja', 'media', 'alta'])->default('media');
            $table->enum('estado', ['pendiente', 'en compra', 'recibido', 'instalado'])->default('pendiente');
            
            // Campo opcional para detalles específicos (ej: marca o medida exacta)
            $table->text('observaciones')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('reportes_aa', function (Blueprint $table) {
            $table->id();
            
            // Relación con el Aire Acondicionado
            $table->foreignId('aire_id')
                  ->constrained('aires_acondicionados')
                  ->onDelete('cascade');

            // Información del reporte
            $table->text('trabajo_realizado'); // Qué se le hizo
            $table->text('descripcion_intervencion')->nullable(); // Qué problema tenía
            $table->string('tecnico_responsable');

            // Datos del Reporte
            $table->date('fecha_intervencion');
            
            // Tipo de trabajo
            $table->enum('tipo_mantenimiento', [
                'preventivo', 
                'correctivo', 
                'predictivo',
                'instalacion'
            ]);

            $table->enum('estado_final', [
                'Operativo', 
                'En reparación', 
                'Fuera de servicio'
            ])->default('operativo');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes_aa');
        Schema::dropIfExists('materiales_faltantes');
        Schema::dropIfExists('aires_acondicionados');
    }
};
