<?php

namespace Goodwong\WechatQrcode\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Goodwong\DefaultJsonField\Traits\DefaultJsonField;

class WechatQrcode extends Model
{
    use SoftDeletes;
    use DefaultJsonField;

    /**
     * table name
     */
    protected $table = 'wechat_qrcodes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'type',
        'name',
        'code',
        'data',
        'expires_at',
    ];

    /**
     * 在数组中想要隐藏的属性。
     *
     * @var array
     */
    protected $hidden = ['settings'];
    
    /**
     * date
     */
    protected $dates = [
        'expires_at',
        'deleted_at',
    ];

    /**
     * cast attributes
     */
    protected $casts = [
        'data' => 'object',
    ];

    /**
     * The default settings.
     * 注意：这里只能是一级数组
     *
     * @var array
     */
    protected $default_data = [
        //
    ];
}
