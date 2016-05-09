<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createFormBuilder($contact)
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($contact);
                $em->flush();
                return $this->redirect($this->generateUrl('contacts'));
        }


        return $this->render('AppBundle:Contact:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}