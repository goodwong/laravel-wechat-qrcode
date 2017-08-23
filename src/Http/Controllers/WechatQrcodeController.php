<?php

namespace Goodwong\LaravelWechatQrcode\Http\Controllers;

use Goodwong\LaravelWechatQrcode\Entities\WechatQrcode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WechatQrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = WechatQrcode::orderBy('id', 'desc');
        if ($request->has('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }
        return $query->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Goodwong\LaravelWechatQrcode\Entities\WechatQrcode  $wechatQrcode
     * @return \Illuminate\Http\Response
     */
    public function show(WechatQrcode $wechatQrcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Goodwong\LaravelWechatQrcode\Entities\WechatQrcode  $wechatQrcode
     * @return \Illuminate\Http\Response
     */
    public function edit(WechatQrcode $wechatQrcode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Goodwong\LaravelWechatQrcode\Entities\WechatQrcode  $wechatQrcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WechatQrcode $wechatQrcode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Goodwong\LaravelWechatQrcode\Entities\WechatQrcode  $wechatQrcode
     * @return \Illuminate\Http\Response
     */
    public function destroy(WechatQrcode $wechatQrcode)
    {
        //
    }
}
