<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Endpoint;

use Bluetea\Api\Endpoint\BaseEndpoint;
use Bluetea\Api\Endpoint\EndpointInterface;
use Bluetea\Api\Exception\EndpointParameterException;
use Bluetea\Api\Request\HttpMethod;

class CustomFieldEndpoint extends BaseEndpoint implements EndpointInterface
{
    const ENDPOINT = 'customFieldOption';

    /**
     * Returns all customfield which are visible for the currently logged in user. If no user logged in it returns the list
     * of customfields that are visible when using anonymous access
     *
     * @return mixed
     */
    public function findAll()
    {
        return $this->apiClient->callEndpoint(self::ENDPOINT);
    }

    /**
     * Contains a full representation of a customfield
     *
     * @param int|string $customfieldId
     * @return mixed
     */
    public function find($customfieldId)
    {
        return $this->apiClient->callEndpoint(sprintf('%s/%s', self::ENDPOINT, $customfieldId));
    }
}