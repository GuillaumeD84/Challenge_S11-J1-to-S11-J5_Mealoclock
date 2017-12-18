<?php
namespace Mealoclock\Controller;

use \Mealoclock\Utils\User;

class CoreController
{
  // Routeur de l'application
  protected $router;

  // Config de l'application
  protected $config;

  // Moteur de templates 'Plates'
  protected $templates;

  // protected $user;

  /**
   * CoreController étant le parent de tous les Controllers,
   * ce constructeur sera appelé lors de tout dispatch.
   * ATTENTION le CoreController n'est jamais instancié !
   * Par contre ses enfants hérites de toutes ses méthodes.
   */
  public function __construct($router, $config)
  {
    // On donne accès à tous les Controllers les infos concernant la route matchée
    $this->router = $router;
    // On donne accès à tous les Controllers les infos dans le fichier de config
    $this->config = $config;

    // Instanciation de la classe 'Plates'
    $this->templates = new \League\Plates\Engine('app/Views');

    /**
     * On met à disposition des données pour tous les Controllers
     * grâce à la méthode addData() de Plates
     * Ici la config du routeur et le chemin de base du site
     */
    $this->templates->addData([
      'router' => $this->router,
      'BASE_PATH' => $this->config['BASEPATH'],
      'user' => User::getUser()
    ]);
  }

  /**
   * Permet aux Controllers de rediriger l'utilisateur
   */
  public function redirect($routeName, $params = [])
  {
    header('Location: '.$this->router->generate($routeName, $params));
    exit();
  }
}
