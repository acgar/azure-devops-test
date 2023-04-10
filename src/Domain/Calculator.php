<?php


namespace Acgar\AzureDevops\Domain;


class Calculator
{
    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }

    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public function sub(int $a, int $b): int
    {
        return $a - $b;
    }
    // new comment...

}