<?php
// Работу выполнил студент группы П-31
// Белоусов Михаил
class Date
{
    private int $day;
    private int $month;
    private int $year;

    public function __construct(int $day, int $month, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        if (!$this->isValidDateInput($this)) {
            throw new Exception('Неверный ввод');
        }
    }

    public function format(string $format): string
    {
        switch ($format) {
            case 'ru':
                return "{$this->day}.{$this->month}.{$this->year}" . PHP_EOL;
            case 'en':
                return "{$this->year}-{$this->month}-{$this->day}" . PHP_EOL;
            default:
                throw new Exception('Неверный формат.');
        }
    }

    public function diffDay(Date $secondDate): int
    {
        $firstDate = date_create($this->format('ru'));
        $secondDate = date_create($secondDate->format('ru'));
        $difference = $firstDate->diff($secondDate);
        return (int)$difference->format('%a');
    }

    private static function isValidDateInput(Date $date): bool
    {
        return !(($date->day > 31 || $date->day <= 0) || ($date->month > 12 || $date->month <= 0) || ($date->year < 0));
    }

    private static function convertToStringDate(Date $date) : string
    {
        (string)$stringDate = "{$date->day}.{$date->month}.{$date->year}";
        return $stringDate;
    }
}
