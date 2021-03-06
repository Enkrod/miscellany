<?php

namespace App\Models;

use TCG\Voyager\Models\Post;

class Release extends Post
{
    // Do nothing, this class is just for the route resource binding to work with release instead of post.

    public $table = 'posts';

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->id . '-' . str_slug($this->title);
    }
}
