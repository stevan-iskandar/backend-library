<?php

use App\Models\Master\Author;
use App\Models\Master\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Book::ATTR_TABLE, function (Blueprint $table) {
            $table->id();

            $table->bigInteger(Book::ATTR_INT_AUTHOR)->unsigned();
            $table->string(Book::ATTR_CHAR_CODE);
            $table->string(Book::ATTR_CHAR_NAME);
            $table->text(Book::ATTR_TEXT_DESCRIPTION);
            $table->json(Book::ATTR_JSON_CATEGORY);
            $table->date(Book::ATTR_DATE_PURCHASE);
            $table->decimal(Book::ATTR_DECIMAL_PRICE, 18, 2);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign(Book::ATTR_INT_AUTHOR)->references(Author::ATTR_INT_ID)->on(Author::ATTR_TABLE)->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Book::ATTR_TABLE);
    }
}
