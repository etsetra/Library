<?php

/*
 * This file is part of etsetra/Library
 *
 * (c) Etsetra <hello@etsetra.com>
 */
namespace etsetra\Library;

use Carbon\Carbon;

class DateTime
{
    protected $format;

    public function __construct()
    {
        $this->format = 'Y-m-d\TH:i:sP';
    }

    /**
     * Date Now
     * 
     * @param string $str_to_time | null
     * @return string
     */
    public function nowAt(string $str_to_time = null)
    {
        return $str_to_time ? date($this->format, strtotime($str_to_time)) : date($this->format);
    }

    /**
     * Date Diff
     * 
     * @param string $type
     * @param string $end
     * @return string
     */
    public function diffIn(string $type, string $end)
    {
        return Carbon::now()->{'diffIn'.ucfirst($type)}($end, false);
    }

    /**
     * Create From Format
     * 
     * @param string $format
     * @param string $datetime
     * @return string
     */
    public function createFromFormat(string $format, string $datetime)
    {
        return date_create_from_format($format, $datetime)->format($this->format);
    }
}
