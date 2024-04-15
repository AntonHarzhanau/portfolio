<?php require_once ("locales/locales.php"); ?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php include "./php/nav.php" ?>
    <header class="header">
        <div class="header__wrapper">
            <h1 class="header__title">
                <strong><?php echo $TRAD["Welcom"] ?> <em>Anton</em></strong><br>
            </h1>
                <p><?php echo $TRAD["Text"] ?></p>
            <button class="btn"><?php echo $TRAD["Btn_download"] ?></button>
        </div>
    </header>
    <main class="section">
        <div class="container">
            <h2 class="title"><?php echo $TRAD["h2_Projects_title"] ?></h2>
            <ul class="projects"></ul>
            <button id="btn-show"class="project-btn btn"> <?php echo $TRAD["Btn_show_more"] ?></button>
        </div>
        <div class="modal"></div>
    </main>
    <button id="contact" class="contact-btn" aria-label="Contact me">
    <img src="./img/icons/contact.svg" alt="">
    </button>

    <div id="contactModal" class="modal">
        <div class="modal__card">
            <button type="button" class="modal__button-close">&#10006;</button>
            <h2><?php echo $TRAD["Form_label"] ?></h2>

            <form  novalidate id="contactForm">
                <div class="errors"></div>
                <input type="text" id="input_name" name="name" placeholder="<?php echo $TRAD["Name_placeholder"] ?>"required>
                <input id="input_email" type="email" name="email" placeholder="<?php echo $TRAD["Email_placeholder"] ?>" required >
                <textarea id= "input_message" name="message" placeholder="<?php echo $TRAD["Message_placehoder"] ?>" required></textarea>
                <button type="submit" class="btn"><?php echo $TRAD["Btn_send_form"] ?></button>
            </form>

        </div>
    </div>
    <?php include "./php/footer.php" ?> 
    <script>
        var messages = <?php echo json_encode($TRAD); ?>;
    </script>
    <script src="./js/project.js"></script>
    <script src="./js/nav.js"></script>
    <script src="./js/contact.js"></script>
    <script src="./js/form.js"></script>
</body>
</html>
