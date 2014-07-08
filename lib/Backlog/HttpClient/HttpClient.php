<?php
/**
 * Created by PhpStorm.
 * User: ryota_mc
 * Date: 2014/07/08
 * Time: 21:37
 */

namespace Backlog\HttpClient;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class HttpClient implements HttpClientInterface
{
    protected $options = [
        'base_url' => 'https://test.backlog.jp',
        'user_agent' => 'php-backlog-api (polidog)',
        'timeout' => 30,

        'api_version' => 'v2',
    ];

    protected $headers = [];

    protected  $client;

    /**
     * コンストラクタ
     * @param array $options
     * @param ClientInterface $client
     */
    public function __construct(array $options = [], ClientInterface $client = null)
    {
        $this->options = array_merge($this->options, $options);
        $client = $client ?: new Client($this->options);
        $this->client = $client;
    }

    /**
     * {@inheritDoc}
     */
    public function get($path, array $parameters = [], array $headers = [])
    {
        return $this->request($path, null, 'GET', $headers, ['query' => $parameters]);
    }

    /**
     * {@inheritDoc}
     */
    public function post($path, $body = null, array $headers = [])
    {
        return $this->request($path, $body, 'POST', $headers);
    }

    /**
     * {@inheritDoc}
     */
    public function patch($path, $body = null, array $headers = [])
    {
        return $this->request($path, $body, 'PATCH', $headers);
    }

    /**
     * {@inheritDoc}
     */
    public function delete($path, $body = null, array $headers = [])
    {
        return $this->request($path, $body, 'DELETE', $headers);
    }

    /**
     * {@inheritDoc}
     */
    public function put($path, $body = null, array $headers = [])
    {
        return $this->request($path, $body, 'PUT', $headers);
    }

    /**
     * {@inheritDoc}
     */
    public function request($path, $body = null, $httpMethod = 'GET', array $headers = [], array $options = [])
    {
        $request = $this->createRequest($httpMethod, $path, $body, $headers, $options);
        return $this->client->send($request);
    }

    /**
     * {@inheritDoc}
     */
    public function authenticate($apiKey)
    {
        // TODO: 後で実装
    }

    /**
     * HTTP Request send
     * @param string $httpMethod
     * @param string $path
     * @param null $body
     * @param array $headers
     * @param array $options
     * @return \GuzzleHttp\Message\RequestInterface
     */
    protected function createRequest($httpMethod, $path, $body = null, array $headers = [], $options = [])
    {
        return $this->client->createRequest(
            $httpMethod,
            $path,
            array_merge($this->headers, $headers),
            $body,
            $options
        );
    }

}
