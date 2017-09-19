<?php

namespace MR\SDK\Endpoints;

class ModerationEndPoint extends Endpoint
{
    public function patch($type, $data)
    {
        return $this->request->patch('/moderation/'.$type, [], $data);
    }

    public static function getBaseUri(): string
    {
        return 'moderation';
    }
}
