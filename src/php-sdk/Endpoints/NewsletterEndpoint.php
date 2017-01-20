<?php

namespace MR\SDK\Endpoints;

class NewsletterEndpoint extends Endpoint
{
    /**
     * @param string $type
     * @param string $frequency
     * @param int    $page
     * @param int    $per_page
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getNewsletterRecipients($type, $frequency, $page = 1, $per_page = 100)
    {
        return $this->request->get("/newsletters/recipients", [
            'newsletter' => $type,
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param string $zipCode
     * @param string $frequency
     * @param int    $page
     * @param int    $per_page
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getNeighbourhoodActivity($zipCode, $frequency, $page = 1, $per_page = 100)
    {
        return $this->request->get("/newsletters/neighbourhood_activity/$zipCode", [
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param string $lot
     * @param string $frequency
     * @param int    $page
     * @param int    $per_page
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getLotActivity($lot, $frequency, $page = 1, $per_page = 100)
    {
        return $this->request->get("/newsletters/lot_activity/$lot", [
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }
}
