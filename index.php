<?php

require_once 'Helpers.php';

$helpers = new Helpers();

$helpers->birthMonth = readline('Enter birthday Month(in number): ');
$helpers->validateMonth();

$helpers->birthDate = readline('Enter birthday Date: ');
$helpers->validateDay();

$remainingDays = $helpers->getRemainingDays();

echo "$remainingDays days left for your next birthday.";



