<?php

namespace App\Controller\Admin;

use App\Entity\UserApi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserApiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserApi::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('api_key'),
            TextField::new('name'),
            TextField::new('site_url_request'),
            AssociationField::new('user'),
        ];
    }

}
