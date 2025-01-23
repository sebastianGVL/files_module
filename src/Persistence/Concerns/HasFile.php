<?php

declare(strict_types=1);


namespace Abacus\Files\Persistence\Concerns;

use Abacus\Files\Persistence\File;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasFile
{
    final public function files(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }
}