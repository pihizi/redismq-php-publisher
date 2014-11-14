<?php

namespace RedisMQ;

class Publisher
{
    private $_redis;
    public function __construct($host='127.0.0.1', $port='6379', $password=null)
    {
        $redis = new \Redis();
        $redis->connect($host, $port);
        if (!empty($password)) {
            $redis->auth($password);
        }
        $this->_redis = $redis;
    }

    public function __destruct()
    {
        $this->_redis->close();
    }

    public function send($channel, $emssage)
    {
        return $this->_redis->publish($channel, $message);
    }
}
