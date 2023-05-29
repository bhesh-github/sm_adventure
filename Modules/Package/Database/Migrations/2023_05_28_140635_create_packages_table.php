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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('category_id');
            $table->string('thumbnail');
            $table->string('video')->nullable();
            $table->string('map')->nullable();
            $table->string('duration')->nullable();
            $table->string('adult_price')->nullable();
            $table->string('children_price')->nullable();
            $table->string('infant_price')->nullable();
            $table->string('description')->nullable();
            $table->string('included_excluded')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('status')->default('on');
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
        Schema::dropIfExists('packages');
    }
};
