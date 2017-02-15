<?php

namespace MR\SDK\Endpoints;

class CategoryEndpoint extends Endpoint
{
    const TYPE_INTEREST = 'interest';
    const TYPE_SERVICE = 'service';
    const TYPE_GOOD = 'good';
    const TYPE_BADGE = 'badge';
    const TYPE_ASSOCIATION = 'association';

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
        return $this->request->get('/categories', array_merge([
            'type' => $type,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/categories/'.$id);
    }
}
