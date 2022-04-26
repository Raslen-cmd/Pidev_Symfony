<?php

namespace App\Controller;

use DateTime;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('back');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder)
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('back');
        }

        $user = new User();
        $user->setCreatedDateUser(new \DateTime());
        $user->setLastUpdatedUser(new \DateTime());
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $exist = $userRepository->findOneBy(['email' => $form->get('email')->getData()]);
            if ($exist) {
                $this->addFlash(
                    'error',
                    'Email déja utilisé !'
                );
                return $this->redirect($request->getRequestUri());
            }

            $user->setPassword($passwordEncoder->encodePassword(
                $user,
                $form->get('password')->getData()
            ));
            $userRepository->add($user);
            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/register.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
