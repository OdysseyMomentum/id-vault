<?php

// src/Controller/ProcessController.php

namespace App\Controller;

use Conduction\CommonGroundBundle\Service\ApplicationService;
//use App\Service\RequestService;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use function GuzzleHttp\Promise\all;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description.
 *
 * Class DashboardController
 *
 * @Route("/dashboard")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/general")
     * @Template
     */
    public function generalAction(Session $session, Request $request, CommonGroundService $commonGroundService, ApplicationService $applicationService, ParameterBagInterface $params, string $slug = 'home')
    {
        $variables = [];

        return $variables;
    }

    /**
     * @Route("/security")
     * @Template
     */
    public function securityAction(Session $session, Request $request, CommonGroundService $commonGroundService, ApplicationService $applicationService, ParameterBagInterface $params, string $slug = 'home')
    {
        $variables = [];

        return $variables;
    }

    /**
     * @Route("/claims")
     * @Template
     */
    public function claimsAction(Session $session, Request $request, CommonGroundService $commonGroundService, ApplicationService $applicationService, ParameterBagInterface $params, string $slug = 'home')
    {
        $variables = [];
        $variables['claims'] = $commonGroundService->getResourceList('https://dev.zuid-drecht.nl/api/v1/wac/claims')['hydra:member']; //['component' => 'wac', 'type' => 'claims'], ['person' => $this->getUser()->getPerson(), 'order[dateCreated]' => 'desc']

        return $variables;
    }

    /**
     * @Route("/contracts")
     * @Template
     */
    public function contractsAction(Session $session, Request $request, CommonGroundService $commonGroundService, ApplicationService $applicationService, ParameterBagInterface $params, string $slug = 'home')
    {
        $variables = [];
        $variables['contracts'] = $commonGroundService->getResourceList('https://dev.zuid-drecht.nl/api/v1/wac/contracts')['hydra:member']; //['component' => 'wac', 'type' => 'contracts'], ['person' => $this->getUser()->getPerson(), 'order[dateCreated]' => 'desc']

        return $variables;
    }
}