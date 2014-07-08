<?php
/**
 * Created by PhpStorm.
 * User: ryota_mc
 * Date: 2014/07/08
 * Time: 20:39
 */

use GuzzleHttp\ClientInterface as HttpClientInterface;

/**
 * API用クライアントクラス
 * Class Client
 *
 * @property HttpClientInterface $httpClient
 */
class Client implements ClientInterface
{
    protected  $httpClient;

    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient = null)
    {
        if ($httpClient instanceof HttpClientInterface) {
            $this->httpClient = $httpClient;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function api($name)
    {
        return;
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate($apiKey)
    {
        return;
    }
}
