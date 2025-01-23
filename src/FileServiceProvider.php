<?php

namespace Abacus\Files;

use Abacus\Files\Business\Services\AbstractFileCreator;
use Abacus\Files\Business\Services\FileCreator;
use Abacus\Files\Persistence\Contracts\FileDeleterInterface;
use Abacus\Files\Persistence\Contracts\FileWriterInterface;
use Abacus\Files\Persistence\Services\AbstractFileSaver;
use Abacus\Files\Persistence\Services\FileDeleter;
use Abacus\Files\Persistence\Services\FileSaver;
use Abacus\Files\Persistence\Services\FileWriter;
use Illuminate\Support\ServiceProvider;

class FileServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FileDeleterInterface::class, FileDeleter::class);
        $this->app->bind(FileWriterInterface::class, FileWriter::class);
        $this->app->bind(AbstractFileSaver::class, FileSaver::class);
        $this->app->bind(AbstractFileCreator::class, FileCreator::class);

        $this->loadMigrationsFrom(__DIR__ . '/Persistence/database/migrations');
    }
}
