<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="contactus.css">
</head>
<body>
    <div class="container">
        <form id="contact" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <?php if(!empty($notify)){ ?>
                <p><?php echo $notify; ?></p>
            <?php } ?>
          <h3>Contact Us</h3>
            <h4>Hubungi kami dengan mengisi isian dibawah</h4>
            <fieldset>
                <input placeholder="Nama Anda" type="text" name="name" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <input placeholder="Email Anda" type="text" name="email" tabindex="2" required>
            </fieldset>
            <fieldset>
                <input placeholder="Subject (optional)" type="text" name="subject" tabindex="4" required>
            </fieldset>
            <fieldset>
                <textarea placeholder="Ketikan pesan Anda" name="message" tabindex="5" required></textarea>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Mengirim pesan">Kirim</button><br>
                <p align="center"><a href="index.php">Kembali</a></p>
            </fieldset>
        </form>
    </div>
</body>
</html>