<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Endpoint;

use Bluetea\Api\Endpoint\BaseEndpoint;
use Bluetea\Api\Endpoint\EndpointInterface;
use Bluetea\Api\Exception\EndpointParameterException;
use Bluetea\Api\Request\HttpMethod;

class IssueTypeEndpoint extends BaseEndpoint implements EndpointInterface
{
    const ENDPOINT = 'issuetype';

    /**
     * Returns all issuetype which are visible for the currently logged in user. If no user logged in it returns the list
     * of issuetypes that are visible when using anonymous access
     *
     * @return mixed
     */
    public function findAll()
    {
        return $this->apiClient->callEndpoint(self::ENDPOINT);
    }

    /**
     * Contains a full representation of a issuetype
     *
     * @param int|string $issuetypeId
     * @return mixed
     */
    public function find($issuetypeId)
    {
        return $this->apiClient->callEndpoint(sprintf('%s/%s', self::ENDPOINT, $issuetypeId));
    }
}