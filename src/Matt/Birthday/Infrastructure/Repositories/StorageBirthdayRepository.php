<?php

namespace Matt\Birthday\Infrastructure\Repositories;

use Matt\Birthday\Domain\Repositories\BirthdayRepository;
use Matt\Birthday\Domain\ValueObjects\Birthday;
use Shared\Storage\Application\Services\Storage;

class StorageBirthdayRepository implements BirthdayRepository
{
    protected Storage $storageService;

    /**
     * @param Storage $storageService
     */
    public function __construct(Storage $storageService)
    {
        $this->storageService = $storageService;
    }

    public function getAll(): array
    {

        $birthdays = $this->storageService->getJson(self::FILEPATH);

        $birthdaysDomain = [];
        foreach ($birthdays as $birthday) {
            $birthdayDomain = (new Birthday())->setName($birthday['name'])
                ->setBirthdate($birthday['birthdate']);


            $birthdaysDomain[] = $birthdayDomain;
        }

        return $birthdaysDomain;
    }
}
