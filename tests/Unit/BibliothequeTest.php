<?php

require_once ('./src/Bibliotheque.php');

use PHPUnit\Framework\TestCase;

class BibliothequeTest extends TestCase
{
    public function testAddBook()
    {
        $library = new Library();
        $library->addBook("Harry Potter", "J.K. Rowling", 5);

        $this->assertCount(1, $library->getBooks());
        $this->assertEquals("Harry Potter", $library->getBooks()["Harry Potter"]->getTitle());
        $this->assertEquals("J.K. Rowling", $library->getBooks()["Harry Potter"]->getAuthor());
        $this->assertEquals(5, $library->getBooks()["Harry Potter"]->getAvailableCopies());
    }

    public function testBorrowBook()
    {
        $library = new Library();
        $library->addBook("Harry Potter", "J.K. Rowling", 5);
        $library->borrowBook("Harry Potter", 2);

        $this->assertEquals(3, $library->getAvailableCopies("Harry Potter"));
    }

    public function testReturnBook()
    {
        $library = new Library();
        $library->addBook("Harry Potter", "J.K. Rowling", 5);
        $library->borrowBook("Harry Potter", 2);
        $library->returnBook("Harry Potter", 1);
        $this->assertEquals(4, $library->getAvailableCopies("Harry Potter"));
    }

    public function testGetAvailableCopies()
    {
        $library = new Library();
        $library->addBook("Harry Potter", "J.K. Rowling", 5);
        $library->borrowBook("Harry Potter", 2);

        $this->assertEquals(3, $library->getAvailableCopies("Harry Potter"));
    }
}
?>