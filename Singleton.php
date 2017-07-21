<?php
class User {
  private $username;
 
  public function getUsername() {
    return $this->username;
  }
 
  public function __construct($id) {
    // misal ambil data user dari database
    $this->username = 'Anggara';
  }
}
 
class CurrentUser {
  private static $user;
 
  // untuk mencegah instantiasi object
  private function __construct() {}
 
  public static function getUser() {
    if(!self::$user) {
      // ambil data dari ? 'i dont care, ari...P'
		// id disesuaikan dari ? 'i dont know from where, ari..:P'
      self::$user = new User(1);
    }
    return self::$user;
  }
 
  // untuk mencegah clone
  private function __clone() {}
}
 
print (CurrentUser::getUser()->getUsername());