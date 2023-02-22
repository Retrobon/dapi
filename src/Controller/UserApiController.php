<?php

namespace App\Controller;

use App\Factory\JsonResponseFactory;
use App\Repository\UserApiRepository;
use App\Service\JpostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserApiController extends AbstractController
{
    public function __construct(private JsonResponseFactory $jsonResponseFactory)
    {
    }

    #[Route('/user/api/{id}', name: 'user_api_test')]
    public function index($id, UserApiRepository $userApiRepository): Response
    {
        $userApi = $userApiRepository->findOneById($id);

        return $this->jsonResponseFactory->create([$userApi]);

    }

    #[Route('/user/api/{id}/category', name: 'user_api_category')]
    public function category($id, UserApiRepository $userApiRepository, JpostService $jpostService): Response
    {
        $userApi = $userApiRepository->findOneById($id);
        $jp = $jpostService->setUserApi($userApi)->init();

        return $this->jsonResponseFactory->create($jp->getCategory());

    }
}
