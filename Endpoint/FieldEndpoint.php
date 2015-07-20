<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Endpoint;

use Bluetea\Api\Endpoint\BaseEndpoint;
use Bluetea\Api\Endpoint\EndpointInterface;
use Bluetea\Api\Exception\EndpointParameterException;
use Bluetea\Api\Request\HttpMethod;

class FieldEndpoint extends BaseEndpoint implements EndpointInterface
{
    const ENDPOINT = 'field';

    /**
     * Returns all field which are visible for the currently logged in user. If no user logged in it returns the list
     * of fields that are visible when using anonymous access
     *
     * @return mixed
     */
    public function findAll()
    {
        return $this->apiClient->callEndpoint(self::ENDPOINT);
    }

    /**
     * Contains a full representation of a field
     *
     * @param int|string $fieldId
     * @return mixed
     */
    public function find($fieldId)
    {
        return $this->apiClient->callEndpoint(sprintf('%s/%s', self::ENDPOINT, $fieldId));
    }
}