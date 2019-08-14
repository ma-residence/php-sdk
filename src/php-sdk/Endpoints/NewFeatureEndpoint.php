<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Endpoints\Traits\ListTrait;

class NewFeatureEndpoint extends Endpoint
{
    use ListTrait;

    /**
     * @param string $feature
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getRecipients(string $feature, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        $this->request->get("/{$this::getBaseUri()}/$feature/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @return string
     */
    public static function getBaseUri(): string
    {
        return 'new_feature';
    }
}
