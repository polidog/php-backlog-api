<?php
/**
 * Created by PhpStorm.
 * User: ryota_mc
 * Date: 2014/07/08
 * Time: 21:00
 */

namespace Backlog\Api;
use Backlog\Client;
use Backlog\Exception\NoSupportApiException;

/**
 * API用の抽象化クラス
 * @package Backlog\Api
 */
class AbstractApi implements ApiInterface
{
    private $client;

    /**
     * コンストラクタ
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    /**
     * 指定したメソッド以外はエラーにする
     * @param $name
     * @param $args
     * @throws \Backlog\Exception\NoSupportApiException
     */
    public function __call($name, $args)
    {
        throw new NoSupportApiException('no support api name:'. $name);
    }

    /**
     * GETのリクエストをおくる
     * @param $path
     * @param array $requestHeaders
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    public function get($path, array $requestHeaders = [])
    {
        return $this->client->getHttpClient()
            ->get($path, [
                'headers' => $requestHeaders
            ])->getBody();
    }

    public function post($path, array $parameters = [], $requestHeaders = [])
    {
        // TODO: Implement post() method.
    }

    public function put($path, array $parameters = [], $requestHeaders = [])
    {
        // TODO: Implement put() method.
    }

    public function delete($path, array $parameters = [], $requestHeaders = [])
    {
        // TODO: Implement delete() method.
    }

}
