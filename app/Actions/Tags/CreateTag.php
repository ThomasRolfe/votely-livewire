<?php

namespace App\Actions\Tags;

use App\DataTransferObjects\Tags\TagData;
use App\Models\Tag;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateTag
{
    use AsAction;

    public function handle(User $user, TagData $tagData): Tag
    {
        /** @var Tag $tag */
        $tag = $user->tags()->create($tagData->toArray());

        return $tag;
    }
}
