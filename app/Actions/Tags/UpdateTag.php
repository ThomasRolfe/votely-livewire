<?php

namespace App\Actions\Tags;

use App\DataTransferObjects\Tags\TagData;
use App\Models\Tag;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateTag
{
    use AsAction;

    public function handle(Tag $tag, TagData $tagData): Tag
    {
        $tag->update($tagData->toArray());

        return $tag->fresh();
    }
}
