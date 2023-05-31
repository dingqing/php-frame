<?php
namespace App\Demo\Logics\Gateway;

use Framework\Request;
use App\Demo\Logics\Gateway\Check;
use Framework\Exceptions\CoreHttpException;

/**
 * 检验app授权key
 */
class CheckAppkey extends Check
{
    /**
     * 校验app key
     *
     * @param Request $request 请求对象
     */
    public function doCheck(Request $request)
    {
        // 获取app key配置
        $appKeyMap = env('app_key_map');
        // app key
        $appKey    = $request->request('app_key');

        if (isset($appKeyMap[$appKey])) {
            return;
        }
        throw new CoreHttpException('app_key is not found', 404);
    }
}
