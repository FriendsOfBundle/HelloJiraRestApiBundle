<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Controller;

use Bluetea\Api\Exception\HttpNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Hgtan\Bundle\HelloJiraRestApiBundle\Response\ServerResponse;

class ProjectController extends Controller
{
    /**
     * @Route("/project")
     */
    public function findAllAction()
    {
        $resp = new ServerResponse();
        $projectEndpoint = $this->get('jira_rest_api.jira.endpoint.project');
        $resp->setResponseData($projectEndpoint->findAll());
        return new JsonResponse($resp);
    }

    /**
     * @Route("/project/{id}")
     */
    public function findAction($id)
    {
        $resp = new ServerResponse();
        try {
            $projectEndpoint = $this->get('jira_rest_api.jira.endpoint.project');
            $resp->setResponseData($projectEndpoint->find($id));
        }
        catch (HttpNotFoundException $ex) {
            $resp -> addErrorInfo("System", array("key" => "Project $id not found."));
        }
        return new JsonResponse($resp);
    }
}
