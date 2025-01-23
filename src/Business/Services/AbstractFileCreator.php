<?php

declare(strict_types=1);


namespace Abacus\Files\Business\Services;

use Abacus\Files\Business\Data\FileData;
use Abacus\Files\Persistence\File;

abstract class AbstractFileCreator
{
    final public function create(FileData $data): File
    {
        $model = $this->createModelFromData($data);

        $this->validate($model);

        return $model;
    }

    abstract protected function validate(File $model): void;

    abstract protected function createModelFromData(FileData $data): File|null;
}