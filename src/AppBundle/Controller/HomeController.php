<?php

namespace AppBundle\Controller;

use Framework\Controller;

class HomeController extends Controller {

    public function indexAction() {
        return $this->render('Home/index.php');
    }

    public function wikiAction() {
        $nbrArticle = 25;
        $marques = ['apple', 'samsung', 'intel'];
        $produits = ['clef', 'lampe', 'stylo', 'gomme'];

        return $this->render('Home/wiki.php', [
                    'nbrArticle' => $nbrArticle,
                    'marques' => $marques,
                    'produits' => $produits,
        ]);
    }

    public function testAction() {
        $nbrArticle = 25;
        $marques = ['', '', ''];
        $produits = ['', '', '', ''];

        return $this->render('Home/test.php', [
                    'nbrArticle' => $nbrArticle,
                    'marques' => $marques,
                    'produits' => $produits,
        ]);
    }

    public function verifMailAction() {
        $request = $this->getRequest();


        if ($_SERVER["REQUEST_METHOD"] === 'POST') { // Si le formulaire a été soumis
            $etat = "erreur"; // On initialise notre etat à erreur, il sera changé à "ok" si la vérification du formulaire est un succès, sinon il reste à erreur
            // On récupère les champs du formulaire, et on arrange leur mise en forme
            if (isset($_POST["nom"]))
                $_POST["nom"] = trim(stripslashes($_POST["nom"])); // trim()  enlève les espaces en début et fin de chaine

            if (isset($_POST["email"]))
                $_POST["email"] = trim(stripslashes($_POST["email"])); // stripslashes()  retire les backslashes ==> \' devient '

            if (isset($_POST["phone"]))
                $_POST["phone"] = trim(stripslashes($_POST["phone"]));

            if (isset($_POST["message"]))
                $_POST["message"] = trim(stripslashes($_POST["message"]));

            // Après la mise en forme, on vérifie la validité des champs
            if (empty($_POST["nom"])) { // L'utilisateur n'a pas rempli le champ pseudo
                $erreur = "Vous n'avez pas entr&eacute; votre nom..."; // On met dans erreur le message qui sera affiché
            } elseif (empty($_POST["email"])) { // L'utilisateur n'a pas rempli le champ email
                $erreur = "Nous avons besoin de votre e-mail pour vous r&eacute;pondre...";
            } elseif (!preg_match("$[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\.[a-z]{2,4}$", $_POST["email"])) { // On vérifie si l'email est bien de la forme messagerie@domaine.tld (cf cours d'expressions régulières)
                $erreur = "Votre adresse e-mail n'est pas valide...";
            } elseif (empty($_POST["message"])) { // L'utilsateur n'a écrit aucun message
                $erreur = "Merci de saisir un message...";
            } else { // Si tous les champs sont valides, on change l'état à ok
                $etat = "ok";
            }
        } else { // Sinon le formulaire n'a pas été soumis
            $etat = "attente"; // On passe donc dans l'état attente
        }

        if ($etat != "ok") { // Le formulaire a été soumis mais il y a des erreurs (etat=erreur) OU le formulaire n'a pas été soumis (etat=attente)
            if ($etat == "erreur") { // Cas où le formulaire a été soumis mais il y a des erreurs
                echo "<span style=\"color:red\">" . $erreur . "</span><br /><br />\n"; // On affiche le message correspondant à l'erreur
            }
        } else { // Sinon l'état est ok donc on envoie le mail
            $son_pseudo = $_POST["nom"]; // On stocke les variables récupérées du formulaire
            $son_email = $_POST["email"];
            $son_phone = $_POST["phone"];
            $son_message = $_POST["message"];

            $mon_email = "sainsily@gmail.com"; // Mise en forme du message que vous recevrez
            $mon_pseudo = "Web sy Design";
            $mon_url = "http://www.web-sy-design.com";
            $mon_phone = "+33684567681";
            $msg_pour_moi = "- Son pseudo : $son_pseudo \n
	- Son E-mail : $son_email \n
	- Son num&eacute;ro de t&eacute;l&eacute;phone : $son_phone \n
	- Message : \n $son_message \n\n";

            // Mise en forme de l'accusé réception qu'il recevra
            $accuse_pour_lui = "Bonjour $son_pseudo,\n
	Votre message m'a bien été envoyé et je tâcherais de vous répondre le plus rapidement possible.\n\n
	- Votre E-mail : $son_email \n
	- Votre num&eacute;ro de t&eacute;l&eacute;phone : $son_phone \n
	- Votre message : \n $son_message \n\n
	Merci et à bientôt sur http://www.web-sy-design.com !";

            // Envoie du mail
            $entete = "From: " . $mon_pseudo . " <" . $mon_email . ">\n"; // On prépare l'entête du message
            $entete .='Content-Type: text/plain; charset="iso-8859-1"' . "\n";
            $entete .='Content-Transfer-Encoding: 8bit';

            if (@mail($mon_email, $msg_pour_moi, $entete) && @mail($son_email, $accuse_pour_lui, $entete)) { // Si le mail a été envoyé
                echo "<p style=\"text-align:center\">Votre message a &eacute;t&eacute; envoy&eacute;, vous recevrez une confirmation par mail.<br /><br />\n"; // On affiche un message de confirmation
            } else { // Sinon il y a eu une erreur lors de l'envoi
                echo "<p style=\"text-align:center\">Un problème s'est produit lors de l'envoi du message.\n";
                echo "<a href=\"" . $_SERVER["PHP_SELF"] . "\">Réessayez...</a></p>\n"; // On propose un lien de retour vers le formulaire
            }
        }
        
        
        echo '<br>ok';
        exit;
        
   /*     return $this->render('Home/articles.php', [
                    'articles' => $articles,
        ]);*/
    }

    public function contactAction() {
        return $this->render('Home/contact.php');
    }

    public function articlesAction() {
        $pdo = $this->getPdo();
        $articles = $pdo->query('Select * From article')->fetchAll();

        return $this->render('Home/articles.php', [
                    'articles' => $articles,
        ]);
    }

    public function listAction() {
        $pdo = $this->getPdo();
        $articles = $pdo->query('Select * From article')->fetchAll();

        return $this->render('Home/list.php', [
                    'articles' => $articles,
        ]);
    }

    public function updateAction() {
        $pdo = $this->getPdo();
        $request = $this->getRequest();

        $pdo->query('UPDATE article SET nom = \'ecran' . rand(1, 20) . '\' WHERE id = ' . $request->get('id'))->fetchAll();

        return $this->render('Home/update.php', [
                    'id' => $request->get('id'),
        ]);
    }

    public function deleteAction() {
        $pdo = $this->getPdo();
        $request = $this->getRequest();

        $r = $pdo->prepare('DELETE FROM article WHERE id = :id');
        $r->bindParam(':id', $request->get('id'));
        $r->execute();

        return $this->render('Home/delete.php', [
                    'id' => $request->get('id'),
        ]);
    }

//    public function contactAction()
//    {
//        $request = $this->getRequest();
//
//        $pdo = $this->getPdo();
//
//        $salle = $this->getRepository('Salle')->find(3);
//
//        return $this->render('contact.php', [
//            'page'  => $request->get('page'),
//            'salle' => $salle,
//        ]);
//    }
//
//    public function produitsAction()
//    {
//        return $this->render('produits.php', []);
//    }
}
