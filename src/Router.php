<?php

namespace Goodwong\LaravelWechatQrcode;

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
        Route::namespace('Goodwong\LaravelWechatQrcode\Http\Controllers')->group(function () {
            Route::resource('wechat-qrcodes', 'WechatQrcodeController');
        });
    }
}