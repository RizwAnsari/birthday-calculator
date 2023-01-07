<?php


class Date
{
    /**
     * @throws Exception
     */
    public function get($dateTime = 'now')
    {
        return (new DateTime($dateTime));
    }

    public function year()
    {
        return (int)date('Y');
    }
}