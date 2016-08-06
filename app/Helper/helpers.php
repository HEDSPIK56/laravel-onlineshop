<?php

/**
 * Return sizes readable by humans
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .
            @$size[$factor];
}

/**
 * Is the mime type an image
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

/**
 * @author NTHanh
 * @return string
 */
function detectDevice()
{
    $userAgent = $_SERVER["HTTP_USER_AGENT"];
    $devicesTypes = array(
        "computer" => array("msie 11", "msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*ie", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera", "trident"),
        "tablet" => array("tablet", "android", "ipad", "tablet.*firefox"),
        "mobile" => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
        "bot" => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
    );
    foreach($devicesTypes as $deviceType => $devices)
    {
        foreach($devices as $device)
        {
            if(preg_match("/" . $device . "/i", $userAgent))
            {
                $deviceName = $deviceType;
            }
        }
    }
    return ucfirst($deviceName);
}

function deleteFile($param)
{
    return "ok";
}

function deleteFolder()
{
    return "";
}

function uploadImages()
{
    
}

function groupArrayByKey($array, $key)
{
    $result = array();
    foreach($array as $data)
    {
        if(is_object($data))
        {
            $result[$data->$key][] = $data;
        }
        elseif(is_array($data))
        {
            $result[$data[$key]][] = $data;
        }
    }
    return $result;
}

function getArrayValue($array, $keys, $default = null)
{
    if(!is_array($keys))
    {
        $keys = array($keys);
    }

    foreach($keys as $k)
    {
        if(isset($array[$k]))
        {
            return $array[$k];
        }
    }

    return $default;
}

function countDate($from, $to)
{
    $format = 'Y-m-d';
    $date1 = new DateTime(date($format, $from));
    $date2 = new DateTime(date($format, $to));

    $diff = $date2->diff($date1)->format("%a");
    return $diff;
}
