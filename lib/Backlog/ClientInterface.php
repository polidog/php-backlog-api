<?php
/**
 * Created by PhpStorm.
 * User: ryota_mc
 * Date: 2014/07/08
 * Time: 20:40
 */

namespace Backlog;

interface ClientInterface {

    /**
     * APIを実行する
     * @param $name
     * @return mixed
     */
    public function api($name);

    /**
     * 認証を行う
     * @param $apiKey
     * @return mixed
     */
    public function authenticate($apiKey);
}
