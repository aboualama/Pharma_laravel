<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharma', function (Blueprint $table) {
            $table->id();
            $table->string('patientId')->index();
            $table->string('cf');
            $table->string('patientName');
            $table->string('patientLastName');
            $table->string('medicine');
            $table->string('aifaCode')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('unit')->nullable();
            $table->text('responsable')->nullable();
            $table->string('reciveDate')->nullable();
            $table->date('patientBirthdate')->nullable();
            $table->Json('user')->nullable();
            $table->text('doctor')->nullable();
            $table->string('doctorId')->nullable();
            $table->text('innovative')->nullable();
            $table->text('note')->nullable();

            $table->foreignId('requestNumber')->nullable()->constrained('payment_requests')->unsigned()->onDelete('cascade');

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
        Schema::dropIfExists('reservations');
    }
}
