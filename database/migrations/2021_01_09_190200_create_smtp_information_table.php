<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmtpInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smtp_information', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 100)->nullable();
            $table->string('smtp_driver', 100)->nullable();
            $table->string('smtp_host', 100)->nullable();
            $table->integer('smtp_port')->nullable();
            $table->string('username', 100)->nullable();
            $table->string('smtp_password', 255)->nullable();
            $table->string('from_name', 100)->nullable();
            $table->string('smtp_encryption', 15)->nullable();
            $table->string('from_email', 160)->unique()->nullable();
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
        Schema::dropIfExists('smtp_information');
    }
}
