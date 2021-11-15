<?php


class User
{
    /*-----------------------------------------------------
                            Attributs :
   -----------------------------------------------------*/
    private $id_user;
    private $nom_user;
    private $prenom_user;
    private $mail_user;
    private $rue_user;
    private $cp_user;
    private $ville_user;
    private $tel_user;
    private $identifiant_user;
    private $mdp_user;
    private $admin;

    /*-----------------------------------------------------
                        Constucteur :
    -----------------------------------------------------*/
    public function __construct($nom_user,  $prenom_user, $mail_user, $rue_user,
                                $cp_user, $ville_user, $tel_user, $identifiant_user, $mdp_user){
        $this->nom_user = $nom_user;
        $this->prenom_user = $prenom_user;
        $this->mail_user = $mail_user;
        $this->rue_user = $rue_user;
        $this->cp_user = $cp_user;
        $this->ville_user = $ville_user;
        $this->tel_user = $tel_user;
        $this->identifiant_user = $identifiant_user;
        $this->mdp_user = $mdp_user;
    }

    /*-----------------------------------------------------
                        Fonctions :
    -----------------------------------------------------*/
    //methode chiffrage d'un mot du mot de passe
    public function hashMdp(){
        // md5 : $this->setMdpUser(md5($this->getMdpUser()));
        $this->setMdpUser(password_hash($this->getMdpUser(), PASSWORD_BCRYPT));
    }

