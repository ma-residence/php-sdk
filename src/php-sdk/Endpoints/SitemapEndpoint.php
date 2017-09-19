<?php

namespace MR\SDK\Endpoints;

class SitemapEndpoint extends Endpoint
{
    /**
     * @param null $types
     * @param null $scrollId
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getPublications($types = null, $scrollId = null)
    {
        if (null === $scrollId) {
            return $this->request->get('/sitemap/publications', ['initial' => 1, 'types' => $types]);
        }

        return $this->request->get('/sitemap/publications', ['scroll_id' => $scrollId, 'types' => $types]);
    }

    /**
     * @param null $types
     * @param null $scrollId
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getProfiles($types = null, $scrollId = null)
    {
        if (null === $scrollId) {
            return $this->request->get('/sitemap/profiles', ['initial' => 1, 'types' => $types]);
        }

        return $this->request->get('/sitemap/profiles', ['scroll_id' => $scrollId, 'types' => $types]);
    }

    /**
     * @param null $interval
     * @param null $maxResult
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getTopics($interval = null, $maxResult = null)
    {
        return $this->request->get('/sitemap/topics', ['interval' => $interval, 'max_result' => $maxResult]);
    }

    public static function getBaseUri(): string
    {
        return 'sitemap';
    }
}
