<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChangesColumnToAuditLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audit_logs', function (Blueprint $table) {
            $table->longText('changes')->nullable()->after('message');
            $table->string('auth')->nullable()->after('relation_id');
            $table->unsignedBigInteger('auth_id')->nullable()->after('auth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audit_logs', function (Blueprint $table) {
            $table->dropColumn('changes');
            $table->dropColumn('auth');
            $table->dropColumn('auth_id');
        });
    }
}
