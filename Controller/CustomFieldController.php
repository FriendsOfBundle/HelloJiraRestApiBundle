<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Controller;

use Bluetea\Api\Exception\HttpNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Hgtan\Bundle\HelloJiraRestApiBundle\Response\ServerResponse;

class CustomFieldController extends Controller
{
    /**
     * @Route("/customfield/{name}")
     */
    public function customFieldAction($name)
    {
        $resp = new ServerResponse();
        try {
            $userEndpoint = $this->get('hgtan_jira_rest.endpoint.customfield');
            $resp->setResponseData($userEndpoint->find($name));
        }
        catch (HttpNotFoundException $ex) {
            $resp -> addErrorInfo("System", array("key" => "Issuetype $name not found."));
        }
        return new JsonResponse($resp);
    }
}
