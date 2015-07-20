<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Endpoint;

use Bluetea\Api\Endpoint\BaseEndpoint;
use Bluetea\Api\Endpoint\EndpointInterface;
use Bluetea\Api\Exception\EndpointParameterException;
use Bluetea\Api\Request\HttpMethod;

class IssueEndpoint extends BaseEndpoint implements EndpointInterface
{
    const ENDPOINT = 'issue';

    /**
     * Contains a full representation of a issue
     *
     * @param int|string $issueId
     * @return mixed
     */
    public function find($issueId)
    {
        return $this->apiClient->callEndpoint(sprintf('%s/%s', self::ENDPOINT, $issueId));
    }
}