<?php

namespace MR\SDK\Endpoints;

class TopicEndpoint extends Endpoint
{
    /**
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function all($extraParams = [])
    {
        return $this->request->get('/topics', $extraParams);
    }

    /**
     * @param string $id
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($id, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/topics/$id/activity", array_merge([
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
        return $this->request->get('/topic/'.$id);
    }

}
