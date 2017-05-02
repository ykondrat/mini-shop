<?php
/**
 * Created by PhpStorm.
 * User: ykondrat
 * Date: 5/1/17
 * Time: 3:52 PM
 */
?>
<div class="form">
    <form method="POST" action="">
        <fieldset>
            <legend>Modify account</legend>
            <input type="text" name="login" placeholder="New Login" />
            <input type="email" name="email" placeholder="New E-mail" />
            <input type="password" name="old_passwd" placeholder="Old Password" />
            <input type="password" name="new_passwd" placeholder="New Password" />
        </fieldset>
        <input type="submit" name="submit" value="Modify" />
        <input type="submit" name="delete" value="Delete" />
    </form>
</div>
