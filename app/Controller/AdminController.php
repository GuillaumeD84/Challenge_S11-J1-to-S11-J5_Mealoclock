<?php
namespace Mealoclock\Controller;

use Mealoclock\Utils\User;
use Mealoclock\Model\MemberModel;
use Mealoclock\Model\EventModel;

class AdminController extends CoreController
{
  public function __construct($router, $config)
  {
    // On appelle le construct du parent car on vient de le surcharger
    // mais on souhaite tout de même réutiliser son code
    parent::__construct($router, $config);

    // Si l'utilisateur n'est pas admin
    if (!User::isAdmin()) {
      // On le redirige vers la home
      $this->redirect('home');
    }
  }

  /**
   * Méthode appelée lorsque la route correspond à : /admin
   * Page affichant la home de l'admin
   */
  public function home()
  {
    $list = MemberModel::findAll();

    echo $this->templates->render('admin/home', [
      'members' => $list
    ]);
  }

  /**
   * Méthode appelée lorsque la route correspond à : /admin/users
   * Page affichant la liste des membres pour l'admin
   */
  public function userList()
  {
    $list = MemberModel::findAll();

    echo $this->templates->render('admin/userList', [
      'members' => $list
    ]);
  }

  /**
   * Méthode appelée lorsque la route correspond à : /admin/users/[i:id]/delete
   * La méthode permet de supprimer un membre via son id
   */
  public function userDelete($params)
  {
    // On recherche l'utilisateur à supprimer
    $user = MemberModel::find($params['id']);

    if ($user) {
      // On a trouvé le bon utilisateur
      $user->delete();
    } else {
      // L'utilisateur n'existe pas
      // (peut être qu'on a bidouiller l'URL
      // ou bien qu'un autre admin est passé avant nous)
    }

    $this->redirect('admin_user_list');
  }

  /**
   * Méthode appelée lorsque la route correspond à : /admin/events
   * Page affichant la liste des events pour l'admin
   */
  public function eventList()
  {
    $list = EventModel::findAll();

    echo $this->templates->render('admin/eventList', [
      'events' => $list
    ]);
  }

  /**
   * Méthode appelée lorsque la route correspond à : /admin/events/[i:id]/delete
   * La méthode permet de supprimer un event via son id
   */
  public function eventDelete($params)
  {
    // On recherche l'event à supprimer
    $event = EventModel::find($params['id']);

    if ($event) {
      // On a trouvé le bon utilisateur
      $event->delete();
    } else {
      // L'utilisateur n'existe pas
      // (peut être qu'on a bidouiller l'URL
      // ou bien qu'un autre admin est passé avant nous)
    }

    $this->redirect('admin/eventList');
  }
}
