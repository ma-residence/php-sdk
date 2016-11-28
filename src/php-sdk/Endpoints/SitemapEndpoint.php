<?php

namespace MR\SDK\Endpoints;

class SitemapEndpoint extends Endpoint
{

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function getPublications($page, $per_page)
    {
        return $this->getAll('/sitemap/publications', $page, $per_page);
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function getProfiles($page, $per_page)
    {
        return $this->getAll('/sitemap/profiles', $page, $per_page);
    }

    private function getAll($path, $page = 1, $per_page = 100)
    {
        return $this->request->get($path, [
            'page' => $page,
            'per_page' => $per_page,
        ];
    }
}
