<?php

declare(strict_types=1);


namespace Abacus\Files\Business\Facades;

use Abacus\Files\Business\Data\FileData;
use Abacus\Files\Business\Services\AbstractFileCreator;
use Abacus\Files\Persistence\Contracts\FileDeleterInterface;
use Abacus\Files\Persistence\Contracts\FileWriterInterface;
use Abacus\Files\Persistence\File;
use Abacus\Files\Persistence\Services\AbstractFileSaver;

class FileFacade
{
    public function __construct(
        private readonly AbstractFileCreator $fileCreator,
        private readonly AbstractFileSaver $fileSaver,
        private readonly FileDeleterInterface $fileDeleter,
        private readonly FileWriterInterface $fileWriter
    ) {
    }

    final public function store(FileData $data): File
    {
        $model = $this->fileCreator->create($data);

        $model->path = $this->fileWriter->write($data);

        return $this->fileSaver->save($model);
    }

    final public function update(int $id, FileData $data): File
    {
        $this->fileDeleter->delete($id);

        $model = $this->fileCreator->create($data);

        $model->path = $this->fileWriter->write($data);

        return $this->fileSaver->save($model);
    }

    final public function delete(int $id): void
    {
        $this->fileDeleter->delete($id);
    }
}