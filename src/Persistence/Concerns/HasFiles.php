<?php

declare(strict_types=1);


namespace Abacus\Files\Persistence\Concerns;

use Abacus\Files\Persistence\File;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasFiles
{
    final public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
}