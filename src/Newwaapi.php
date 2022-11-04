<?php

namespace Yama\NewwaapiPhpLib;

class Newwaapi
{
    var string $url;

    function __construct(string $url)
    {
        $this->url = $url;
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
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $requset,
            CURLOPT_POSTFIELDS => $array,
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function info(): string
    {
        return $this->curl('GET', 'info');
    }

    public function sendMessage(string $number, string $message): string
    {
        return $this->curl('POST', 'send-message', ['number' => $number, 'message' => $message]);
    }

    public function sendGroupMessage(string $groupId, string $message): string
    {
        return $this->curl('POST', 'send-group-message', ['id' => $groupId, 'message' => $message]);
    }

    public function sendMedia(string $numberOrGroupId, string $file, string $caption, string $name): string
    {
        return $this->curl('POST', 'send-media', ['number' => $numberOrGroupId, 'file' => $file, 'caption' => $caption, 'name' => $name]);
    }
}
