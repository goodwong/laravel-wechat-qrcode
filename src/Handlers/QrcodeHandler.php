<?php

namespace Goodwong\WechatQrcode\Handlers;

use Goodwong\WechatQrcode\Entities\WechatQrcode;

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
    public function temporary($category_id, $name, $expireSeconds = 30 * 24 * 3600)
    {
        $qrcode = WechatQrcode::create([
            'category_id' => $category_id,
            'name' => $name,
            'code' => 'waiting...',
            'expires_at' => date('Y-m-d H:i:s'),
        ]);
        $result = app()->wechat->qrcode->temporary($qrcode->id, $expireSeconds);
        $qrcode->update([
            'expires_at' => date('Y-m-d H:i:s', time() + $result->expire_seconds),
            'code' => $result->url,
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
        ]);
        $result = app()->wechat->qrcode->forever($qrcode->id);
        $qrcode->update([
            'code' => $result->url,
            'data' => $result,
        ]);
        return $qrcode;
    }
}
