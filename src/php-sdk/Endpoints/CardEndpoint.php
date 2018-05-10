<?php

namespace MR\SDK\Endpoints;

use RuntimeException;

class CardEndpoint extends Endpoint
{
    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get("/{$this::getBaseUri()}/$id");
    }

    /**
     * @param null  $type
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function all($type = null, $page = 1, $perPage = 20, $extraParams = [])
    {
        throw new RuntimeException('Not implemented');
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id, array $data = [])
    {
        return $this->request->delete("/{$this::getBaseUri()}/{$id}", [], $data);
    }

    public static function getBaseUri(): string
    {
        return 'cards';
    }
}
