<?php

declare(strict_types=1);


namespace Abacus\Files\Persistence\Services;

use Abacus\Files\Persistence\Contracts\FileWriterInterface;
use Abacus\Files\Persistence\File;
use Illuminate\Http\UploadedFile;

class FileSaver extends AbstractFileSaver
{
    final protected function validate(File $model): void
    {
        return;
    }

    final protected function saveModel(File $model): File
    {
        $model->save();

        return $model;
    }
}