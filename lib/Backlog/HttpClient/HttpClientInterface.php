<?php
/**
 * Created by PhpStorm.
 * User: ryota_mc
 * Date: 2014/07/08
 * Time: 21:29
 */

namespace Backlog\HttpClient;

use GuzzleHttp\Message\Response;

/**
 * Http用のインターフェース
 * Interface HttpClientInterface
 * @package Backlog\HttpClient
 */
interface HttpClientInterface {

    /**
     * GETのリクエストを送りつける
     * @param string $path
     * @param array $parameters
     * @param array $headers
     * @return Response
     */
    public function get($path, array $parameters = [], array $headers = []);

    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     * @return Response
     */
    public function post($path, array $parameters = [], array $headers = []);


    /**
     * putリクエストをおくるお
     * @param string $path
     * @param array $parameters
     * @param array $headers
     * @return Response
     */
    public function put($path, array $parameters = [], array $headers = []);

    /**
     * @param $path
     * @param array $body
     * @param array $headers
     * @return Response
     */
    public function delete($path, array $body = [], array $headers = []);

    /**
     * リクエストをおくる
     * @param $path
     * @param array $parameters
     * @param string $httpMethod
     * @param array $headers
     * @return Response
     */
    public function request($path, array $parameters = [], $httpMethod = 'GET', array $headers = []);

    /**
     * 認証
     * @param string $apiToken
     */
    public function authenticate($apiToken);
}
