<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesHasPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_has_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('sale_id')->nullable();
            $table->integer('quantity');
            $table->timestamps();
        });

        Schema::table('sales_has_packages', function($table){
            $table->foreign('package_id')
                ->references('id')->on('packages')
                ->onDelete('set null');
            $table->foreign('sale_id')
                ->references('id')->on('sales')
                ->onDelete('cascade');
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
        Schema::dropIfExists('sales_has_packages');
    }
}
