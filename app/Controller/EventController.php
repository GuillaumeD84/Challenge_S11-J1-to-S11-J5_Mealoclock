<?php
namespace Mealoclock\Controller;

use Mealoclock\Model\EventModel;

class EventController extends CoreController
{
  /**
   * Echo la liste de tous les Events
   */
  public function list()
  {
    // On récupère la liste de tous les events
    $list = EventModel::findAll();

    // On affiche la page
    echo $this->templates->render('event/list', [
      'events' => $list
    ]);
  }

  /**
   * Méthode appelée lorsque la route correspond à : /events/[i:id]
   * La méthode reçoit l'id de l'event à afficher en paramètre ($params)
   */
  public function show($params)
  {
    // On récupère l'event' ayant l'id '$params['id']'
    $event = EventModel::find($params['id']);

    // Si le membre id éxiste alors on l'affiche
    if ($event) {
      echo $this->templates->render('event/show', [
        'event' => $event
      ]);
    } else {
      echo $this->templates->render('partials/404');
    }
  }

  /**
   * Méthode appelée lorsque la route correspond à : /events/create
   * La route peut être appelée en GET ou en POST.
   * La méthode permet d'accéder au formulaire de création d'un nouvel event
   */
  public function create()
  {
    // Si le form a été soumis (route POST)
    // On traite les infos

    // Array contenant la liste des champs avec une erreur
    $errors = [];

    if (!empty($_POST)) {
      // On créé un objet Event
      $newEvent = new EventModel;

      // On set les attributs de l'Event grâce aux données du POST
      $set = $newEvent->setTitle($_POST['title']);
      if (!$set)
        $errors[] = 'vérifiez le titre';

      $set = $newEvent->setDescription($_POST['description']);
      if (!$set)
        $errors[] = 'vérifiez la description';

      $set = $newEvent->setPrice($_POST['price']);
      if (!$set)
        $errors[] = 'vérifiez le prix';

      $set = $newEvent->setDateEvent($_POST['date_event']);
      if (!$set)
        $errors[] = 'vérifiez la date';

      $set = $newEvent->setNbGuests($_POST['nb_guests']);
      if (!$set)
        $errors[] = 'vérifiez le nb d\'invités';

      $newEvent->setStatus(1);

      $set = $newEvent->setAddress($_POST['address']);
      if (!$set)
        $errors[] = 'vérifiez l\'addresse';

      $set = $newEvent->setIsVirtual($_POST['is_virtual']);
      if (!$set)
        $errors[] = 'vérifiez le type d\'event';

      ////////////////// PROVISOIRE //////////////////
      $set = $newEvent->setOrganizerId($_POST['organizer_id']);
      if (!$set)
        $errors[] = 'vérifiez l\'id de l\'organisateur';
      ////////////////// PROVISOIRE //////////////////

      // S'il n'y a pas d'erreur : on enregistre l'event et on redirige vers la page de l'event créé
      if (empty($errors)) {
        // Active record
        $newEvent->save();

        // On redirige vers la page du nouvel Event
        $this->redirect('event_show', ['id' => $newEvent->getId()]);
      }
    }

    echo $this->templates->render('event/create', [
      'errors' => $errors
    ]);
  }
}
