<?php

namespace MR\SDK\Endpoints;

class HallNumericEndpoint extends Endpoint implements ResourceEndpointInterface
{
    use Traits\ListTrait;
    use Traits\ResourceTrait;

    /**
     * @param string $id
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getGroupActivity($id, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/{$this::getBaseUri()}/$id/group/activity", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $id
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getLotActivity($id, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/{$this::getBaseUri()}/$id/lot/activity", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $id
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getPlaceActivity($id, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/{$this::getBaseUri()}/$id/place/activity", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public static function getBaseUri(): string
    {
        return 'hall-numerics';
    }
}
