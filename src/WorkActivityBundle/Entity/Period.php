<?php

namespace WorkActivityBundle\Entity;


class Period
{
    protected $id;

    protected $from;

    protected $to;

    protected $holiday;

    public function __construct()
    {
        $this->holiday = [];
    }
}
