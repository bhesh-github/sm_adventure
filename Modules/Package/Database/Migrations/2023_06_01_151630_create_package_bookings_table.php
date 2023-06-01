<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->string('full_name');
            $table->string('email');
            $table->string('contact_no');
            $table->string('emergency_no');
            $table->string('address');
            $table->date('tour_date');
            $table->integer('adult');
            $table->integer('children');
            $table->integer('infant');
            $table->integer('total_amount');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('package_bookings');
    }
};
