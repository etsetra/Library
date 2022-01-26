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

    private function array2xml($array, $node, &$dom)
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
}
