<?php

namespace Goodwong\WechatQrcode;

use Illuminate\Support\Facades\Route;

class Router
{
    /**
     * routes
     * 
     * @return void
     */
    public static function qrcode()
    {
        Route::namespace('Goodwong\WechatQrcode\Http\Controllers')->group(function () {
            Route::resource('wechat-qrcodes', 'WechatQrcodeController');
        });
    }
}
