<?php

namespace MR\SDK\Endpoints;

class RoleEndpoint extends Endpoint
{
    /**
     * @param null  $type
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function all($type = null, $extraParams = [])
    {
        if ($type) {
            $extraParams['type'] = $type;
        }

        return $this->request->get('/roles', $extraParams);
    }

    public static function getBaseUri(): string
    {
        return 'roles';
    }
}
