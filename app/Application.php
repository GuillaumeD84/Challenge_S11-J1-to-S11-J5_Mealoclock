<?php
namespace Mealoclock;

class Application
{
  private $config;
  private $router;

  /**
   * Initialisation de l'application
   */
  public function __construct()
  {
    // Récupération de la config
    $this->config = parse_ini_file('config.conf');

    // Configuration de la base de données
    Model\Database::setConfig($this->config);

    // Instanciation du router
    $this->router = new \AltoRouter();

    // Configuration du chemin de base
    $this->router->setBasePath($this->config["BASEPATH"]);

    // Définition des routes du site
    $this->defineRoutes();
  }

  /**
  * Configuration des routes
  */
  private function defineRoutes()
  {
    // Route de la page d'accueil du site
    $this->router->map('GET', '/', ['MainController', 'home'], 'home');

    // Routes relatives aux communautés
    $this->router->map('GET', '/community/[i:id]', ['CommunityController', 'show'], 'community_show');

    // Routes relatives aux événements
    $this->router->map('GET', '/events', ['EventController', 'list'], 'event_list');
    $this->router->map('GET', '/events/[i:id]', ['EventController', 'show'], 'event_show');
    $this->router->map('GET|POST', '/events/create', ['EventController', 'create'], 'event_create');

    // Routes relatives aux membres
    $this->router->map('GET', '/members', ['MemberController', 'list'], 'member_list');
    $this->router->map('GET', '/members/[i:id]', ['MemberController', 'show'], 'member_show');

    // Routes relatives à l'utilisateur
    $this->router->map('GET|POST', '/signup', ['MemberController', 'signup'], 'member_create');
    $this->router->map('GET|POST', '/login', ['MemberController', 'login'], 'login');
    $this->router->map('GET', '/logout', ['MemberController', 'logout'], 'logout');

    // Routes relatives au profil de l'utilisateur
    $this->router->map('GET', '/profile', ['MemberController', 'profile'], 'profile');
    $this->router->map('GET', '/profile/community', ['MemberController', 'userCommunity'], 'user_community');

    // Routes relatives à l'administration
    $this->router->map('GET', '/admin', ['AdminController', 'home'], 'admin');

    $this->router->map('GET', '/admin/users', ['AdminController', 'userList'], 'admin_user_list');
    $this->router->map('GET', '/admin/users/[i:id]/delete', ['AdminController', 'userDelete'], 'admin_user_delete');

    $this->router->map('GET', '/admin/events', ['AdminController', 'eventList'], 'admin_event_list');
    $this->router->map('GET', '/admin/events/[i:id]/delete', ['AdminController', 'eventDelete'], 'admin_event_delete');
  }

  /**
   * Exécution de l'application
   * le FrontController reçoit la requête
   * match la route puis dispatch
   */
  public function run()
  {
    // Match de la route demandée
    $match = $this->router->match();

    // On test si une route a bien été trouvée
    if ($match === false) {
      echo 'Page not found.';
    }
    // Si oui on récupère et traite les infos retournées par AltoRouter
    else {
      // Le nom du Controller à appeler se trouve dans $match['target'][0]
      $controllerName = 'Mealoclock\\Controller\\'.$match['target'][0];
      // La méthode du Controller à appeler dans $match['target'][1]
      $actionName = $match['target'][1];
      // Les paramètres dans l'URL (ex: id, slug, ...)
      $params = $match['params'];

      // On instancie le Controller
      $controller = new $controllerName($this->router, $this->config);
      // On appelle la méthode
      $controller->$actionName($params);
    }
  }
}
