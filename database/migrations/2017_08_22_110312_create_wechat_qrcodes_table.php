<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatQrcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat_qrcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_id', 32)->nullable();
            $table->string('type', 16)->nullable()->comment('如 custom/referral/...');
            $table->string('name', 64)->comment('管理员标题');
            $table->string('code')->comment('二维码内容');
            $table->jsonb('settings')->nullable();
            $table->timestamp('expires_at')->nullable()->comment('临时二维码过期时间');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wechat_qrcodes');
    }
}
