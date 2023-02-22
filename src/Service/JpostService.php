<?php

namespace App\Service;

use App\Entity\UserApi;
use poster\src\PosterApi;
use Symfony\Component\HttpFoundation\Response;

class JpostService
{
    private UserApi $userApi;

    /**
     * @return UserApi
     */
    public function getUserApi(): UserApi
    {
        return $this->userApi;
    }

    /**
     * @param UserApi $userApi
     */
    public function setUserApi(UserApi $userApi): self
    {
        $this->userApi = $userApi;

        return $this;
    }
    public function init(): self
    {
        if (!$this->userApi) {
            throw new \LogicException('Set the user api');
        }
        PosterApi::init([
            'account_name' => 'demo',
            'access_token' => $this->getUserApi()->getApiKey(),
        ]);

        return $this;
    }

    public function getSettings(): array
    {
        return PosterApi::settings()->getAllSettings()->response;
    }

    public function getCategory(): array
    {
        return PosterApi::menu()->getCategories()->response;
    }
}