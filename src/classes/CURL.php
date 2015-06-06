<?php
/**
 *
 */

namespace classes;

/**
 * Class CURL
 */
class CURL
{
    /**
     * @param string $sUrl
     * @return mixed
     */
    public static function get($sUrl)
    {
        $rCh = curl_init();

        curl_setopt($rCh, CURLOPT_URL, $sUrl);
        curl_setopt($rCh, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($rCh, CURLOPT_CONNECTTIMEOUT, 30);

        $sData = curl_exec($rCh);
        curl_close($rCh);

        return $sData;
    }
}