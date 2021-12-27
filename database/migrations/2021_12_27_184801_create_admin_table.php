<?php

use App\Models\Master\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Admin::ATTR_TABLE, function (Blueprint $table) {
            $table->id();

            $table->string(Admin::ATTR_CHAR_CODE);
            $table->string(Admin::ATTR_CHAR_NAME);
            $table->string(Admin::ATTR_CHAR_USERNAME);
            $table->smallInteger(Admin::ATTR_INT_GENDER)->unsigned();
            $table->string(Admin::ATTR_CHAR_PHONE, 20);
            $table->string(Admin::ATTR_CHAR_EMAIL);
            $table->string(Admin::ATTR_CHAR_PASSWORD);
            $table->string(Admin::ATTR_CHAR_TOKEN)->nullable();
            $table->integer(Admin::ATTR_INT_ROLE)->unsigned();

            $table->string(Admin::ATTR_CHAR_CREATED_BY, 20)->nullable();
            $table->string(Admin::ATTR_CHAR_UPDATED_BY, 20)->nullable();

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
        Schema::dropIfExists(Admin::ATTR_TABLE);
    }
}
