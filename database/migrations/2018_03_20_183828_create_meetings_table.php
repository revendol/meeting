<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id');
            $table->integer('place_id');
            $table->date('meeting_date');
            $table->boolean('approved')->default(false);
            $table->string('t_730am')->default(false);
            $table->string('t_800am')->default(false);
            $table->string('t_830am')->default(false);
            $table->string('t_900am')->default(false);
            $table->string('t_930am')->default(false);
            $table->string('t_1000am')->default(false);
            $table->string('t_1030am')->default(false);
            $table->string('t_1100am')->default(false);
            $table->string('t_1130am')->default(false);
            $table->string('t_1200pm')->default(false);
            $table->string('t_1230pm')->default(false);
            $table->string('t_100pm')->default(false);
            $table->string('t_130pm')->default(false);
            $table->string('t_200pm')->default(false);
            $table->string('t_230pm')->default(false);
            $table->string('t_300pm')->default(false);
            $table->string('t_330pm')->default(false);
            $table->string('t_400pm')->default(false);
            $table->string('t_430pm')->default(false);
            $table->string('t_500pm')->default(false);
            $table->string('t_530pm')->default(false);
            $table->string('t_600pm')->default(false);
            $table->string('t_630pm')->default(false);
            $table->string('t_700pm')->default(false);
            $table->string('t_730pm')->default(false);
            $table->string('t_800pm')->default(false);
            $table->string('t_830pm')->default(false);
            $table->string('t_900pm')->default(false);
            $table->string('t_930pm')->default(false);
            $table->string('t_1000pm')->default(false);
            $table->string('t_1030pm')->default(false);
            $table->string('t_1100pm')->default(false);
            $table->string('t_1130pm')->default(false);
            $table->string('t_1200am')->default(false);
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
        Schema::dropIfExists('meetings');
    }
}
