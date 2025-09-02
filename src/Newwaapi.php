<?php

namespace Yama\NewwaapiPhpLib;

class Newwaapi
{
    var $url;
    var $timeout;
    var $authorization;

    function __construct($url, $user = null, $password = null, $timeout = 0)
    {
        $this->url = $url;
        $this->timeout = $timeout;

        $this->authorization = 'Basic ' . base64_encode($user . ':' . $password);
    }

    private function curl($requset, $path, $array = null)
    {
        $urlPath = (substr($this->url, -1) == '/' ? $this->url : $this->url . '/') . $path;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $urlPath,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $requset,
            CURLOPT_POSTFIELDS => $array,
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $this->authorization,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function info()
    {
        return $this->curl('GET', 'info');
    }

    public function sendMessage($number, $message)
    {
        return $this->curl('POST', 'send-message', ['number' => $number, 'message' => $message]);
    }

    public function sendGroupMessage($groupId, $message)
    {
        return $this->curl('POST', 'send-group-message', ['id' => $groupId, 'message' => $message]);
    }

    public function sendMedia($number, $file, $caption = '', $name = '')
    {
        return $this->curl('POST', 'send-media', ['number' => $number, 'file' => $file, 'caption' => $caption, 'name' => $name]);
    }

    public function isRegistered($number)
    {
        // return $this->curl('POST', 'is-registered', ['number' => $number]);
        return $this->curl('GET', 'is-registered?number=' . $number);
    }

    public function getGroups()
    {
        return $this->curl('GET', 'get-groups');
    }

    public function getConfig()
    {
        return $this->curl('GET', 'get-config');
    }
}
