<?php
// interface untuk observer
interface IObserver {
  function onChanged($sender, $args);
}
 
// interface untuk yang memberitahu observer
interface IObservable {
  function addObserver($observer);
}
 
// class daftar item
class ItemList implements IObservable {
  private $_observers = array();
  private $_listName = '';
 
  public function addItem($name) {
    foreach($this->_observers as $observer) {
      $observer->onChanged($this, $name);
    }
  }
 
  public function addObserver($observer) {
    $this->_observers[] = $observer;
  }
 
  public function __construct($listName) {
    $this->_listName = $listName;
  }
 
  public function __toString() {
    return $this->_listName . ' List';
  }
}
 
// class logger untuk item
class ItemListLogger implements IObserver {
  public function onChanged($sender, $args) {
    echo $args . ' ditambahkan ke ' . $sender . '<br />';
  }
}
 
// testing
$il = new ItemList('Kantong Belanja');
$il->addObserver(new ItemListLogger());
$il->addItem('Apel');
$il->addItem('Durian');