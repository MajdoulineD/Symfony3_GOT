<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use AppBundle\Entity\User;

class ListController extends Controller
{

  /**
   * @Route("/", name="welcome")
   *//*
    public function showAction(Request $request)
    {
        $characters = [
          'Daenerys Targaryen' => 'Emilia Clarke',
          'Jon Snow'           => 'Kit Harington',
          'Arya Stark'         => 'Maisie Williams',
          'Melisandre'         => 'Carice van Houten',
          'Khal Drogo'         => 'Jason Momoa',
          'Tyrion Lannister'   => 'Peter Dinklage',
          'Ramsay Bolton'      => 'Iwan Rheon',
          'Petyr Baelish'      => 'Aidan Gillen',
          'Brienne of Tarth'   => 'Gwendoline Christie',
          'Lord Varys'         => 'Conleth Hill'
        ];
        return $this->render('default/index.html.twig', array('character' => $characters));
    }*/
    /**
   * @Route("/", name="welcome")
   */
    public function showAction(Request $request)
    {
     $users = $this ->getDoctrine()->getRepository('AppBundle:User')->findAll();
        return $this->render('default/index.html.twig',['users'=>$users]);
    }
      /**
   * @Route("/view/{id}", name="view_user_route")
   */
    public function showUserAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);

        return $this->render('affiche.html.twig',['user'=>$user]);
    }
     /**
   * @Route("/edit/{id}", name="edit_user_route")
   */
    public function editUserAction(Request $request,$id)
    {
      $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);

      $user->setName($user->getName());
      $user->setEmail($user->getEmail());
      $user->setTelephone($user->getTelephone());

      $form = $this->createFormBuilder($user)
        ->add('name',TextType::class,array('attr'=>array('class'=>'form-control')))
       ->add('email',EmailType::class,array('attr'=>array('class'=>'form-control')))
       ->add('telephone',TextType::class,array('attr'=>array('class'=>'form-control')))
       ->add('save',SubmitType::class,array('label'=>'Save Changement','attr'=>array('class'=>'btn btn-primary','style'=>'margin-top:10px')))
       ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid())
      {
        $name = $form['name']->getData();
        $email = $form['email']->getData();
        $telephone = $form['telephone']->getData();

        $em= $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

      $user->setName($name);
      $user->setEmail($email);
      $user->setTelephone($telephone);

    
      $em->flush();

      $this->addFlash('message','User Updated Successful');

      return $this->redirectToroute('welcome');
      }
            return $this->render('edit.html.twig',['form'=>$form->createView()]);
    }
      /**
   * @Route("/delete/{id}", name="delete_user_route")
   */
    public function deleteUserAction($id)
    {
         $em = $this->getDoctrine()->getManager();
         $user = $em->getRepository('AppBundle:User')->find($id);
         $em ->remove($user);
         $em->flush();   
         $this->addFlash('message','User Deleted Successful');
        return $this->render('default/index.html.twig');
    }

}
?>