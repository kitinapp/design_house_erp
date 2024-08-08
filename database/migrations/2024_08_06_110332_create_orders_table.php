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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('created_by_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('each_item_amount')->nullable();
            $table->integer('amount')->nullable();
            $table->date('order_date')->nullable();
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('size_id')->constrained('sizes');
            $table->foreignId('stock_item_id')->constrained('stock_items');
            $table->foreignId('paper')->constrained('vendors', 'id');
            $table->foreignId('plate')->constrained('vendors', 'id');
            $table->foreignId('printing')->constrained('vendors', 'id');
            $table->foreignId('lamination')->constrained('vendors', 'id');
            $table->foreignId('binding')->constrained('vendors', 'id');
            $table->date('delivery_date');
            $table->foreignId('created_by')->constrained('users', 'id');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
