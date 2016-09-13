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
        $data = [
            'source' => [
                'id' => $sourceId,
            ],
            'target' => [
                'id' => $targetId,
            ],
            'roles' => null,
        ];

        if (!empty($roleIds)) {
            $data['roles'] = [];
            foreach ($roleIds as $roleId) {
                $data['roles'][] = [
                    'id' => $roleId,
                ];
            }
        }

        return $data;
    }
}
