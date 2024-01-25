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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id("rental_ID");
            $table->bigInteger("vendor_ID")->references("vendor_ID")->on("vendors")->nullable();
            $table->bigInteger("booth_ID")->references("booth_ID")->on("booths")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
