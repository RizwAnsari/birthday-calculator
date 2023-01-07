<?php

require_once 'Date.php';

class Helpers
{
    const numOfDays = [
        1 => 31,
        2 => 29,
        3 => 31,
        4 => 30,
        5 => 31,
        6 => 30,
        7 => 31,
        8 => 31,
        9 => 30,
        10 => 31,
        11 => 30,
        12 => 31,
    ];

    public $birthMonth;
    public $birthDate;

    public function validateMonth()
    {
        while (!is_numeric($this->birthMonth) || $this->birthMonth > 12) {
            $this->birthMonth = readline('Please Enter a valid birthday Month(in number): ');
        }
    }

    public function validateDay()
    {
        $isValidDay = $this->validateNumOfDays();
        while (!is_numeric($this->birthDate) || !$isValidDay) {
            $this->birthDate = readline('Please Enter a valid birthday Date: ');
            $isValidDay = $this->validateNumOfDays();
        }
    }

    protected function validateNumOfDays()
    {

        if (empty(self::numOfDays[$this->birthMonth]) || !is_numeric($this->birthDate)) {
            return false;
        }
        if ($this->birthDate <= self::numOfDays[$this->birthMonth]) {
            return true;
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public function getRemainingDays()
    {
        $date = new Date();
        $now = $date->get();
        $year = $date->year();

        $currentBirthDay = "$this->birthDate-$this->birthMonth-$year";

        $birthDay = $date->get($currentBirthDay);

        if ($now->getTimestamp() > $birthDay->getTimestamp()) {
            $nextYear = $year + 1;
            $nextBirthDay = "$this->birthDate-$this->birthMonth-$nextYear";
            $birthDay = $date->get($nextBirthDay);
        }
        return $now->diff($birthDay)->days;
    }
}