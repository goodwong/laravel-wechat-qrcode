<?php

namespace Goodwong\LaravelWechatQrcode\Handlers;

use Goodwong\LaravelWechatQrcode\Entities\WechatQrcode;

class QrcodeHandler
{
    /**
     * temporary
     * 
     * @param  mixed  $scene
     * @param  integer  $expireSeconds
     * @return WechatQrcode
     */
    public function temporary($scene, $expireSeconds = null)
    {
        $result = app()->wechat->qrcode->temporary($scene, $expireSeconds);
        $expireSeconds = $result->expire_seconds;
        $qrcode = WechatQrcode::create([
            'name' => 'new qrcode',
            'code' => $result->url,
            'expires_at' => date('Y-m-d H:i:s', time() + $result->expire_seconds),
            'data' => $result,
        ]);
        return $qrcode;
    }

    /**
     * forever
     *
     * @param  mixed  $scene
     * @return WechatQrcode
     */
    public function forever($scene)
    {
        $result = app()->wechat->qrcode->forever($scene);
        $expireSeconds = $result->expire_seconds;
        $qrcode = WechatQrcode::create([
            'name' => 'new qrcode',
            'code' => $result->url,
            'data' => $result,
        ]);
        return $qrcode;
    }
}
