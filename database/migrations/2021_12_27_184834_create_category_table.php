<?php

use App\Models\Master\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Category::ATTR_TABLE, function (Blueprint $table) {
            $table->id();

            $table->string(Category::ATTR_CHAR_NAME);
            $table->text(Category::ATTR_TEXT_DESCRIPTION);

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
        Schema::dropIfExists(Category::ATTR_TABLE);
    }
}
