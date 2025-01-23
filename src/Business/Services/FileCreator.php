<?php

declare(strict_types=1);


namespace Abacus\Files\Business\Services;

use Abacus\Files\Business\Data\FileData;
use Abacus\Files\Persistence\File;

class FileCreator extends AbstractFileCreator
{

    protected function validate(File $model): void
    {
        return;
    }

    protected function createModelFromData(FileData $data): ?File
    {
        $model = new File();

        $model->name = $data->name;
        $model->fileable_id = $data->fileable_id;
        $model->fileable_type = $data->fileable_type;

        return $model;
    }
}