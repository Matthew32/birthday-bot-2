<?php

namespace Shared\Storage\Application\Services;

interface Storage
{
    public function getJson($filePath, $inArray = true);
}
