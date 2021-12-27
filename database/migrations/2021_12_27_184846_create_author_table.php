<?php

use App\Models\Master\Author;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Author::ATTR_TABLE, function (Blueprint $table) {
            $table->id();

            $table->string(Author::ATTR_CHAR_CODE);
            $table->string(Author::ATTR_CHAR_NAME);
            $table->smallInteger(Author::ATTR_INT_GENDER)->unsigned();
            $table->string(Author::ATTR_CHAR_PHONE, 20);
            $table->string(Author::ATTR_CHAR_EMAIL);

            $table->string(Author::ATTR_CHAR_CREATED_BY, 20)->nullable();
            $table->string(Author::ATTR_CHAR_UPDATED_BY, 20)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Author::ATTR_TABLE);
    }
}
