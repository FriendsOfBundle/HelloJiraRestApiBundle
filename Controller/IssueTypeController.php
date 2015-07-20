<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Controller;

use Bluetea\Api\Exception\HttpNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Hgtan\Bundle\HelloJiraRestApiBundle\Response\ServerResponse;

class IssueTypeController extends Controller
{
    /**
     * @Route("/issuetype")
     */
    public function findAllAction()
    {
        $resp = new ServerResponse();
        $issueEndpoint = $this->get('hgtan_jira_rest.endpoint.issuetype');
        $resp->setResponseData($issueEndpoint->findAll());
        return new JsonResponse($resp);
    }

    /**
     * @Route("/issuetype/{name}")
     */
    public function findAction($name)
    {
        $resp = new ServerResponse();
        try {
            $issueEndpoint = $this->get('hgtan_jira_rest.endpoint.issuetype');
            $resp->setResponseData($issueEndpoint->find($name));
        }
        catch (HttpNotFoundException $ex) {
            $resp -> addErrorInfo("System", array("key" => "Issuetype $name not found."));
        }
        return new JsonResponse($resp);
    }
}
