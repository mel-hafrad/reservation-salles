<?php
include 'header.php'
?>
<!DOCTYPE html>
            <form action='profil.php' method='post'>
            <h2 class="center">nouvel Ids</h2>
            <div class="formgroup">
                <label for="login">New login:</label>
                <input type="login" name="login" class="control" placeholder="login" required="required" autocomplete="off">
            </div>
            <div class="formgroup">
            <label for="password"> New password:</label>
                <input type="password" name="password" class="control" placeholder="Password" required="required" autocomplete="off">
            </div>
            <div class="formgroup">
            <label for="Password_retype"> Confirm New password:</label>
                <input type="password" name="password_retype" class="control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
            </div>
            <div class="formgroup">
                <button type="submit" id="submit" blockblock">Modifier<button>
            </div>
        <form>

        <?php
include 'footer.php'
?>


