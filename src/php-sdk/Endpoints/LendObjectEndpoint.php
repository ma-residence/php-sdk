<?php

namespace MR\SDK\Endpoints;

class LendObjectEndpoint extends Endpoint
{
    /**
     * @return \MR\SDK\Transport\Response
     */
    public function all()
    {
        return $this->request->get('/lend-objects', []);
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete("/lend-objects/{$id}", []);
    }
}
