<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\JobRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Solution;


class PublicController extends Controller
{
    /**
     * @Route("/job", name="getJob")
     */
    public function getJob(JobRepository $jobRepository, ObjectManager $manager)
    {
        $job = $jobRepository->findAvailable();

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
    public function updateJob($id, JobRepository $jobRepository, Request $request, ObjectManager $manager)
    {
        //find job
        $job = $jobRepository->findOneById($id);
        $worker = $request->headers->get('worker');
        $response = $request->request->get('solution');

        if (!$job) {
            dump('prout');
            die;
        }

        $solution = new Solution();
        $solution->setJob($job);
        $solution->setResponse($response);
        $solution->setWorker($worker);

        $manager->persist($solution);
        $manager->flush();

        return new JsonResponse();
    }
}
