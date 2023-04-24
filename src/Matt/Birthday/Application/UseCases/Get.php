<?php

namespace Matt\Birthday\Application\UseCases;

use Matt\Birthday\Domain\Repositories\BirthdayRepository;
use Matt\Birthday\Domain\ValueObjects\Birthday;

class Get
{
    protected BirthdayRepository $birthDateRepository;

    /**
     * @param BirthdayRepository $birthDateRepository
     */
    public function __construct(BirthdayRepository $birthDateRepository)
    {
        $this->birthDateRepository = $birthDateRepository;
    }


    public function __invoke()
    {
        $birthdaysDomain = $this->birthDateRepository->getAll();
        $birthdays = [];
        /**
         * @var $birthdayDomain Birthday
         */
        foreach ($birthdaysDomain as $birthdayDomain) {
            $birthdays[] = $birthdayDomain->toArray();
        }

        return $birthdays;
    }
}
