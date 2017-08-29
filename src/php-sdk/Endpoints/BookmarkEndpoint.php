<?php

namespace MR\SDK\Endpoints;

class BookmarkEndpoint extends Endpoint
{
    /**
     * @param string $source
     * @param string $target
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post($source, $target)
    {
        return $this->request->post('/bookmarks', [], compact('source', 'target'));
    }

    /**
     * @param string $source
     * @param string $target
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($source, $target)
    {
        return $this->request->delete('/bookmarks', [], compact('source', 'target'));
    }
}
