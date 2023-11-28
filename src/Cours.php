<?php

class Cours {
    public $nom;
    public $professeur;
    public $salle;

    public function __construct($nom, $professeur, $salle) {
        $this->nom = $nom;
        $this->professeur = $professeur;
        $this->salle = $salle;
    }
}

class GestionCours {
    public $liste_cours = [];

    public function ajouterCours($cours) {
        if (in_array($cours, $this->liste_cours)) {
            throw new Exception("Le cours spécifié existe déjà");
        }
        $this->liste_cours[] = $cours;
    }

    public function supprimerCours($nom_cours) {
        foreach ($this->liste_cours as $key => $cours) {
            if ($cours->nom == $nom_cours) {
                unset($this->liste_cours[$key]);
                return;
            }
            else{
                throw new Exception("Le cours spécifié n'existe pas");
            }
        }
        throw new Exception("Le cours spécifié n'existe pas");
    }

    public function rechercherCoursParProfesseur($professeur) {
        $coursProf = [];
        foreach ($this->liste_cours as $cours) {
            if ($cours->professeur == $professeur) {
                $coursProf[] = $cours;
            }
        }
        if (empty($coursProf)) {
            throw new Exception("Le professeur spécifié n'existe pas");
        }
        return $coursProf;
    }
    
    public function modifierSalleCours($nom_cours, $nouvelle_salle) {
        foreach ($this->liste_cours as $cours) {
            if ($cours->nom == $nom_cours) {
                $cours->salle = $nouvelle_salle;
                return;
            }
            else{
                throw new Exception("Le cours spécifié n'existe pas");
            }
        }
        throw new Exception("Le cours spécifié n'existe pas");
    }
}


?>