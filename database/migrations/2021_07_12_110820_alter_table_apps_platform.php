<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAppsPlatform extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_platform', function (Blueprint $table) {
            $table->dropColumn('token');
            $table->string('sms_subscription_url')->nullable();
            $table->string('sms_default_sender_address')->nullable();
            $table->string('sms_send_address_aliases')->nullable();
            $table->string('sms_short_code')->nullable();
            $table->string('sms_key_word')->nullable();
            $table->string('subscription_app_id')->nullable();
            $table->string('subscription_password')->nullable();
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
