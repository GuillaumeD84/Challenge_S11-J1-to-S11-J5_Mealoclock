<?php
namespace Mealoclock\Controller;

use Mealoclock\Model\MemberModel;
use Mealoclock\Utils\User;

class MemberController extends CoreController
{
  // Liste des membres
  public function list()
  {
    // On récupère la liste de tous les membres
    $list = MemberModel::findAll();

    // On affiche la page
    echo $this->templates->render('member/list', [
      'members' => $list
    ]);
  }

  // Page d'un membre
  public function show($params)
  {
    // On récupère le membre ayant l'id '$params['id']'
    $member = MemberModel::find($params['id']);

    // Si le membre id éxiste alors on l'affiche
    if ($member) {
      echo $this->templates->render('member/show', [
        'member' => $member
      ]);
    } else {
      echo 'Membre inconnu.';
    }
  }

  /**
   * Méthode appelée lorsque la route correspond à : /signup
   * Page permettant de créer un nouveau membre
   */
  public function signup()
  {
    // On crée notre liste des erreurs
    $errors = [];

    // On regarde si on reçoit des données de formulaires
    if (!empty($_POST)) {
      $fields = [
        'first_name' => 'Veuillez saisir votre prénom',
        'last_name' => 'Veuillez saisir votre nom',
        'email' => 'L\'adresse email est obligatoire',
        'password' => 'Le mot de passe est obligatoire',
        'confirm_password' => 'Veuillez resaisir votre mot de passe',
        'address' => 'Le champs Adresse est obligatoire'
      ];

      // On s'assure que chaque champs est bien rempli
      foreach ($fields as $fieldName => $msg) {
        if (empty($_POST[$fieldName])) {
          // Un champs est vide !
          $errors[] = $msg;
        }
      }

      // On regarde si il y a des erreurs de saisie
      if (empty($errors)) {
        // On hash le mot de passe
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Il n'y a pas d'erreurs, on crée le compte
        $user = new MemberModel();
        $user->setFirstName($_POST['first_name']);
        $user->setLastName($_POST['last_name']);
        $user->setEmail($_POST['email']);
        $user->setPassword($hash);
        $user->setAddress($_POST['address']);
        $user->setStatus(1);
        $user->setRoleId(1);

        $user->save();
      }

      // Renvoie le tableau d'erreur(s) pour la requête AJAX
      echo json_encode($errors);
      return;
    }

    // On affiche le template de la page de création de compte
    echo $this->templates->render('member/signup');
  }

  /**
   * Méthode appelée lorsque la route correspond à : /login
   * Page permettant à un utilisateur de se connecter
   */
  public function login()
  {
    // On regarde si le formulaire a été envoyé
    if (!empty($_POST)) {
      // Un utilisateur souhaite se connecter
      // On regarde si le compte existe
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Retourne true si la combinaison email + mdp est valide dans la BD
      $isValid = false;

      // On recherche l'utilisateur qui possède cette email
      $user = MemberModel::findByEmail($email);

      if ($user) {
        // On vérifie que le mot de passe est le bon
        $isValid = password_verify($password, $user->password);

        // Notre utilisateur a saisi les bonnes données
        // on va enregistrer en session, les informations de son compte utilisateur
        if ($isValid) {
          $_SESSION['user'] = $user;
        }
      }

      // Renvoie true/false pour la requête AJAX
      echo json_encode($isValid);
      return;
    }

    // On affiche le formulaire de connexion
    echo $this->templates->render('member/login');
  }

  // Affiche le profil de l'utilisateur
  public function profile()
  {
    // Si l'utilisateur n'est pas connecté
    if (!User::isConnected()) {
      // On le redirige vers la home
      $this->redirect('home');
    }

    echo $this->templates->render('member/profile');
  }

  // Affiche la liste des communautés auquelle appartient l'utilisateur
  public function userCommunity()
  {
    // Si l'utilisateur n'est pas connecté
    if (!User::isConnected()) {
      // On le redirige vers la home
      $this->redirect('home');
    }
    
    echo $this->templates->render('member/userCommunity');
  }

  // Déconnecte l'utilisateur
  public function logout()
  {
    // On supprime l'index "user" dans le tableau $_SESSION
    unset($_SESSION['user']);
    session_destroy();

    $this->redirect('home');
  }
}
