<?php

class Book {
    // Attributs
    private $title;
    private $author;
    private $availableCopies;

    // Constructeur
    public function __construct($title, $author, $availableCopies) {
        $this->title = $title;
        $this->author = $author;
        $this->availableCopies = $availableCopies;
    }

    // Getters
    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getAvailableCopies() {
        return $this->availableCopies;
    }
    
    // Setters
    public function setAvailableCopies($availableCopies) {
        $this->availableCopies = $availableCopies;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    //Bonus
    // getTotalCopies sert à récupérer le nombre total d'exemplaires d'un livre
    public function getTotalCopies() {
        return $this->availableCopies;
    }
}

class Library {
    // $books est un tableau associatif de livres
    private $books = [];
    public function addBook($title, $author, $copies) {
        // Vérifier si le livre existe déjà, sinon l'ajouter
        if (isset($this->books[$title])) {
            throw new Exception("Le livre spécifié existe déjà");
        }
        // Vérifier que le nombre de copies est cohérent
        if ($copies < 1) {
            throw new Exception("Le nombre de copies doit être au moins 1");
        }
        // Créer le livre et l'ajouter à la bibliothèque
        if (empty($title) || empty($author)) {
            throw new Exception("Le titre et l'auteur doivent être spécifiés");
        }
        // Créer le livre et l'ajouter à la bibliothèque
        $this->books[$title] = new Book($title, $author, $copies);
    }

    // borrowBook sert à emprunter des copies d'un livre
    public function borrowBook($title, $numCopies) {
        // Emprunter des copies du livre spécifié
        if (!isset($this->books[$title])) {
            throw new Exception("Le livre spécifié n'existe pas");
        }
        // Vérifier que le nombre de copies empruntées est cohérent
        if ($numCopies < 1) {
            throw new Exception("Le nombre de copies doit être au moins 1");
        }
        // Vérifier que le nombre de copies empruntées n'est pas supérieur au nombre de copies disponibles
        if ($this->books[$title]->getAvailableCopies() < $numCopies) {
            throw new Exception("Il n'y a pas assez de copies disponibles");
        }
        // Diminuer le nombre de copies disponibles
        if ($this->books[$title]->getAvailableCopies() == 0) {
            throw new Exception("Il n'y a pas de copies disponibles");
        }
        // Diminuer le nombre de copies disponibles
        $this->books[$title]->setAvailableCopies($this->books[$title]->getAvailableCopies() - $numCopies);
    }
    
    public function returnBook($title, $numCopies) {
        // Retourner des copies du livre spécifié
        if (!isset($this->books[$title])) {
            throw new Exception("Le livre spécifié n'existe pas");
        }
        // Vérifier que le nombre de copies retournées est cohérent
        if ($numCopies < 1) {
            throw new Exception("Le nombre de copies doit être au moins 1");
        }
        // Vérifier que le nombre de copies retournées n'est pas supérieur au nombre de copies empruntées
        if ($numCopies > $this->books[$title]->getAvailableCopies()) {
            throw new Exception("Le nombre de copies retournées est trop grand");
        }
        // Augmenter le nombre de copies disponibles
        $this->books[$title]->setAvailableCopies($this->books[$title]->getAvailableCopies() + $numCopies);
    }

    public function getAvailableCopies($title) {
        // Renvoie le nombre d'exemplaires disponibles d'un livre
        if (!isset($this->books[$title])) {
            throw new Exception("Le livre spécifié n'existe pas");
        }
        // Renvoie le nombre d'exemplaires disponibles d'un livre
        return $this->books[$title]->getAvailableCopies();
    }

    //Bonus
    // getBooks sert à récupérer la liste des livres
    public function getBooks() {
        return $this->books;
    }
}

?>