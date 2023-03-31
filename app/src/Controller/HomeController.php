<?php

namespace App\Controller;

use App\Document\User;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function index(DocumentManager $dm)
    {
        $users = $dm->getRepository(User::class)->findAll();
        dd($users);

        return new Response('Created user with id:' . $user->getId());
    }

    public function addUser(DocumentManager $dm)
    {
        $user = new User();
        $user->setEmail('test@test.com');

        $dm->persist($user);
        $dm->flush();

        return new Response('Created user with id:' . $user->getId());
    }
}