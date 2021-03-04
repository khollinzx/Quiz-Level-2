<?php


class RechargeCardPin
{

    /**
     * This function generate and return random 4 number in 4 section
     */
    public static function generatePin(int $index)
    {
        return "MTN Pin[" . $index . "] : " . rand(1000, 9999) . "-" . rand(1000, 9999) . "-" . rand(1000, 9999) . "-" . rand(1000, 9999);
    }

    /**
     * this function display the genrated pin.
     * by accept the index(starting index) and the ending range($limit)
     */
    public function createCards($index, $limit)
    {
        /**
         * looping statement
         */
        for ($i = $index; $i <= $limit; $i++) {

            echo self::generatePin($i) . '<br>';
        }
    }
}
