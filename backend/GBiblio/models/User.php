<?php

class User extends BaseModel
{
    private array $reservations = [];

    private UserEntity $user;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function demandeMembership()
    {
        echo "Not implemented yet";
    }

    
    public function reserveBook(BookEntity $book)
    {
        if (!$this->user->getRole() === "Member") echo "not a member";

        $stmt = $this->pdo->prepare("
            INSERT INTO reservations('book_id,user_id') VALUE(':bookId',':userId')
        ");
        $stmt->execute(["bookId" => $book->getId(), "userId" => $this->user->getId()]);
        $this->reservations[] = $book;
        echo "book successfuly created";
        var_dump($book);
    }



    function getReservedBooks()
    {
        $query = "SELECT * FROM books b 
        LEFT JOIN reservations r ON r.id = b.id  
        ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $books = $stmt->fetchObject(BookEntity::class);
        var_dump($books);
    }

    function getAvailableBooks()
    {
        $query = "SELECT * FROM books b 
        LEFT JOIN reservations r ON r.id != b.id  
        ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $books = $stmt->fetchObject(BookEntity::class);
        var_dump($books);
    }
}
