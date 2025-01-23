<?php

namespace Abacus\Files\Persistence;

use Abacus\Files\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read int $id
 * @property string $fileable_type
 * @property int $fileable_id
 * @property string $path
 * @property ?string $name
 */
class File extends Model
{
    protected $table = Package::DB_PREFIX . '_files';

    protected $guarded = ['id'];

    final public function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}