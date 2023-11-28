<?php

require_once ('./src/Cours.php');

use PHPUnit\Framework\TestCase;

class CoursTest extends TestCase
{
    public function testAjouterCours()
    {
        $gestion = new GestionCours();
        $cours = new Cours("Maths", "ProfA", "Salle1");
        $gestion->ajouterCours($cours);

        $this->assertContains($cours, $gestion->liste_cours);
    }

    public function testSupprimerCours()
    {
        $gestion = new GestionCours();
        $cours = new Cours("Maths", "ProfA", "Salle1");
        $gestion->ajouterCours($cours);
        $gestion->supprimerCours("Maths");

        $this->assertNotContains($cours, $gestion->liste_cours);
    }

    public function testRechercherCoursParProfesseur()
    {
        $gestion = new GestionCours();
        $cours1 = new Cours("Maths", "ProfA", "Salle1");
        $cours2 = new Cours("Physique", "ProfB", "Salle2");
        $gestion->ajouterCours($cours1);
        $gestion->ajouterCours($cours2);

        $resultatsRecherche = $gestion->rechercherCoursParProfesseur("ProfA");

        $this->assertContains($cours1, $resultatsRecherche);
        $this->assertNotContains($cours2, $resultatsRecherche);
    }

    public function testModifierSalleCours()
    {
        $gestion = new GestionCours();
        $cours = new Cours("Maths", "ProfA", "Salle1");
        $gestion->ajouterCours($cours);

        $gestion->modifierSalleCours("Maths", "NouvelleSalle");

        $this->assertEquals("NouvelleSalle", $cours->salle);
    }

    // Ajoutez d'autres méthodes de test pour les autres fonctionnalités de GestionCours
}
?>
