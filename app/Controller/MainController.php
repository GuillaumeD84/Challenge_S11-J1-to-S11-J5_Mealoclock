<?php
namespace Mealoclock\Controller;

class MainController extends CoreController
{
  public function home()
  {
    // On récupère la liste de toutes les communautés
    $list = \Mealoclock\Model\CommunityModel::findAll();

    // On affiche le template 'test' en passant en paramètre '$list'
    echo $this->templates->render('main/home', [
      'communities' => $list
    ]);
  }
}
