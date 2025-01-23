<?php

namespace Abacus\Files\Persistence\Services;

use Abacus\Files\Persistence\Concerns\HasDisk;
use Abacus\Files\Persistence\Contracts\FileDeleterInterface;
use Abacus\Files\Persistence\File;

class FileDeleter implements FileDeleterInterface
{
    use HasDisk;

    final public function delete(int $id): void
    {
        $model = File::query()->findOrFail($id);
        assert($model instanceof File);

        $this->deleteFile($model->path);

        $this->deleteModel($model);
    }

    final public function deleteModel(File $model): void
    {
        $model->delete();
    }

    final public function deleteFile(string $path): void
    {
        $this->disk()->delete($path);
    }
}
