<?php

class Book {
    private $author;
    private $title;
    function __construct($title_in, $author_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
    function getAuthorAndTitle() {
      return $this->getTitle().' by '.$this->getAuthor();
    }
}

class BookTitleDecorator {
    protected $book;
    protected $title;
    public function __construct(Book $book_in) {
        $this->book = $book_in;
        $this->resetTitle();
    }   
   
    function resetTitle() {
        $this->title = $this->book->getTitle();
    }
    function showTitle() {
        return $this->title;
    }
}

class BookTitleExclaimDecorator extends BookTitleDecorator {
    private $btd;
    public function __construct(BookTitleDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function exclaimTitle() {
        $this->btd->title = "!" . $this->btd->title . "!";
    }
}

class BookTitleStarDecorator extends BookTitleDecorator {
    private $btd;
    public function __construct(BookTitleDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function starTitle() {
        $this->btd->title = Str_replace(" ","*",$this->btd->title);
    }
}



  $patternBook = new Book('MarmutMerahJambu, KoalaKumal, dan KambingJantan','Raditya Dika');
 
  $decorator = new BookTitleDecorator($patternBook);
  $starDecorator = new BookTitleStarDecorator($decorator);
  $exclaimDecorator = new BookTitleExclaimDecorator($decorator);
 
  print('tampilkan judul : ');
  print($decorator->showTitle());
  print('<br>');

  print('tampilkan judul setelah ditambah tanda seru : ');
  $exclaimDecorator->exclaimTitle();
  $exclaimDecorator->exclaimTitle();
  print($decorator->showTitle());
  print('<br>');
 
  print('tampilkan judul setelah ditambah bintang : ');
  $starDecorator->starTitle();
  print($decorator->showTitle());
  print('<br>');
 
  print('kembalikan judul ke semula: ');
  print($decorator->resetTitle());
  print($decorator->showTitle());