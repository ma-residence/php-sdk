<?php

namespace MR\SDK\Endpoints;

use RuntimeException;

class CategoryEndpoint extends Endpoint
{
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
        throw new RuntimeException("Not implemented");
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id, array $data = [])
    {
        return $this->request->delete("/cards/{$id}", [], $data);
    }
}
