
<?php 
session_start();
include 'header.php'; ?>

<div class="article">
            <form action="inscription.php" method="post">     
                <div class="form-group">
                    <input type="login" name="login" class="form-control" placeholder="login" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
            </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>
</div>

<?php include 'footer.php'; ?>



<?php 
require_once 'config.php';

if (isset($_POST['login']) && $_POST['password'] && $_POST['password_retype'])
{
$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);
$password_retype = htmlspecialchars($_POST['password_retype']);

 // maintenant je veux vérifier si la personne existe dans la base de donnée
 $check = $bdd->prepare('SELECT login , password FROM utilisateurs WHERE login =?');
 $check->execute(array($login));
 $data = $check->fetch();
 $row = $check->rowCount();

// Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
if($row == 0){ 
  if(strlen($login) <= 100){ // On verifie que la longueur du login <= 100
      if(strlen($password) <= 100){ // On verifie que la longueur du nom <= 100
              if($password === $password_retype){ // si les deux mdp saisis sont bon

                  // On hash le mot de passe avec Bcrypt, via un coût de 12
                  $cost = ['cost' => 12];
                  $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                  // On insère dans la base de données
                  $insert = $bdd->prepare('INSERT INTO utilisateurs(login,password) VALUES(:login,:password)');
                  $insert->execute(array(
                      'login' => $login,
                      'password' => $password,

                  ));               // On redirige avec le message de succès
                  header('Location:landing.php?reg_err=success');
                  die();
              }else{ header('Location: inscription.php?reg_err=password'); die();}
      }else{ header('Location: inscription.php?reg_err=pass_length'); die();}
  }else{ header('Location: inscription.php?reg_err=login_length'); die();}
}else{ header('Location: inscription.php?reg_err=already'); die();}
}
?>











<?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'login_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> login trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
 