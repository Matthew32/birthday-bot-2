<?php

namespace Matt\Birthday\Domain\ValueObjects;

class Birthday
{
    protected string $name;
    protected string $birthdate;

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Birthday
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function birthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     * @return Birthday
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name(),
            'birthdate' => $this->birthdate()
        ];
    }
}
