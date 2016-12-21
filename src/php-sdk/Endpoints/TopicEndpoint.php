<?php

namespace MR\SDK\Endpoints;

class TopicEndpoint extends Endpoint
{
    /**
     * @return \MR\SDK\Transport\Response
     */
    public function get()
    {
        return $this->request->get('/topics');
    }

    /**
     * @param string $id
     * @param int    $page
     * @param int    $per_page
     * @param array    $extra_params
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($id, $page = 1, $per_page = 20, $extra_params = [])
    {
        return $this->request->get("/topics/$id/activity", array_merge([
            'page' => $page,
            'per_page' => $per_page,
        ], $extra_params));
    }
}
