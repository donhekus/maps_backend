<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPopupItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('popup_items', function (Blueprint $table) {
            $table->unsignedInteger('popup_id');
            $table->foreign('popup_id')->references('id')->on('popups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('popup_items', function (Blueprint $table) {
            $table->dropForeign('popups_popup_id_foreign');
            $table->dropColumn('popup_id');
        });
    }
}
