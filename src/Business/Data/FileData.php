<?php

declare(strict_types=1);


namespace Abacus\Files\Business\Data;

use Illuminate\Http\UploadedFile;

class FileData
{
    public function __construct(
        public string $fileable_type,
        public int $fileable_id,
        public string $name,
        public UploadedFile $uploadedFile
    ) {
    }
}