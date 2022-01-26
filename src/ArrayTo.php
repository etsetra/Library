<?php

/*
 * This file is part of etsetra/Library
 *
 * (c) Etsetra <hello@etsetra.com>
 */
namespace etsetra\Library;

use DOMDocument;

class ArrayTo
{
    /**
     * Array2Xml
     * 
     * @param array $array
     * @return xml
     */
    public function xml(array $array)
    {
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $root = $dom->createElement('root');
        $dom->appendChild($root);

        $this->array2xml($array, $root, $dom);

        return $dom->saveXML();
    }

    /**
     * Array2Csv
     * 
     * @param array $array
     * @return xml
     */
    public function csv(array $array)
    {
        $lines = [];

        foreach ($array as $v)
        {
            $lines[] = $this->array2csv($v);
        }

        return implode(PHP_EOL, $lines);
    }

    /**
     * Array2Xml Core
     */
    private function array2xml(array $array, $node, &$dom)
    {
        foreach ($array as $key => $value)
        {
            if (preg_match("/^[0-9]/", $key))
                $key = "node-{$key}";

            $key = preg_replace("/[^a-z0-9_\-]+/i", '', $key);

            if ($key === '')
                $key = '_';

            $a = $dom->createElement($key);
            $node->appendChild($a);

            if (!is_array($value))
                $a->appendChild($dom->createTextNode($value));
            else
                $this->array2xml($value, $a, $dom);
        }
    }

    /**
     * Array2Csv Core
     */
    private function array2csv(array $line)
    {
        $csv_line = [];

        foreach ($line as $v)
        {
            $csv_line[] = is_array($v) ? $this->array2csv($v) : '"'.str_replace('"', "'", $v).'"';
        }

        return implode(';', $csv_line);
    }
}
