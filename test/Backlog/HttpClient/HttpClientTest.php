<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2014/07/09
 * Time: 1:11
 */

namespace Backlog\Test\HttpClient;


use Backlog\HttpClient\HttpClient;

class HttpClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function コンストラクタでオプションを渡す事が出来るはず()
    {
        $httpClient = new TestHttpClient([
            'timeout' => 22
        ], $this->getBrowserMock());
        $this->assertEquals(22, $httpClient->getOption('timeout'));
    }

    /**
     * @test
     */
    public function オプションがセット出来るはず()
    {
        $httpClient = new TestHttpClient([],$this->getBrowserMock());
        $httpClient->setOption('timeout', 3333);

        $this->assertEquals(3333, $httpClient->getOption('timeout'));
    }

    /**
     * GuzzleHttpClientのモックを作成する
     * @param array $methods
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getBrowserMock(array $methods = [])
    {
        $mock = $this->getMockBUilder('GuzzleHttp\Client')
            ->setMethods(array_merge(['send','createResponse'],$methods))
            ->getMock();

        return $mock;
    }
}


class TestHttpClient extends HttpClient
{
    public function getOption($name)
    {
        return isset($this->options[$name]) ? $this->options[$name] : false;
    }
}
