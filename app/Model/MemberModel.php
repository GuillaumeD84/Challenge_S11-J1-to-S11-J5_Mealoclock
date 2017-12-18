<?php
namespace Mealoclock\Model;

class MemberModel extends CoreModel
{
  // Définition de la 'TABLE' pour le Model Member
  const TABLE = 'users';

  protected $id;
  protected $first_name;
  protected $last_name;
  protected $username;
  protected $presentation;
  protected $email;
  protected $password;
  protected $address;
  protected $lat;
  protected $lng;
  protected $photo;
  protected $status;
  protected $role_id;

  /**
   * Get the value of Id
   *
   * @return mixed
   */
  public function getId()
  {
      return $this->id;
  }

  /**
   * Get the value of First Name
   *
   * @return mixed
   */
  public function getFirstName()
  {
      return $this->first_name;
  }

  /**
   * Set the value of First Name
   *
   * @param mixed first_name
   *
   * @return self
   */
  public function setFirstName($first_name)
  {
    $this->first_name = $first_name;

    return $this;
  }

  /**
   * Get the value of Last Name
   *
   * @return mixed
   */
  public function getLastName()
  {
      return $this->last_name;
  }

  /**
   * Set the value of Last Name
   *
   * @param mixed last_name
   *
   * @return self
   */
  public function setLastName($last_name)
  {
    $this->last_name = $last_name;

    return $this;
  }

  /**
   * Get the value of Username
   *
   * @return mixed
   */
  public function getUsername()
  {
      return $this->username;
  }

  /**
   * Set the value of Username
   *
   * @param mixed username
   *
   * @return self
   */
  public function setUsername($username)
  {
    $this->username = $username;

    return $this;
  }

  /**
   * Get the value of Presentation
   *
   * @return mixed
   */
  public function getPresentation()
  {
      return $this->presentation;
  }

  /**
   * Set the value of Presentation
   *
   * @param mixed presentation
   *
   * @return self
   */
  public function setPresentation($presentation)
  {
    $this->presentation = $presentation;

    return $this;
  }

  /**
   * Get the value of Email
   *
   * @return mixed
   */
  public function getEmail()
  {
      return $this->email;
  }

  /**
   * Set the value of Email
   *
   * @param mixed email
   *
   * @return self
   */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of Password
   *
   * @return mixed
   */
  public function getPassword()
  {
      return $this->password;
  }

  /**
   * Set the value of Password
   *
   * @param mixed password
   *
   * @return self
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of Address
   *
   * @return mixed
   */
  public function getAddress()
  {
      return $this->address;
  }

  /**
   * Set the value of Address
   *
   * @param mixed address
   *
   * @return self
   */
  public function setAddress($address)
  {
    $this->address = $address;

    return $this;
  }

  /**
   * Get the value of Lat
   *
   * @return mixed
   */
  public function getLat()
  {
    return $this->lat;
  }

  /**
   * Set the value of Lat
   *
   * @param mixed lat
   *
   * @return self
   */
  public function setLat($lat)
  {
    $this->lat = $lat;

    return $this;
  }

  /**
   * Get the value of Lng
   *
   * @return mixed
   */
  public function getLng()
  {
    return $this->lng;
  }

  /**
   * Set the value of Lng
   *
   * @param mixed lng
   *
   * @return self
   */
  public function setLng($lng)
  {
    $this->lng = $lng;

    return $this;
  }

  /**
   * Get the value of Photo
   *
   * @return mixed
   */
  public function getPhoto()
  {
      return $this->photo;
  }

  /**
   * Set the value of Photo
   *
   * @param mixed photo
   *
   * @return self
   */
  public function setPhoto($photo)
  {
    $this->photo = $photo;

    return $this;
  }

  /**
   * Get the value of Status
   *
   * @return mixed
   */
  public function getStatus()
  {
      return $this->status;
  }

  /**
   * Set the value of Status
   *
   * @param mixed status
   *
   * @return self
   */
  public function setStatus($status)
  {
    $this->status = $status;

    return $this;
  }

  /**
   * Get the value of Role Id
   *
   * @return mixed
   */
  public function getRoleId()
  {
      return $this->role_id;
  }

  /**
   * Set the value of Role Id
   *
   * @param mixed role_id
   *
   * @return self
   */
  public function setRoleId($role_id)
  {
    $this->role_id = $role_id;

    return $this;
  }


  /**
   * Active record
   * Permet de mettre à jour/créer un membre
   */
  public function save()
  {
    // Connexion à la BD
    $db = Database::getDB();

    // On créé la requête d'ajout/modification
    $sql = 'REPLACE INTO `users` (id, first_name, last_name, username, presentation, email, password, address, lat, lng, photo, status, role_id) VALUES (:id, :first_name, :last_name, :username, :presentation, :email, :password, :address, :lat, :lng, :photo, :status, :role_id)';

    // On prépare la requête
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $this->id, \PDO::PARAM_INT);
    $statement->bindValue(':first_name', $this->first_name, \PDO::PARAM_STR);
    $statement->bindValue(':last_name', $this->last_name, \PDO::PARAM_STR);
    $statement->bindValue(':username', $this->username);
    $statement->bindValue(':presentation', $this->presentation);
    $statement->bindValue(':email', $this->email);
    $statement->bindValue(':password', $this->password);
    $statement->bindValue(':address', $this->address);
    $statement->bindValue(':lat', $this->lat);
    $statement->bindValue(':lng', $this->lng);
    $statement->bindValue(':photo', $this->photo);
    $statement->bindValue(':status', $this->status, \PDO::PARAM_INT);
    $statement->bindValue(':role_id', $this->role_id, \PDO::PARAM_INT);

    // On éxécute la requête
    $result = $statement->execute();

    // On récupère l'id du nouvel event créé dans $this->id
    $this->id = $db->lastInsertId();
  }

  // Retourne un membre via son email
  public static function findByEmail($email)
  {
    // Connexion à la BD
    $db = Database::getDB();

    $query = $db->prepare('SELECT * FROM `users` WHERE `email` LIKE :email');
    $query->bindValue(':email', $email);

    $query->execute();

    return $query->fetchObject();
  }

  // Récupère le nom du rôle associé à l'utilisateur
  public function getRole()
  {
    $db = Database::getDB();

    // On construit la requête SQL
    $sql = 'SELECT `role_name` FROM `roles` WHERE `id`=:id';

    // On prépare la requête SQL
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $this->role_id, \PDO::PARAM_INT);

    // On éxécute la requête
    $statement->execute();

    // On récupère le résultat de la requête
    // $result = $statement->fetchObject();
    return $statement->fetchObject()->role_name;
  }

  // Retourne la liste des id des communautés dont fait parti le membre
  public static function getUserCommunityListById($id)
  {
    $db = Database::getDB();

    // On construit la requête SQL
    $sql = 'SELECT `community_id` FROM `user_community` WHERE `user_id`=:id';

    // On prépare la requête SQL
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $id, \PDO::PARAM_INT);

    // On éxécute la requête
    $statement->execute();

    // On récupère le résultat de la requête
    return $statement->fetchAll(\PDO::FETCH_COLUMN);
  }

  // Supprime l'utilisateur
  public function delete()
  {
    // On construit la requête
    $sql = 'DELETE FROM `users` WHERE `id` = '.$this->id;

    // On récupère la connexion à la BDD
    $db = Database::getDB();

    // On exécute la requête SQL
    return $db->query($sql);
  }
}
