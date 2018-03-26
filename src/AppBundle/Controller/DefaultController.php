<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;


class DefaultController extends Controller
{

    public function acceuilAction(Request $request)
    {
        $user = $this->getUser()->getUsername();

        $session = $request->getSession();
		    $session->set('username', $user);
        return $this->render('AppBundle:Pages:acceuil.html.twig', array('username' => $user));
    }

    public function voirProfilAction(Request $request, $username)
    {
    	//Récupération du user
    	$repositoryUser = $this
    		->getDoctrine()
    		->getManager()
    		->getRepository('AppBundle:User');
    	$user = $repositoryUser->findOneBy(array('username' => $username));

    	//Calcul moyenne des notes
    	$amis = $user->getAmis();


        return $this->render('AppBundle:Pages:voir_profil.html.twig', array(
        	'user' => $user,
        	'amis' => $amis
        	));
    }

    public function mesAmisAction(Request $request, $username)
    {

      $repositoryUser = $this
    		->getDoctrine()
    		->getManager()
    		->getRepository('AppBundle:User');
    	$user = $repositoryUser->findOneBy(array('username' => $username));



      $form = $this->createForm(UserType::class, $user);
          $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) {
  			$ami = $form['nom']->getData();

  			$user->addAmi($ami);


              $em = $this->getDoctrine()->getManager();
  			$em->persist($user);
  			$em->flush();
  			return $this->redirect($this->generateUrl('mes_amis',array('username'=>$username)));
          }
          return $this->render('AppBundle:Pages:mes_amis.html.twig', array(
          	'utilisateur' => $user,
          	'form' => $form->createView()
          	));
      }


      public function supprimerAmiAction(Request $request, $id)
          {
      		$em = $this->getDoctrine()->getManager();
      		$ami = $em->getRepository('AppBundle:User')->findOneBy(array('id' => $id));
      		if (!$ami) {
      			throw $this->createNotFoundException(
      					"Pas d'ami trouvé pour cet id ".$id
      					);
      		}

          $user = $this->getUser();
          $user->removeAmi($ami);


          $em->persist($user);
    			$em->flush();

      		return $this->redirect($this->generateUrl('mes_amis',array('username'=>$user->getUsername())));
          }


    }
