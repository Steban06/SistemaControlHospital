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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['MEDICO', 'MOBILIARIO', 'TECNOLOGICO', 'INFRAESTRUCTURA']);
            $table->text('descripcion');
            $table->timestamps();
        });

        Schema::create('bienes_nacionales', function (Blueprint $table) {
            $table->id();
            $table->string('numero_bn')->unique()->comment('Número de bienes nacionales');
            $table->string('nombre');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('serial')->nullable();
            $table->foreignId('ubicacion_id')->constrained('areas')->onDelete('restrict');
            $table->foreignId('clasificacion_id')->constrained('categorias')->onDelete('restrict');
            $table->enum('estado', ['Operativo', 'Dañado', 'En reparación', 'Desincorporado'])->default('Operativo');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('reportes_bn', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bienes_nacional_id')->constrained('bienes_nacionales')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->enum('tipo', ['FALLA', 'MANTENIMIENTO', 'OTRO'])->default('FALLA');
            $table->enum('estado', ['Operativo', 'Dañado', 'En reparación', 'Desincorporado'])->default('Operativo');
            $table->string('usuario_nombre');
            $table->date('fecha_reporte');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienes_nacionales');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('areas');
    }
};

