<?php

namespace Miposent\FuiOuPay\Core;

class Xml
{

    /**
     * @param array $data
     * @return string
     */
    public static function encode(array $data): string
    {
        return "<?xml version=\"1.0\" encoding=\"GBK\" standalone=\"yes\"?><xml>" . self::arrayToXml($data) . "</xml>";
    }

    /**
     * 解密
     * @param string $sign
     * @return mixed
     */
    public static function decode(string $sign)
    {
        return json_decode(json_encode(simplexml_load_string(urldecode($sign))), true);
    }

    /**
     * @param array $data
     * @param bool $isArray
     * @param \XMLWriter|null $XMLWriter
     * @return string|void
     */
    private static function arrayToXml(array $data, bool $isArray = FALSE, \XMLWriter $XMLWriter = null)
    {
        $xml = !is_null($XMLWriter) ? $XMLWriter : new \XMLWriter();
        !$isArray && $xml->openMemory();

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $xml->startElement($key);
                self::arrayToXml($value, TRUE, $xml);
                $xml->endElement();
                continue;
            }
            $xml->writeElement($key, $value);
        }
        if (!$isArray) {
            $xml->endElement();
            return $xml->outputMemory(true);
        }
    }
}