<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Controller;

use Bluetea\Api\Exception\HttpNotFoundException;
use Bluetea\Api\Exception\UnauthorizedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Hgtan\Bundle\HelloJiraRestApiBundle\Response\ServerResponse;

class UserController extends Controller
{
    /**
     * @Route("/user/{id}")
     */
    public function findAction($id)
    {
        /*$apiClient = new \Bluetea\Api\Client\GuzzleClient(
            'https://hoangthienan.atlassian.net/rest/api/2/',
            new \Bluetea\Api\Authentication\BasicAuthentication('admin', 'password')
        );
        $userEndpoint = new \Bluetea\Jira\Endpoint\UserEndpoint($apiClient);
        // Get all user
        return new JsonResponse($userEndpoint->find('admin'));*/

        $resp = new ServerResponse();
        try {
            $userEndpoint = $this->get('jira_rest_api.jira.endpoint.user');
            $resp->setResponseData($userEndpoint->find($id));
        }
        catch (HttpNotFoundException $ex) {
            $resp -> addErrorInfo("System", array("key" => "User $id not found."));
        }
        catch (UnauthorizedException $ex) {
            $resp -> addErrorInfo("System", array("key" => "unauthorized fail"));
        }
        catch (\Exception $ex) {
            $resp -> addErrorInfo("System", array("key" => $ex->getMessage()));
        }
        return new JsonResponse($resp);
    }

    /**
     * @Route("/user/add")
     */
    public function addUserAction()
    {
        $userEndpoint = $this->get('jira_rest_api.jira.endpoint.user');
        return new JsonResponse($userEndpoint->add('cisservice'));
    }
}
