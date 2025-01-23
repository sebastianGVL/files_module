<?php

namespace Abacus\Files\Persistence\Concerns;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

trait HasDisk
{
    final protected function disk(): Filesystem
    {
        return Storage::disk('public');
    }
}