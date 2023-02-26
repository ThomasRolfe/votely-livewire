<?php

namespace App\Actions\Tags;

use App\Models\Tag;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteTag
{
    use AsAction;

    public function handle(Tag $tag): bool
    {
        return $tag->delete();
    }
}
