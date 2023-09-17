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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->integer("stars")->default(0)->comment("Executed from recommendations table")->nullable();
            $table->decimal("price");
            $table->string("discound")->nullable()->comment("Discound From Admin | out of Copons");
            $table->integer("count")->nullable()->comment("Null if there is size or color becouse eyery size has count");
            
            $table->timestamps();

            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->foreignId("catigory")->constrained("catigories")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
