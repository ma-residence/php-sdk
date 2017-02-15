<?php

namespace MR\SDK\Endpoints;

class SitemapEndpoint extends Endpoint
{
    /**
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getPublications(int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->getAll('/sitemap/publications', int $page = 1, int $perPage = 20, $extraParams);
    }

    /**
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getProfiles(int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->getAll('/sitemap/profiles', int $page = 1, int $perPage = 20, $extraParams);
    }

    /**
     * @param $path
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    private function getAll($path, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get($path, array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }
}
