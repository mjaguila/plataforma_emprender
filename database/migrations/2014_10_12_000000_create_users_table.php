<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->boolean('is_admin')->default(false);
            $table->foreignId('genero_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->bigInteger('cuil')->nullable();
            $table->string('domicilio')->nullable();
            $table->foreignId('localidad_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId('provincia_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->bigInteger('celular')->nullable();
            $table->foreignId('profesion_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->date('fechnac')->nullable();
            $table->string('logo')->nullable();
            $table->string('nombre')->nullable();
            $table->foreignId(('etapa_id'))
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId(('tipos_emprendimiento_id'))
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId(('sector_id'))
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->date('fecha_inicio')->nullable();
            $table->foreignId(('clase_id'))
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId(('empleado_id'))
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->string('face')->nullable();
            $table->string('twitter')->nullable();
            $table->string('insta')->nullable();
            $table->string('web')->nullable();
            $table->string('mail')->nullable();
            $table->text('idea')->nullable();;
            $table->string('pdf')->nullable();
            $table->string('afip')->nullable();
            $table->string('bromatologia')->nullable();
            $table->boolean('autorizado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
