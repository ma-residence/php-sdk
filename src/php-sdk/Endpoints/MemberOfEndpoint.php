<?php

namespace MR\SDK\Endpoints;

class MemberOfEndpoint extends Endpoint
{
    /**
     * @param string $sourceId
     * @param string $targetId
     * @param array  $roleIds
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post($sourceId, $targetId, array $roleIds = [])
    {
        return $this->request->post('/members', [], $this->createFormData($sourceId, $targetId, $roleIds));
    }

    /**
     * @param string $sourceId
     * @param string $targetId
     * @param array  $roleIds
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($sourceId, $targetId, array $roleIds = [])
    {
        return $this->request->delete('/members', [], $this->createFormData($sourceId, $targetId, $roleIds));
    }

    /**
     * @param string $sourceId
     * @param string $targetId
     * @param array  $roleIds
     *
     * @return array
     */
    public function createFormData($sourceId, $targetId, array $roleIds = [])
    {
        return [
            'source' => [
                'id' => $sourceId,
            ],
            'target' => [
                'id' => $targetId,
            ],
            'roles' => array_map(function ($roleId) {
                return ['id' => $roleId];
            }, $roleIds),
        ];
    }
}
