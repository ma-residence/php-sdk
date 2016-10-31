<?php

namespace MR\SDK\Endpoints;

class MemberOfEndpoint extends Endpoint
{
    /**
     * @param array $source
     * @param array $target
     * @param array $roleIds
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $source, array $target, array $roleIds = [])
    {
        return $this->request->post('/members', [], $this->createFormData($source, $target, $roleIds));
    }

    /**
     * @param array $source
     * @param array $target
     * @param array $roleIds
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete(array $source, array $target, array $roleIds = [])
    {
        return $this->request->delete('/members', [], $this->createFormData($source, $target, $roleIds));
    }

    /**
     * @param array $source
     * @param array $target
     * @param array $roleIds
     *
     * @return array
     */
    public function createFormData(array $source, array $target, array $roleIds = [])
    {
        return [
            'source' => [
                'id' => $source['id'],
                'model_type' => $source['model_type'],
            ],
            'target' => [
                'id' => $target['id'],
                'model_type' => $target['model_type'],
            ],
            'roles' => array_map(function ($roleId) {
                return ['id' => $roleId];
            }, $roleIds),
        ];
    }
}
