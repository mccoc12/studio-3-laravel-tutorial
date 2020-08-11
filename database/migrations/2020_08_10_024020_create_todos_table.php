<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique(); //unique varchar equivalent column
            $table->text('body'); //text equivalent column
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
        Schema::dropIfExists('todos');
    }

    public function index()
{
    $todos = Todo::orderBy('created_at','desc')->paginate(8);
    return view('todos.index',[
        'todos' => $todos,
    ]);
}
}
