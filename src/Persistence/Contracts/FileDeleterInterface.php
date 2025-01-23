<?php

namespace Abacus\Files\Persistence\Contracts;

use Abacus\Files\Persistence\File;

interface FileDeleterInterface
{
    public function delete(int $id): void;

    public function deleteModel(File $model): void;

    public function deleteFile(string $path): void;
}
