<?php

declare(strict_types=1);

namespace Abacus\Files\Persistence\Services;

use Abacus\Files\Persistence\File;
use Illuminate\Http\UploadedFile;

abstract class AbstractFileSaver
{
    final public function save(File $model): File
    {
        $this->validate($model);

        $this->saveModel($model);

        return $model;
    }

    abstract protected function validate(File $model): void;

    abstract protected function saveModel(File $model): File;
}