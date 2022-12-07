<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->bigInteger('own_contribution')->after('description');
            $table->bigInteger('external_contribution')->after('own_contribution');
            $table->bigInteger('crowdfunding_contribution')->after('external_contribution');
            $table->dropColumn('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('own_contribution');
            $table->dropColumn('external_contribution');
            $table->dropColumn('crowdfunding_contribution');
            $table->bigInteger('amount')->after('description');
        });
    }
};
