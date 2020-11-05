<?php

namespace App\Controller;

use App\Entity\UserUrl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use App\Form\UserUrlFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;


class UserUrlController extends AbstractController 
{

	/**
	 * @Route("/", name="app_homepage")
     * @Assert\Url
	 */
	public function homepage(EntityManagerInterface $entityManager, Request $request)
	{
		$repository = $entityManager->getRepository(UserUrl::class);
        $userurls = $repository->findAll();
        $form = $this->createForm(UserUrlFormType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
        	$data = $form->getData();

        	$shortenedsubstr = substr(($data['full_url']), 0, 5);
    		$userurl = new UserUrl();
		 	$userurl->setInputUrl($data['full_url']);
		 	$userurl->setShortenedUrl($shortenedsubstr);

		 	
	    
	   		$entityManager->persist($userurl);
	   		$entityManager->flush();

	   		$userurlid = $userurl->getId();
	   		
	   		return $this->redirectToRoute('app_userurl_show', [
	   			'id' => $userurlid,
	   			'userurl' => $userurl,
	   		]);

        }
    	
    	return $this->render('home.html.twig', [
        	'userurls' => $userurls,
        	'userUrlForm' => $form->createView()

        ]);
	}

	/**
	 * @Route("/inputuser")
	 */
	public function inputuser(EntityManagerInterface $em)
    {
    	$form = $this->createForm(UserUrlFormType::class);
    	
    	return $this->render('inputurl.html.twig', [
    		'userUrlForm' => $form->createView()
    	]);
    }

	 /**
     * @Route("/show/{id}", name="app_userurl_show")
     */
 	public function show($id, EntityManagerInterface $entityManager)
	 {
	 	$repository = $entityManager->getRepository(UserUrl::class);
	 	/** @var UserUrl|null $userurl */
	 	$userurl = $repository->findOneBy(['id' => $id]);
	 	if (!$userurl) {
	 		throw $this->createNotFoundException(sprintf('no url found for that id'));
	 	}

	 	return $this->render('user_url/show.html.twig', [
	 		'userurl' => $userurl,
	 	]);
	 }
}