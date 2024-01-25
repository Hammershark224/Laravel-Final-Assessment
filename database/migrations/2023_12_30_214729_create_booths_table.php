<?php
/**
* BCS3453 [PROJECT]-SEMESTER 2324/1
* Student ID: CB21133
* Student Name: CHONG XUE LIANG
*/
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
        Schema::create('booths', function (Blueprint $table) {
            $table->id("booth_ID");
            $table->string("description", 256);
            $table->enum("status", ['Available', 'Unavailable']);
            $table->integer("number");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booths');
    }
};