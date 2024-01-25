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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id("complaint_ID");
            $table->string("vendor_ID")->references("vendor_ID")->on("vendors");
            $table->string("title", 256);
            $table->string("description", 256);
            $table->enum("complaint_status", ['In Progress', 'Response']);
            $table->string("reply", 256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};