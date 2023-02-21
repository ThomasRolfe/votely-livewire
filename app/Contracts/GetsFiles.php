<?php

namespace App\Contracts;

interface GetsFiles
{
    public function getFileUrl(string $path): string;
}
