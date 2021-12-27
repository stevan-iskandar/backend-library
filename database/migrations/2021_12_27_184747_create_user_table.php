<?php

use App\Models\Master\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(User::ATTR_TABLE, function (Blueprint $table) {
            $table->id();

            $table->string(User::ATTR_CHAR_CODE);
            $table->string(User::ATTR_CHAR_NAME);
            $table->string(User::ATTR_CHAR_USERNAME);
            $table->smallInteger(User::ATTR_INT_GENDER)->unsigned();
            $table->string(User::ATTR_CHAR_PHONE, 20);
            $table->string(User::ATTR_CHAR_EMAIL);
            $table->string(User::ATTR_CHAR_PASSWORD);
            $table->string(User::ATTR_CHAR_TOKEN)->nullable();

            $table->string(User::ATTR_CHAR_CREATED_BY, 20)->nullable();
            $table->string(User::ATTR_CHAR_UPDATED_BY, 20)->nullable();

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
        Schema::dropIfExists(User::ATTR_TABLE);
    }
}
