<nav class="nav">
        <div class="container">
        <div class="nav-row">
            <a href="./index.php" class="logo"><strong>My</strong> portfolio</a>
            <ul class="nav-list">
                <li class="nav-list__item">
                    <a href="../index.php" class="nav-list__link "><?php echo $TRAD["Projects"] ?></a>
                </li>
                <li class="nav-list__item">
                    <a href="./skills.php" class="nav-list__link"><?php echo $TRAD["Skills"] ?></a>
                </li>
                <form action="" method="get">
                    <select name="lang" id="languageSelect" onchange="this.form.submit()">
                        <option value="en" <?= $_COOKIE['lang'] === 'en' ? 'selected' : '' ?>>English</option>
                        <option value="fr" <?= $_COOKIE['lang'] === 'fr' ? 'selected' : '' ?>>Français</option>
                    </select>
                </form>
            </ul>
            
        </div>
    </div>
</nav>
