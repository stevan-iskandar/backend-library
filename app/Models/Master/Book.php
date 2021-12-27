<?php

namespace App\Models\Master;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Book extends BaseModel
{
    use HasFactory, SoftDeletes, HasJsonRelationships;

    const ATTR_TABLE            = 'books';

    const ATTR_INT_AUTHOR       = 'id_author';
    const ATTR_CHAR_CODE        = 'code';
    const ATTR_CHAR_NAME        = 'name';
    const ATTR_TEXT_DESCRIPTION = 'description';
    const ATTR_JSON_CATEGORY    = 'category';
    const ATTR_DATE_PURCHASE    = 'purchase_date';
    const ATTR_DECIMAL_PRICE    = 'price';

    const ATTR_RELATION_AUTHOR  = 'author';

    /**
     * Cast The JSON field associated with the table
     *
     * @var array
     */
    protected $casts = [
        self::ATTR_JSON_CATEGORY => 'json',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::ATTR_TABLE;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = self::ATTR_INT_ID;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    protected $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    protected $timestamps = true;

    protected $fillable = [
        self::ATTR_INT_AUTHOR,
        self::ATTR_CHAR_CODE,
        self::ATTR_CHAR_NAME,
        self::ATTR_TEXT_DESCRIPTION,
        self::ATTR_JSON_CATEGORY,
        self::ATTR_DATE_PURCHASE,
        self::ATTR_DECIMAL_PRICE,

        self::ATTR_CHAR_CREATED_BY,
        self::ATTR_CHAR_UPDATED_BY,
    ];

    /**
     * Get the author associated with the author table.
     */
    public function author()
    {
        return $this->belongsTo(Author::class, self::ATTR_INT_AUTHOR)->select(
            Author::ATTR_INT_ID,
            Author::ATTR_CHAR_NAME,
        );
    }

    /**
     * Get the createdByAdmin associated with the createdByAdmin table.
     */
    public function createdByAdmin()
    {
        return $this->belongsTo(Admin::class, self::ATTR_CHAR_CREATED_BY, Admin::ATTR_CHAR_CODE)->select(
            self::ATTR_INT_ID,
            self::ATTR_CHAR_NAME,
        );
    }

    /**
     * Get the updatedByAdmin associated with the updatedByAdmin table.
     */
    public function updatedByAdmin()
    {
        return $this->belongsTo(Admin::class, self::ATTR_CHAR_UPDATED_BY, Admin::ATTR_CHAR_CODE)->select(
            self::ATTR_INT_ID,
            self::ATTR_CHAR_NAME,
        );
    }
}
