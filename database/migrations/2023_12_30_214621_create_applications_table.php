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
        Schema::create('applications', function (Blueprint $table) {
            $table->id("application_ID");
            $table->string("SSM", 256)->nullable();
            $table->string("description", 256)->nullable();
            $table->enum("status", ["received","on review","rejected", "accepted"])->nullable();
            $table->string("vendor_ID")->references("vendor_ID")->on("vendors");          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};