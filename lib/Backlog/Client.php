<?php
/**
 * Created by PhpStorm.
 * User: ryota_mc
 * Date: 2014/07/08
 * Time: 20:39
 */
namespace Backlog;

use Backlog\Exception\NoSupportApiException;
use Backlog\HttpClient\HttpClientInterface;

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
        switch(strtolower($name)) {
            default:
                throw new NoSupportApiException(sprintf('Undefined api instance called: "%s"', $name));
                break;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate($apiKey)
    {
        return;
    }

    /**
     * HTTPClientを取得する
     * @return HttpClientInterface
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

}
