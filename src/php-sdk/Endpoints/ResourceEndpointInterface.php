<?php

namespace MR\SDK\Endpoints;

interface ResourceEndpointInterface
{
    /**
     * @param int $page
     * @param int $perPage
     *
     * @return \MR\SDK\Transport\Response
     */
    public function all($page = 1, $perPage = 20);

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id);

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data = []);

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data = []);

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data = []);

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id, array $data = []);
}
