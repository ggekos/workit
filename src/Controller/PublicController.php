<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PublicController extends Controller
{
    /**
     * @Route("/job", name="getJob")
     */
    public function getJob()
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }

    /**
     * @Route("/job/{id}", name="udpateJob")
     */
    public function updateJob($id)
    {
        dump($id);

        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }
}
