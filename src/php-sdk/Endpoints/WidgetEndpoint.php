<?php

namespace MR\SDK\Endpoints;

class WidgetEndpoint extends Endpoint
{
    /**
     * @param int $page
     * @param int $perPage
     * @param array $zipCodes
     * @return \MR\SDK\Transport\Response
     */
    public function all($page = 1, $perPage = 20, array $zipCodes = [])
    {
        return $this->request->get('/widgets/activity', [
            'page' => $page,
            'perPage' => $perPage,
            'zipCodes' => $zipCodes
        ]);
    }
}
