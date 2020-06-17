<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->decimal('total', 12,3);
            $table->decimal('paid_with', 12,3);
            $table->decimal('money_returned', 12,3);
            $table->datetime('date');
            $table->timestamps();
        });

        Schema::table('sales', function($table){
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sales');
    }
}
