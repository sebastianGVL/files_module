<?php

declare(strict_types=1);


namespace Abacus\Files\Persistence\Services;

use Abacus\Files\Business\Data\FileData;
use Abacus\Files\Package;
use Abacus\Files\Persistence\Concerns\HasDisk;
use Abacus\Files\Persistence\Contracts\FileWriterInterface;
use Ramsey\Uuid\Uuid;

class FileWriter implements FileWriterInterface
{
    use HasDisk;

    final public function write(FileData $data): string
    {
        $path = $this->path($data->fileable_id, $data->uploadedFile->extension());
        $data->uploadedFile->storeAs(Package::FOLDER_NAME, $path, 'public');

        if (str_contains($data->uploadedFile->getMimeType(), 'image/')) {
            $img = Image::make($data->uploadedFile);

            $img->save(storage_path('app/public/' . Package::FOLDER_NAME . '/' . $path), 80, 'jpg');
        }

        return Package::FOLDER_NAME . '/' . $path;
    }

    private function path(int $fileable_id, string $extension): string
    {
        return sprintf(Package::PATH, $fileable_id, Uuid::uuid4()->toString(), $extension);
    }
}
