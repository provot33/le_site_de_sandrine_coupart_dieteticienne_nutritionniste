<?php
namespace App\Controller;

use App\Repository\AdministratorRepository;
use App\Repository\PatientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login')]
    public function login(
        AdministratorRepository $administratorRepository,
        PatientRepository $patientRepository,
        AuthenticationUtils $authenticationUtils,
    ): Response {
        $errors = [];
        $debugs = [];
        $userConnecte = false;

        $errors[] = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $debugs[] = 'Last User Name : ' . $lastUsername;
        $debugs[] = 'Contenu du $_POST';
        $debugs[] = http_build_query($_POST, '', ', ');
        $debugs[] = 'Contenu du $_SESSION';
        $debugs[] = http_build_query($_SESSION, '', ', ');
        $debugs[] = ' -- ';
        foreach ($_SESSION as $key => $item){
            $debugs[] = $key.' - '.http_build_query($item, '', ', ');
        }
        $debugs[] = 'Test présence d\'un USER dans le POST';
        if (isset($_POST['username'])) {
            $debugs[] = 'User trouvé. On vérifie s\'il est présent dans la table des Admins';
            $user = $administratorRepository->findOneByEmail($_POST['username']);

            if ($user && $administratorRepository->validateUserPassword($user->getId(), $_POST['password'])) {
                $debugs[] = 'User trouvé parmi les Admins';
                // Regénère l'id session pour éviter la fixation de session
                session_reset();
                session_regenerate_id(true);
                if (array_key_exists('user', $_SESSION)) {
                    unset($_SESSION['user']);
                }

                $_SESSION['user'] = [
                    'email' => $user->getEmail(),
                    'first_name' => $user->getFirstname(),
                    'last_name' => $user->getName(),
                    'admin' => true,
                ];

                $userConnecte = true;
                return $this->redirect($this->generateUrl('home'));
            }
            if (!$userConnecte) {
                $debugs[] = 'User pas reconnu comme Admin, on vérifie si c\'est un Patient';
                $user = $patientRepository->findOneByEmail($_POST['username']);

                if ($user && $patientRepository->validateUserPassword($user->getId(), $_POST['password'])) {
                    $debugs[] = 'User trouvé parmi les Patients';
                    // Regénère l'id session pour éviter la fixation de session
                    session_reset();
                    session_regenerate_id(true);
                    if (array_key_exists('user', $_SESSION)) {
                        unset($_SESSION['user']);
                    }
                    $_SESSION['user'] = [
                        'email' => $user->getEmail(),
                        'first_name' => $user->getFirstname(),
                        'last_name' => $user->getName(),
                        'admin' => false,
                        'diet' => $user->getDiet(),
                        'allergens' => $user->getAllergens(),
                    ];

                    $userConnecte = true;
                    return $this->redirect($this->generateUrl('home'));
                }
            }
            if (!$userConnecte) {
                $debugs[] = 'User ni Admin, ni Patient';
                $errors[] = 'Email ou mot de passe incorrect';
            }
        }

        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'erreurs' => $errors,
            'debugs' => $debugs,
        ]);
    }

    #[Route('/logout')]
    public function logout(): Response
    {
        //Prévient les attaques de fixation de session
        session_regenerate_id(true);
        //Supprime les données de session du serveur
        session_destroy();
        //Supprime les données du tableau $_SESSION
        unset($_SESSION);

        return $this->redirect($this->generateUrl('home'));
    }
}
