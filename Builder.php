<?php

abstract class AbstractPageBuilder {
    abstract function getPage();
}

abstract class AbstractPageDirector {
    abstract function __construct(AbstractPageBuilder $builder_in);
    abstract function buildPage();
    abstract function getPage();
}

class HTMLPage {
    private $page = NULL;
    private $page_title = NULL;
    private $page_heading = NULL;
    private $page_text = NULL;
    function __construct() {
    }
    function showPage() {
      return $this->page;
    }
    function setTitle($title_in) {
      $this->page_title = $title_in;
    }
    function setHeading($heading_in) {
      $this->page_heading = $heading_in;
    }
    function setText($text_in) {
      $this->page_text .= $text_in;
    }
    function formatPage() {
       $this->page  = '<html>';
       $this->page .= '<head><title>'.$this->page_title.'</title></head>';
       $this->page .= '<body>';
       $this->page .= '<h1>'.$this->page_heading.'</h1>';
       $this->page .= $this->page_text;
       $this->page .= '</body>';
       $this->page .= '</html>';
    }
}

class HTMLPageBuilder extends AbstractPageBuilder {
    private $page = NULL;
    function __construct() {
      $this->page = new HTMLPage();
    }
    function setTitle($title_in) {
      $this->page->setTitle($title_in);
    }
    function setHeading($heading_in) {
      $this->page->setHeading($heading_in);
    }
    function setText($text_in) {
      $this->page->setText($text_in);
    }
    function formatPage() {
      $this->page->formatPage();
    }
    function getPage() {
      return $this->page;
    }
}

class HTMLPageDirector extends AbstractPageDirector {
    private $builder = NULL;
    public function __construct(AbstractPageBuilder $builder_in) {
         $this->builder = $builder_in;
    }
    public function buildPage() {
      $this->builder->setTitle('Tittle HTMLPage');
      $this->builder->setHeading('Heading HTMLPage');
      $this->builder->setText('Ini testing ngebuild or ');
      $this->builder->setText('ngebangun HTMLPage!');
      $this->builder->formatPage();
    }
    public function getPage() {
      return $this->builder->getPage();
    }
}

  $pageBuilder = new HTMLPageBuilder();
  $pageDirector = new HTMLPageDirector($pageBuilder);
  $pageDirector->buildPage();
  $page = $pageDirector->GetPage();
  print($page->showPage());