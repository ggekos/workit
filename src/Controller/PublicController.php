<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\JobRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;


class PublicController extends Controller
{
    /**
     * @Route("/job", name="getJob")
     */
    public function getJob(JobRepository $jobRepository, Request $request, ObjectManager $manager)
    {
        $worker = $request->headers->get('worker');

        $job = $jobRepository->findAvailable();

        $job->setAssignation($worker);
        $job->setLastAssignation(new \DateTime());

        $manager->persist($job);
        $manager->flush();

        $data = [
            'instruction' => $job->getInstruction()
        ];

        return new JsonResponse($data);
    }

    /**
     * @Route("/job/{id}", name="udpateJob", methods="PUT")
     */
    public function updateJob($id)
    {
        //find job

        //do the thing

        return new JsonResponse($data);
    }
}
