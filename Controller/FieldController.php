<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Controller;

use Bluetea\Api\Exception\HttpNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Hgtan\Bundle\HelloJiraRestApiBundle\Response\ServerResponse;

class FieldController extends Controller
{
    /**
     * @Route("/field")
     */
    public function findAllAction()
    {
        $resp = new ServerResponse();
        $fieldEndpoint = $this->get('hgtan_jira_rest.endpoint.field');
        $resp->setResponseData($fieldEndpoint->findAll());
        return new JsonResponse($resp);
    }
}
