<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLnvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lnvoices', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('supplier_id');
            $table->integer('company_id');
            $table->string('status_invoice')->default('Not Payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lnvoices');
    }
}
