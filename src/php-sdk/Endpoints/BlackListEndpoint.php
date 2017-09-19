<?php

namespace MR\SDK\Endpoints;

class BlackListEndpoint extends Endpoint
{
    /**
     * @param string $source
     * @param string $target
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post($source, $target)
    {
        return $this->request->post("/{$this::getBaseUri()}", [], compact('source', 'target'));
    }

    /**
     * @param string $source
     * @param string $target
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($source, $target)
    {
        return $this->request->delete("/{$this::getBaseUri()}", [], compact('source', 'target'));
    }

    public static function getBaseUri(): string
    {
        return 'blacklists';
    }
}
