<?php

namespace MR\SDK\Endpoints;

class WidgetEndpoint extends Endpoint
{
    /**
     * @param int   $page
     * @param int   $per_page
     * @param array $zipCodes
     *
     * @return \MR\SDK\Transport\Response
     */
    public function all($page = 1, $per_page = 20, array $zipCodes = [])
    {
        return $this->request->get('/widgets/activity', [
            'page' => $page,
            'per_page' => $per_page,
            'zipCodes' => $zipCodes,
        ]);
    }

    /**
     * @param int    $page
     * @param int    $per_page
     * @param string $place
     *
     * @return \MR\SDK\Transport\Response
     */
    public function allFromPlace($page, $per_page, $place)
    {
        return $this->request->get('/widgets/activity/'.$place, [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }
}
