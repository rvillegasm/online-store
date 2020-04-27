<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->float('total')->nullable();
            $table->bigInteger('customer_details_id')->unsigned()->nullable();

            $table->foreign('customer_details_id')
                ->references('id')
                ->on('customer_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_details_id_foreign');
            $table->dropColumn('customer_details_id');
            $table->dropColumn('total');
        });
    }
}
