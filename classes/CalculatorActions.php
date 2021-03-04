<?php
class CalculatorActions
{
    public static $PLUS = '+';
    public static $MINUS = '-';
    public static $DIVIDE = '/';
    public static $TIMES = '*';

    public static function getCalculatorResult(string $symbol, int $value1, int $value2)
    {
        switch ($symbol) {
            case self::$PLUS:
                return (int)$value1 + (int)$value2;
                break;

            case self::$MINUS:
                return (int)$value1 - (int)$value2;
                break;

            case self::$DIVIDE:
                if ($value2 < 1) {
                    return 0;
                }
                return (int)$value1 / (int)$value2;
                break;

            case self::$TIMES:
                return (int)$value1 * (int)$value2;
                break;

            default:
                return "Your are to input 2 integer values and select an Operator by Press EQUAL TO (=)";
        }
    }

    public function performCalculation(int $value1, int $value2, string $symbol)
    {
        return self::getCalculatorResult($symbol, $value1, $value2);
    }
}
