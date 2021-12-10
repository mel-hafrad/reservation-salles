
<?php include 'header.php'; ?>
    <form action="profil.php" method="POST">
        <label for='current_password' >Mot de passe actuel</label>
        <input type="password" id="current_password" name="current_password" class="form-control" required >
        <br/>
        <label for='new_password'>Nouveau mot de passe</label>
        <input type="password" id="new_password" name="new_password" class="form-control" required/>
        <br/>
        <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
        <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required/>
        <br/>
        <button type="submit" class="btn btn-success" >Sauvegarder</button>
    </form>
</html>
<?php
// Démarrage de la session 
session_start();
// Include de la base de données
require_once 'config.php';


// Si la session n'existe pas 
if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();  }

    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();





// Si les variables existent 
if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['new_password_retype'])) {
    // XSS 
    $current_password = htmlspecialchars($_POST['current_password']);
    $new_password = htmlspecialchars($_POST['new_password']);
    $new_password_retype = htmlspecialchars($_POST['new_password_retype']);

    // On récupère les infos de l'utilisateur
    $check_password  = $bdd->prepare('SELECT password FROM utilisateurs WHERE login = :login');
    $check_password->execute(array(
        "login" => $_SESSION['user']
    ));
    $data_password = $check_password->fetch();

    // Si le mot de passe est le bon
    if (password_verify($current_password, $data_password['password'])) {
        // Si le mot de passe tapé est bon
        if ($new_password === $new_password_retype) {

            // On chiffre le mot de passe
            $cost = ['cost' => 12];
            $new_password = password_hash($new_password, PASSWORD_BCRYPT, $cost);
            // On met à jour la table utiisateurs
            $update = $bdd->prepare('UPDATE utilisateurs SET password = :password WHERE login = :login');
            $update->execute(array(
                "login" => $_SESSION['user'],
                "password" => $new_password
            ));
            // On redirige
            header('Location:landing.php?err=success_password');
            die();
        }
    } else {
        header('Location:landing.php?err=current_password');
        die();
    }
} 
?>
<?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_password':
                                    echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                break;

                                case 'success_password':
                                    echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>
