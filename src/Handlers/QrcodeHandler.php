<?php

namespace Goodwong\LaravelWechatQrcode\Handlers;

use Goodwong\LaravelWechatQrcode\Entities\WechatQrcode;

class QrcodeHandler
{
    /**
     * temporary
     * 
     * @param  string  $category_id
     * @param  string  $name
     * @param  integer  $expireSeconds
     * @return WechatQrcode
     */
    public function temporary($category_id, $name, $expireSeconds = null)
    {
        $qrcode = WechatQrcode::create([
            'category_id' => $category_id,
            'name' => $name,
            'code' => 'waiting...',
            'expires_at' => date('Y-m-d H:i:s'),
        ]);
        $result = app()->wechat->qrcode->temporary($qrcode->id, $expireSeconds);
        $qrcode->update([
            'code' => $result->url,
            'expires_at' => date('Y-m-d H:i:s', time() + $result->expire_seconds),
            'data' => $result,
        ]);
        return $qrcode;
    }

    /**
     * forever
     *
     * @param  string  $category_id
     * @param  string  $name
     * @return WechatQrcode
     */
    public function forever($category_id, $name)
    {
        $qrcode = WechatQrcode::create([
            'category_id' => $category_id,
            'name' => $name,
            'code' => 'waiting...',

            'code' => $result->url,
            'data' => $result,
        ]);
        $result = app()->wechat->qrcode->forever($scene);
        $qrcode->update([
            'code' => $result->url,
            'data' => $result,
        ]);
        return $qrcode;
    }
}
