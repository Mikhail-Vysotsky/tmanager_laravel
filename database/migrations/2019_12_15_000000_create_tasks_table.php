<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration {
    public function up() {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->foreign('who')->references('id')->on('users');
            $table->enum('status', ['open', 'in progress', 'done']);
        });
    }
    public function down() {
        Schema::drop('tasks');
    }
}