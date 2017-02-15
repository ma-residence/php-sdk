<?php

namespace MR\SDK\Endpoints;

class WidgetEndpoint extends Endpoint
{
    /**
     * @param int $page
     * @param int $perPage
     * @param array $zipCodes
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function all($page = 1, $perPage = 20, array $zipCodes = [], $extraParams = [])
    {
        return $this->request->get('/widgets/activity', array_merge([
            'page' => $page,
            'per_page' => $perPage,
            'zipCodes' => $zipCodes,
        ], $extraParams));
    }

    /**
     * @param int $page
     * @param int $perPage
     * @param $place
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function allFromPlace(int $page = 1, int $perPage = 20, $place, $extraParams = [])
    {
        return $this->request->get('/widgets/activity/'.$place, array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }
}
