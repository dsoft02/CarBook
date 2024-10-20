<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
   {
       Schema::create('ratings', function (Blueprint $table) {
           $table->id();
           $table->foreignId('car_id')->constrained()->onDelete('cascade');
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
           $table->tinyInteger('rating')->unsigned()->default(0)->comment('Rating value between 1 and 5');
           $table->text('comment')->nullable();
           $table->timestamps();
       });
   }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
