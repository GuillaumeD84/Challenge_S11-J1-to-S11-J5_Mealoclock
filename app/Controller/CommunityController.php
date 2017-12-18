<?php
namespace Mealoclock\Controller;

use \Mealoclock\Model\CommunityModel;
use \Mealoclock\Model\EventModel;

class CommunityController extends CoreController
{
  /**
   * Méthode appelée lorsque la route correspond à : /community/[i:id]
   * La méthode reçoit l'id de la communauté à afficher en paramètre ($params)
   */
  public function show($params)
  {
    // On récupère le paramètre de la route. Il s'agit ici de l'id de la communauté demandée
    $id_community = $params['id'];
    // On demande à la classe CommunityModel de nous renvoyer l'OBJET (community) via l'id
    $community = CommunityModel::find($id_community);

    // On récupère auprès du Model des Events, les 5 prochains events de la categorie $params['id']
    $nextEvents = EventModel::getNextFive($community->getId());

    // On affiche le template avec plusieurs paramètres
    echo $this->templates->render('community/show', [
      'community' => $community,
      'events' => $nextEvents
    ]);
  }
}
