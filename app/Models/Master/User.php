<?php

namespace App\Models\Master;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel
{
    use HasFactory, SoftDeletes;

    const ATTR_TABLE            = 'users';

    const ATTR_CHAR_CODE        = 'code';
    const ATTR_CHAR_NAME        = 'name';
    const ATTR_CHAR_USERNAME    = 'username';
    const ATTR_INT_GENDER       = 'gender';
    const ATTR_CHAR_PHONE       = 'phone';
    const ATTR_CHAR_EMAIL       = 'email';
    const ATTR_CHAR_PASSWORD    = 'password';
    const ATTR_CHAR_TOKEN       = 'token';

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
        self::ATTR_CHAR_CODE,
        self::ATTR_CHAR_NAME,
        self::ATTR_CHAR_USERNAME,
        self::ATTR_INT_GENDER,
        self::ATTR_CHAR_PHONE,
        self::ATTR_CHAR_EMAIL,
        self::ATTR_CHAR_PASSWORD,
        self::ATTR_CHAR_TOKEN,

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

    /**
     * Get the createdByUser associated with the createdByUser table.
     */
    public function createdByUser()
    {
        return $this->belongsTo(self::class, self::ATTR_CHAR_CREATED_BY, self::ATTR_CHAR_CODE)->select(
            self::ATTR_INT_ID,
            self::ATTR_CHAR_NAME,
        );
    }

    /**
     * Get the updatedByUser associated with the updatedByUser table.
     */
    public function updatedByUser()
    {
        return $this->belongsTo(self::class, self::ATTR_CHAR_UPDATED_BY, self::ATTR_CHAR_CODE)->select(
            self::ATTR_INT_ID,
            self::ATTR_CHAR_NAME,
        );
    }
}
