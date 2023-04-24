<?php

namespace Matt\Birthday\Domain\Repositories;

interface BirthdayRepository
{
    const FILEPATH = 'app' . DIRECTORY_SEPARATOR . 'birthdays.json';

    public function getAll();
}
