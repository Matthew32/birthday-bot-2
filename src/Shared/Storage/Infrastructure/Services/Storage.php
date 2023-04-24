<?php

namespace Shared\Storage\Infrastructure\Services;

class Storage implements \Shared\Storage\Application\Services\Storage
{

    public function getJson($filePath, $inArray = true)
    {
        $filePath = file_get_contents(storage_path($filePath));

        return json_decode($filePath, $inArray);
    }
}
