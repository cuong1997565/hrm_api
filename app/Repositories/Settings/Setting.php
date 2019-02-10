<?php

namespace App\Repositories\Settings;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Entity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Entity
{
    use SoftDeletes, FilterTrait, PresentationTrait;

    const DISABLE   = 0;
    const ENABLE    = 1;

    const ALL_STATUS = [
        self::DISABLE,
        self::ENABLE
    ];

    const DISPLAY_STATUS = [
        self::DISABLE   => 'Không hiển thị',
        self::ENABLE    => 'Hiển thị'
    ]; 

    const NORMAL = 0;
    const PHONE  = 1;
    const TEXT   = 2;
    const EMAIL  = 3;
    const URL    = 4;
    const NUMBER = 5;

    const ALL_TYPE = [
        self::NORMAL,
        self::TEXT,
        self::PHONE,
        self::NUMBER,
        self::EMAIL,
        self::URL,
    ];

    const DISPLAY_TYPE = [
        self::NORMAL => 'Bình thường',
        self::PHONE  => 'Số điện thoại',
        self::TEXT   => 'Văn bản',
        self::EMAIL  => 'Email',
        self::URL    => 'Url',
        self::NUMBER => 'Số'
    ];

    protected $date = ['deleted_at'];

    /**
     * Full path of images.
     */
    public $imgPath = 'storage/images/items';

    /**
     * Physical path of upload folder.
     */
    public $uploadPath = 'app/public/images/items';
    
    public $imgWidth = 1024;
    public $imgHeight = 500;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
        'type',
        'value',
        'status'
    ];
}
