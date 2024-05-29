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
        Schema::table('appoinment', function (Blueprint $table) {
             $table->foreign('doctor_id','fk_appoinment_to_doctor')
           ->references('id')->on('doctor')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id','fk_appoinment_to_users')
           ->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('consultation_id','fk_appoinment_to_consultation')
           ->references('id')->on('consultation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appoinment', function (Blueprint $table) {
            $table->dropForeign('fk_appoinment_to_doctor');
            $table->dropForeign('fk_appoinment_to_users');
            $table->dropForeign('fk_appoinment_to_consultation');
        });
    }
};
