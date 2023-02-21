<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class BookmarkEndpoint extends Endpoint
{
    public function post(string $source, string $target) : Response
    {
        return $this->request->post("/{$this::getBaseUri()}", [], compact('source', 'target'));
    }

    public function delete(string $source, string $target) : Response
    {
        return $this->request->delete("/{$this::getBaseUri()}", [], compact('source', 'target'));
    }

    public static function getBaseUri(): string
    {
        return 'bookmarks';
    }
}
