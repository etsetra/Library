<?php

/*
 * This file is part of etsetra/Library
 *
 * (c) Etsetra <hello@etsetra.com>
 */
namespace etsetra\Library;

use Illuminate\Support\Str;

class Helpers
{
    /**
     * Readable json print
     * 
     * @param string $input
     * @return json
     */
    public static function json_to_pretty(string $input)
    {
        return json_encode(json_decode($input), JSON_PRETTY_PRINT);
    }

    /**
     * Generate random key
     * 
     * @param integer segment_count
     * @param integer segment_length
     * @return string
     */
    public static function random_key(int $segment_length = 10, int $segment_count = 1)
    {
        $keys = [];

        for ($i = 1; $i <= $segment_count; $i++)
        {
            $keys[] = Str::random($segment_length);
        }

        return implode('-', $keys);
    }

    /**
     * Human readable file size
     * 
     * @param integer $size
     * @param integer $precision
     * @return string
     */
    public static function human_file_size(int $size, int $precision = 2)
    {
        if ($size > 0)
        {
            $size = $size;
            $base = log($size) / log(1024);
            $suffixes = [ 'bytes', 'KB', 'MB', 'GB', 'TB' ];

            return round(pow(1024, $base - floor($base)), $precision).' '.$suffixes[floor($base)];
        }

        return $size;
    }
}
