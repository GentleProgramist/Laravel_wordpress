<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeadLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_logs', function (Blueprint $table) {
            $table->id();
            $table->string('vid')->nullable();
            $table->integer('oid')->nullable();
            $table->string('check_status_id')->nullable();
            $table->string('lead_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('aff_sub')->nullable();
            $table->string('aff_sub2')->nullable();
            $table->string('aff_sub3')->nullable();
            $table->string('aff_sub4')->nullable();
            $table->string('aff_sub5')->nullable();
            $table->string('amount')->nullable();
            $table->char('country_code')->nullable();
            $table->text('data')->nullable();
            $table->char('response_code')->nullable();
            $table->text('response')->nullable();
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
        //
    }
}