    //méthode ajout d'un utilisateur en bdd
    public function createUser($bdd){
        //récupération des valeurs de l'objet
        $nom_user = htmlspecialchars($this->getNomUser());
        $prenom_user = htmlspecialchars($this->getPrenomUser());
        $mail_user = htmlspecialchars($this->getMailUser());
        $rue_user = htmlspecialchars($this->getRueUser());
        $cp_user = htmlspecialchars($this->getCpUser());
        $ville_user = htmlspecialchars($this->getVilleUser());
        $tel_user = htmlspecialchars($this->getTelUser());
        $identifiant_user = htmlspecialchars($this->getIdentifiantUser());
        $mdp_user = htmlspecialchars($this->getMdpUser());
        $mdp_admin = htmlspecialchars($_POST['mdp_admin']);

        try
        {
            //requête ajout d'un utilisateur
            $req = $bdd->prepare('INSERT INTO utilisateur_connecte(nom_user, prenom_user, mail_user, rue_user, cp_user,
                 ville_user, tel_user, identifiant_user, mdp_user) 
                VALUES (:nom_user, :prenom_user, :mail_user, :rue_user, :cp_user,
                 :ville_user, :tel_user, :identifiant_user, :mdp_user)');
            //éxecution de la requête SQL
            $req->execute(array(
                'nom_user' => $nom_user,
                'prenom_user' => $prenom_user,
                'mail_user' => $mail_user,
                'rue_user' => $rue_user,
                'cp_user' => $cp_user,
                'ville_user' => $ville_user,
                'tel_user' => $tel_user,
                'identifiant_user' => $identifiant_user,
                'mdp_user' => $mdp_user,
            ));
            //fermeture de la connexion à la bdd
            $req->closeCursor();

            //check if user is an admin
            if(!empty(isset($mdp_admin)) && $mdp_admin === "toto"){
                $reponse = $bdd->prepare('UPDATE utilisateur_connecte 
                        SET admin = "1"
                        WHERE mail_user = "'.$mail_user.'" LIMIT 1');

                $reponse->execute(array(
                    'admin' => 1
                ));
            }
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    //méthode pour vérifier si un utilisateur existe dans la bdd
    public function showUser($bdd) {
        //récupération des valeurs de l'objet
        $mail_user = $this->getMailUser();

        try
        {
            //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
            $reponse = $bdd->query('SELECT * FROM utilisateur_connecte WHERE mail_user = "'.$mail_user.'" 
                 LIMIT 1');
            //parcours du résultat de la requête
            while($donnees = $reponse->fetch())
            {
                if($mail_user == $donnees['mail_user']) {
                    return $mail_user;
                }
                else {
                    return false;
                }
            }
        }
        catch(Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    //méthode pour aller chercher les infos d'un user avec son id
 /*   public function displayUser($bdd){
        $id_user = $_SESSION['idUser'];

        try
        {
            //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
            $reponse = $bdd->query('SELECT * FROM utilisateur_connecte WHERE mail_user = "'.$id_user.'" 
                 LIMIT 1');
            //parcours du résultat de la requête
            while($donnees = $reponse->fetch())
            {
                //return $donnees['mdp_user'];
                if($id_user == $donnees['id_user']) {
                    $id = $donnees['id_user'];
                    $nom = $donnees['nom_user'];
                    $prenom = $donnees['prenom_user'];
                    $mail = $donnees['mail_user'];
                    $rue = $donnees['rue_user'];
                    $cp = $donnees['cp_user'];
                    $ville = $donnees['ville_user'];
                    $tel = $donnees['tel_user'];
                    $identifiant = $donnees['identifiant_user'];
                    $mdp = $donnees['mdp_user'];
                }
            }
        }
        catch(Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }*/

    //méthode qui génére les super globales avec les valeurs d'attributs d'un utilisateur en bdd
    public function generateSuperGlobale($bdd)
    {
        //récupération des valeurs de l'objet
        $mail_user = $this->getMailUser();

        try
        {
            //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
            $reponse = $bdd->query('SELECT * FROM utilisateur_connecte WHERE mail_user = "'.$mail_user.'" LIMIT 1');
            //parcours du résultat de la requête
            while($donnees = $reponse->fetch())
            {
                //return $donnees['mdp_user'];
                if($mail_user == $donnees['mail_user'])
                {
                    $id =  $donnees['id_user'];
                    $nom =  $donnees['nom_user'];
                    $prenom =  $donnees['prenom_user'];
                    $mail =  $donnees['mail_user'];
                    $rue =  $donnees['rue_user'];
                    $cp =  $donnees['cp_user'];
                    $ville =  $donnees['ville_user'];
                    $tel =  $donnees['tel_user'];
                    $identifiant =  $donnees['identifiant_user'];
                    $mdp =  $donnees['mdp_user'];

                    //création des super globales Session
                    $_SESSION['idUser'] =  $id;
                    $_SESSION['nomUser'] = $nom;
                    $_SESSION['prenomUser'] =  $prenom;
                    $_SESSION['mailUser'] =  $mail;
                    $_SESSION['rueUser'] =  $rue;
                    $_SESSION['cpUser'] =  $cp;
                    $_SESSION['villeUser'] =  $ville;
                    $_SESSION['telUser'] =  $tel;
                    $_SESSION['identifiantUser'] = $identifiant;
                    $_SESSION['mdpUser'] = $mdp;
                    $_SESSION['connected'] = true;

                    if($donnees['admin'] == 1){
                        $_SESSION['admin'] = true;
                    }
                }
            }
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    //méthode pour tester la connexion d'un utilisateur
    public function userConnnected($bdd) {
        //récupération des valeurs de l'objet
        $mail_user = $this->getMailUser();
        $mdp_user = $this->getMdpUser();
        try {
            //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
            $reponse = $bdd->query('SELECT * FROM utilisateur_connecte WHERE mail_user = "'.$mail_user.'" 
                AND mdp_user = "'.$mdp_user.'" LIMIT 1');
            //parcours du résultat de la requête
            $donnees = $reponse->fetch();
            //check if both passwords correspond
            if(password_verify($mdp_user, PASSWORD_BCRYPT) == password_verify($donnees['mdp_user'], PASSWORD_BCRYPT)) {
                //retourne true si il existe (login en mdp)
                return true;
            }
            else {
                return false;
            }
        }
        catch(Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    //méthode génération d'un token de connexion
    public function createToken() { //////////WAS ist das ??
        //récupération des valeurs de l'objet
        $mail_user = $this->getMailUser();
        $mdp_user = $this->getMdpUser();
        //chaine token en clair
        $token = "$mail_user$mdp_user";
        //encodage du token
        $token = password_hash($token, PASSWORD_BCRYPT);
        //retourne le token
        return $token;
    }

    //méthode mise à jour des informations d'un utilisateur nom et prénom
    public function updateUser($bdd)
    {
        $id_user = $_SESSION['idUser'];
        //récupération des valeurs de l'objet
        $nom_user = htmlspecialchars($this->getNomUser());
        $prenom_user = htmlspecialchars($this->getPrenomUser());
        $mail_user = htmlspecialchars($this->getMailUser());
        $rue_user = htmlspecialchars($this->getRueUser());
        $cp_user = htmlspecialchars($this->getCpUser());
        $ville_user = htmlspecialchars($this->getVilleUser());
        $tel_user = htmlspecialchars($this->getTelUser());
        $identifiant_user = htmlspecialchars($this->getIdentifiantUser());
        $mdp_user = htmlspecialchars($this->getMdpUser());

        try
        {
            //requête ajout d'un utilisateur
            $reponse = $bdd->prepare('UPDATE utilisateur_connecte 
                        SET nom_user = "'.$nom_user.'",
                        prenom_user = "'.$prenom_user.'",
                        mail_user = "'.$mail_user.'",
                        rue_user = "'.$rue_user.'",
                        cp_user = "'.$cp_user.'",
                        ville_user = "'.$ville_user.'",
                        tel_user = "'.$tel_user.'",
                        identifiant_user = "'.$identifiant_user.'",
                        mdp_user = "'.$mdp_user.'"
                        WHERE id_user = '.$id_user.' LIMIT 1');

            $reponse->execute(array(
                'nom_user' => $nom_user,
                'prenom_user' => $prenom_user,
                'mail_user' => $mail_user,
                'rue_user' => $rue_user,
                'cp_user' => $cp_user,
                'ville_user' => $ville_user,
                'tel_user' => $tel_user,
                'identifiant_user' => $identifiant_user,
                'mdp_user' => $mdp_user,
            ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    //méthode de suppression d'un utilisateur
    public function deleteUser($bdd){
        //récupération des valeurs de l'objet
        $id_user = $_SESSION['idUser'];

        try
        {
            //requête ajout d'un utilisateur
            $req = $bdd->prepare('DELETE FROM utilisateur_connecte WHERE id_user = '.$id_user.';');
            $req->execute();
            session_destroy();
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
        //fermeture de la connexion à la bdd
        $req->closeCursor();
    }

    public function displayAccount($bdd){
        $id_user = $this->getIdUser();
        $nom_user = $this->getNomUser();
        $prenom_user = $this->getPrenomUser();
        $mail_user = $this->getMailUser();
        $rue_user = $this->getRueUser();
        $cp_user = $this->getCpUser();
        $ville_user = $this->getVilleUser();
        $tel_user = $this->getTelUser();
        $identifiant_user = $this->getIdentifiantUser();

        $reponse = $bdd->query('SELECT * FROM utilisateur_connecte WHERE mail_user = "'.$mail_user.'" LIMIT 1');
        //parcours du résultat de la requête
        while($donnees = $reponse->fetch())
        {
            //return $donnees['mdp_user'];
            if($mail_user == $donnees['mail_user']) {
                $id = $donnees['id_user'];
                $nom = $donnees['nom_user'];
                $prenom = $donnees['prenom_user'];
                $mail = $donnees['mail_user'];
                $rue = $donnees['rue_user'];
                $cp = $donnees['cp_user'];
                $ville = $donnees['ville_user'];
                $tel = $donnees['tel_user'];
                $identifiant = $donnees['identifiant_user'];
            }}

            //include '../vue/vue_account_user.php';
        include('../vue/header.php');
        echo '
            <div class="flex-grow-1 form_sondage form_connexion user__information">
            
                <div class="form_sondage width-page">
                    <h4 class="user__infos">Mes informations : </h4>
                    <p>Mon nom : ' . $nom . ' </p>
                    <p>Mon prénom : ' . $prenom . ' </p>
                    <p>Mon adresse mail : ' . $mail . ' </p>
                    <p>Mon adresse : ' . $rue . ', ' . $cp . ' ' . $ville . ' </p>
                    <p>Mon téléphone : ' . $tel . ' </p>
                    <p>Mon identifiant : ' . $identifiant . ' </p>
                </div>
            
                <p><a class="inscription_button" href="../vue/vue_suppression.php">Supprimer mon compte</a></p>
                <p><a class="inscription_button" href="../vue/vue_modification_compte.php">Modifier mon compte</a></p>
                <p><a class="inscription_button" href="../vue/vue_deconnexion.php">Déconnexion</a></p>
            
            </div> ';

        include('../vue/footer.php');
        die();
    }

    public function displayAdminAccount($bdd){
        $id_user = $this->getIdUser();
        $nom_user = $this->getNomUser();
        $prenom_user = $this->getPrenomUser();
        $mail_user = $this->getMailUser();
        $rue_user = $this->getRueUser();
        $cp_user = $this->getCpUser();
        $ville_user = $this->getVilleUser();
        $tel_user = $this->getTelUser();
        $identifiant_user = $this->getIdentifiantUser();

        $reponse = $bdd->query('SELECT * FROM utilisateur_connecte WHERE mail_user = "'.$mail_user.'" LIMIT 1');
        while($donnees = $reponse->fetch())
        {
            if($mail_user == $donnees['mail_user']) {
                $id = $donnees['id_user'];
                $nom = $donnees['nom_user'];
                $prenom = $donnees['prenom_user'];
                $mail = $donnees['mail_user'];
                $rue = $donnees['rue_user'];
                $cp = $donnees['cp_user'];
                $ville = $donnees['ville_user'];
                $tel = $donnees['tel_user'];
                $identifiant = $donnees['identifiant_user'];
            }}

        //header('Location : http://localhost:8888/parc_couture/vue/vue_account_admin.php');

        include('../vue/header.php');
        echo '
           <div class="flex-grow-1 form_sondage-admin form_connexion user__information">
            
                <div class="form_sondage-admin width-page">
            
                    <h4 class="user__infos">Mes informations : </h4>
            
                    <h5 class="form_sondage-admin admin__info">Je suis admin !</h5>
                    
                    <p>Mon nom : ' . $nom . ' </p>
                    <p>Mon prénom : ' . $prenom . ' </p>
                    <p>Mon adresse mail : ' . $mail . ' </p>
                    <p>Mon adresse : ' . $rue . ', ' . $cp . ' ' . $ville . ' </p>
                    <p>Mon téléphone : ' . $tel . ' </p>
                    <p>Mon identifiant : ' . $identifiant . ' </p>
                </div>
        
            <p><a class="inscription_button-admin" href="../vue/vue_creation_atelier.php">Ajouter un atelier</a></p>
            <p><a class="inscription_button-admin" href="../controler/display_atelier.php">Voir tous les ateliers</a></p>
        
            <p></p>
        
            <p><a class="inscription_button" href="../vue/vue_suppression.php">Supprimer mon compte</a></p>
            <p><a class="inscription_button" href="../vue/vue_modification_compte.php">Modifier mon compte</a></p>
            <p><a class="inscription_button" href="../vue/vue_deconnexion.php">Déconnexion</a></p>
           </div> ';
        include('../vue/footer.php');

        $reponse->close();
        die();
    }

    /*-----------------------------------------------------
                    Getter and Setter :
    -----------------------------------------------------*/
    /**
     * @return mixed
     */
    public function getNomUser()
    {
        return $this->nom_user;
    }

    /**
     * @param mixed $nom_user
     */
    public function setNomUser($nom_user)
    {
        $this->nom_user = $nom_user;
    }

    /**
     * @return mixed
     */
    public function getPrenomUser()
    {
        return $this->prenom_user;
    }

    /**
     * @param mixed $prenom_user
     */
    public function setPrenomUser($prenom_user)
    {
        $this->prenom_user = $prenom_user;
    }

    /**
     * @return mixed
     */
    public function getMailUser()
    {
        return $this->mail_user;
    }

    /**
     * @param mixed $mail_user
     */
    public function setMailUser($mail_user)
    {
        $this->mail_user = $mail_user;
    }

    /**
     * @return mixed
     */
    public function getRueUser()
    {
        return $this->rue_user;
    }

    /**
     * @param mixed $rue_user
     */
    public function setRueUser($rue_user)
    {
        $this->rue_user = $rue_user;
    }

    /**
     * @return mixed
     */
    public function getCpUser()
    {
        return $this->cp_user;
    }

    /**
     * @param mixed $cp_user
     */
    public function setCpUser($cp_user)
    {
        $this->cp_user = $cp_user;
    }

    /**
     * @return mixed
     */
    public function getVilleUser()
    {
        return $this->ville_user;
    }

    /**
     * @param mixed $ville_user
     */
    public function setVilleUser($ville_user)
    {
        $this->ville_user = $ville_user;
    }

    /**
     * @return mixed
     */
    public function getTelUser()
    {
        return $this->tel_user;
    }

    /**
     * @param mixed $tel_user
     */
    public function setTelUser($tel_user)
    {
        $this->tel_user = $tel_user;
    }

    /**
     * @return mixed
     */
    public function getIdentifiantUser()
    {
        return $this->identifiant_user;
    }

    /**
     * @param mixed $identifiant_user
     */
    public function setIdentifiantUser($identifiant_user)
    {
        $this->identifiant_user = $identifiant_user;
    }

    /**
     * @return mixed
     */
    public function getMdpUser()
    {
        return $this->mdp_user;
    }

    /**
     * @param mixed $mdp_user
     */
    public function setMdpUser($mdp_user)
    {
        $this->mdp_user = $mdp_user;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }
}