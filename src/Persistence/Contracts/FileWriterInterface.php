<?php

declare(strict_types=1);


namespace Abacus\Files\Persistence\Contracts;

use Abacus\Files\Business\Data\FileData;
use Illuminate\Http\UploadedFile;

interface FileWriterInterface
{
    public function write(FileData $data): string;
}