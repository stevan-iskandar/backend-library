<?php

namespace App\Models\Master;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends BaseModel
{
    use HasFactory, SoftDeletes;

    const ATTR_TABLE            = 'authors';

    const ATTR_CHAR_CODE        = 'code';
    const ATTR_CHAR_NAME        = 'name';
    const ATTR_INT_GENDER       = 'gender';
    const ATTR_CHAR_PHONE       = 'phone';
    const ATTR_CHAR_EMAIL       = 'email';

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
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $fillable = [
        self::ATTR_CHAR_CODE,
        self::ATTR_CHAR_NAME,
        self::ATTR_INT_GENDER,
        self::ATTR_CHAR_PHONE,
        self::ATTR_CHAR_EMAIL,

        self::ATTR_CHAR_CREATED_BY,
        self::ATTR_CHAR_UPDATED_BY,
    ];

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
