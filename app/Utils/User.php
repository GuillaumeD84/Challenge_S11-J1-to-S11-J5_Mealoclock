<?php
namespace Mealoclock\Utils;

class User
{
  // Indique si l'utilisateur est connecté ou pas
  public static function isConnected()
  {
    return isset($_SESSION['user']);
  }

  // Retourne l'utilisateur s'il est connecté
  public static function getUser()
  {
    if (!self::isConnected()) return false;
    return $_SESSION['user'];
  }

  // Indique si l'uitlisateur est bien connecté et s'il est bien admin
  public static function isAdmin()
  {
    if (!self::isConnected()) return false;
    return self::getUser()->role_id == 0;
  }
}
