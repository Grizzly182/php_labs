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
        if (!$this->isValidInputDate($this)) {
            throw new Exception('Неверный воод');
        }
    }

    public function format(string $format): void
    {
        switch ($format) {
            case 'ru':
                echo "{$this->day}.{$this->month}.{$this->year}" . PHP_EOL;
                break;
            case 'en':
                echo "{$this->year}-{$this->month}-{$this->day}" . PHP_EOL;
                break;
            default:
                throw new Exception('Неверный формат.');
        }
    }

    public function isValidInputDate(Date $date): bool
    {
        return !(($date->day > 31 || $date->day <= 0) || ($date->month > 12 || $date->month <= 0) || ($date->year < 0));
    }
}
