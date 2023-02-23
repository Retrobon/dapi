<?php

namespace App\Controller;

use App\Factory\JsonResponseFactory;
use App\Repository\UserApiRepository;
use App\Repository\UserRepository;
use App\Service\JpostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserApiController extends AbstractController
{

    private string $token;

    public function __construct(private JsonResponseFactory $jsonResponseFactory)
    {

    }

    #[Route('/user/api', name: 'user_api_test')]
    public function index(UserApiRepository $userApiRepository, Request $request): Response
    {
        return $this->jsonResponseFactory->create([$this->getUser()->getUserIdentifier()]);
    }

    #[Route('/user/api/category', name: 'user_api_category')]
    public function category(UserApiRepository $userApiRepository, JpostService $jpostService, Request $request): Response
    {
        $userApi = $userApiRepository->findByApiKey($request->headers->get('X-AUTH-TOKEN'));
        $jp = $jpostService->setUserApi($userApi)->init();

        return $this->jsonResponseFactory->create($jp->getCategory());

    }

    #[Route('/user/api/products', name: 'user_api_products')]
    public function products(UserApiRepository $userApiRepository, JpostService $jpostService, Request $request): Response
    {
        $userApi = $userApiRepository->findByApiKey($request->headers->get('X-AUTH-TOKEN'));
        $jp = $jpostService->setUserApi($userApi)->init();

        return $this->jsonResponseFactory->create($jp->getProducts());

    }
}
