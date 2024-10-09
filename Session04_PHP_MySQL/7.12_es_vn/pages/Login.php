<div id="center">
    <h2><?php echo LOGIN_TITLE?></h2>
    <form action="" method="post">
        <div class="row">
            <label><?php echo USERNAME?>:</label>
            <div class="input-group">
            <input class="input-field" type="text" name="username" value="">
            </div>
        </div>

        <div class="row">
            <label><?php echo PASSWORD?>:</label>
            <div class="input-group">
            <input class="input-field" type="password" name="password" value="">
            </div>
        </div>

        <div>
            <button type="reset" name="reset-login"><?php echo RESET?></button>
            <button type="submit" name="login"><?php echo LOGIN_BUTTON?></button>
        </div>
    </form>
</div>
