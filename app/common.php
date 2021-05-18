<?php
// 应用公共文件
use think\response\Json;


/**
 * 通用化API数据格式输出
 * @param $status
 * @param string $message
 * @param array $data
 * @param int $httpStatus
 * @return Json
 */
function show($status, $message = "error", $data = [], $httpStatus = 200): Json
{
    $result = [
        "status" => $status,
        "message" => $message,
        "result" => $data
    ];

    return json($result, $httpStatus);
}

