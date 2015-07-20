<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Controller;

use Bluetea\Api\Exception\HttpNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Hgtan\Bundle\HelloJiraRestApiBundle\Response\ServerResponse;

class IssueController extends Controller
{
    /**
     * @Route("/issue/{name}")
     */
    public function issueAction($name)
    {
        $resp = new ServerResponse();
        try {
            $issueEndpoint = $this->get('hgtan_jira_rest.endpoint.issue');
            $resp -> setResponseData($issueEndpoint->find($name));
        }
        catch (HttpNotFoundException $ex) {
            $resp -> addErrorInfo("System", array("key" => "Issue $name not found."));
        }
        return new JsonResponse($resp);
    }

}
