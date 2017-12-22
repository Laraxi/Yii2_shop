<?php
/*
 *  Copyright (c) 2014 The CCP project authors. All Rights Reserved.
 *
 *  Use of this source code is governed by a Beijing Speedtong Information Technology Co.,Ltd license
 *  that can be found in the LICENSE file in the root of the web site.
 *
 *   http://www.yuntongxun.com
 *
 *  An additional intellectual property rights grant can be found
 *  in the file PATENTS.  All contributing project authors may
 *  be found in the AUTHORS file in the root of the source tree.
 */


namespace app\tool\sms;


use app\tool\M3Result;

class SendTemplateSMS
{
//主帐号
   public $accountSid = '8a48b5515018a0f4015036b840d12e6d';

//主帐号Token
    public $accountToken = 'c4a9a12791f14e03bf5662012a63ab0e';

//应用Id
    public $appId = '8a48b55152a56fc20152cb60f2f8261d';

//请求地址，格式如下，不需要写https://
    public $serverIP = 'sandboxapp.cloopen.com';

//请求端口 
    public $serverPort = '8883';

//REST版本号
    public $softVersion = '2013-12-26';


    /**
     * 发送模板短信
     * @param to 手机号码集合,用英文逗号分开
     * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
     * @param $tempId 模板Id
     */
    function sendTemplateSMS($to, $datas, $tempId)
    {

        $M3Result = new M3Result();
        $rest = new CCPRestSDK($this->serverIP, $this->serverPort, $this->softVersion);
        $rest->setAccount($this->accountSid, $this->accountToken);
        $rest->setAppId($this->appId);

        // 发送模板短信
        $result = $rest->sendTemplateSMS($to, $datas, $tempId);
        if ($result == NULL) {
            $M3Result->status = 2;
            $M3Result->message = 'result error!';
            exit;
        }
        if ($result->statusCode != 0) {
            $M3Result->status = $result->statusCode;
            $M3Result->message = $result->statusMsg;
        } else {
            $M3Result->status = 0;
            $M3Result->message = '发送成功';
        }
        return $M3Result;
    }
}

//Demo调用,参数填入正确后，放开注释可以调用 
//sendTemplateSMS("手机号码","内容数据","模板Id");
?>
