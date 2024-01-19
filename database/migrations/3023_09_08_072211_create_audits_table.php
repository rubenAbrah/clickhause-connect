<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends \PhpClickHouseLaravel\Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection =  config('database.clickhouse');
        $table = 'audits';

        Schema::connection($connection)->create($table, function (Blueprint $table) { 
            $table->string('id');
            $table->string('user_type')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('event');
            $table->morphs('auditable');
            $table->string('old_values')->nullable(); // JSON
            $table->string('new_values')->nullable(); //JSON
            $table->text('url')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent', 1023)->nullable();
            $table->string('tags')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->index(['user_id',  'auditable_id']);
        });
    }
    // public function up()
    // {

    //#### исполбзование json это экспириментальная функция для включения нужно указать внутри консоли
    //#### SET allow_experimental_object_type=1;
    //#### потом  -->
    // CREATE TABLE audits ( auditable_id Nullable(UInt64),
    // auditable_type String,
    // user_type String,
    // user_id UInt32,
    // event String,
    // old_values JSON,
    // new_values JSON,
    // url String,
    // ip_address String,
    // user_agent String,
    // tags String,
    // created_at DateTime
    //             )
    //             ENGINE = MergeTree() PRIMARY KEY (user_id,  auditable_id)

    //     ');
    // }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        static::write('DROP TABLE audits');
    }
};
