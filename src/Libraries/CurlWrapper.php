<?php

namespace Impulzo\RestClientService\Libraries;

class CurlWrapper
{
    private $curl;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    public function setOption($option, $value)
    {
        curl_setopt($this->curl, $option, $value);
    }

    public function exec()
    {
        return curl_exec($this->curl);
    }

    public function close()
    {
        curl_close($this->curl);
    }
}
