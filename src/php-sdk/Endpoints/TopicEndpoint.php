<?php

namespace MR\SDK\Endpoints;

class TopicEndpoint extends Endpoint
{
    use Traits\ActivityTrait;

    /**
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function all(array $extraParams = [])
    {
        return $this->request->get('/topics', $extraParams);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/topics/'.$id);
    }

    public static function getBaseUri(): string
    {
        return 'topic';
    }
}
