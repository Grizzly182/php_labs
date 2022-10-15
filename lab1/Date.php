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
                return "{$this->day}.{$this->month}.{$this->year}";
            case 'en':
                return "{$this->year}-{$this->month}-{$this->day}";
            default:
                throw new Exception('Неверный формат.');
        }
    }

    public function diffDay(Date $secondDate): string
    {
        $firstDate = date_create($this->format('en'));
        $secondDate = date_create($secondDate->format('en'));
        $difference = $firstDate->diff($secondDate);
        return $difference->format('%a');
    }

    public function minusDay(int $daysAmount, string $format): string
    {
        $formatString = '';
        switch ($format) {
            case 'ru':
                $formatString = 'd.m.Y';
                break;
            case 'en':
                $formatString = 'Y-m-d';
                break;
            default:
                throw new Exception('Неверный формат.');
        }
        return date($formatString, strtotime("-{$daysAmount} days", strtotime($this->format('ru'))));
    }

    public function getDayOfWeek(): string
    {
        return date('l', strtotime($this->format('ru')));
    }

    private static function isValidDateInput(Date $date): bool
    {
        return !(($date->day > 31 || $date->day <= 0) || ($date->month > 12 || $date->month <= 0) || ($date->year < 0));
    }
}
