<?php
/**
 * Created by PhpStorm.
 * User: ryota_mc
 * Date: 2014/07/08
 * Time: 20:57
 */

namespace Backlog\Api;

/**
 * API用のインターフェース
 * @package Backlog\Api
 */
interface ApiInterface
{
    public function get($path, array $requestHeaders = []);

    public function post($path, array $parameters = [], $requestHeaders = []);

    public function put($path, array $parameters = [], $requestHeaders = []);

    public function delete($path, array $parameters = [], $requestHeaders = []);
}
