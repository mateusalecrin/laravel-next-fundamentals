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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->uuid('guide_id');
            $table->decimal('amount', 8, 2);
            $table->string('status')->default('pending'); // paid, failed, refunded
            $table->string('payment_gateway_id')->nullable();
            $table->string('method')->nullable(); // cartão, pix, boleto etc.
            $table->json('response')->nullable(); // dados de retorno do gateway
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
