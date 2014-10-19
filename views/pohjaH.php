<!DOCTYPE HTML>
<html>
    <head>
        <title>Kurssikysely</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <script language="javascript">
            <!--
            function linkHaeVastauksetSubmit() {
                document.vastaajaId.submit();
            }
            
            function linkHaeKyselySubmit() {
                document.kyselyId.submit();
            }
            // -->
        </script>
    </head>
    <body>
        <?php if(isset($_SESSION['kirjautunut'])): ?>
            <div align="right" style='font-size:12px'>
                Kirjautunut: <?php echo $_SESSION['kirjautunut']; ?> <a href="logOut.php">Kirjaudu ulos</a>
            </div>
            <div align="left">
                <h1>Kurssikyselyjen hallinta</h1>
            </div>
            <?php 
            require 'views/'.$sivu; 
        else: ?>
            <div align='right' style='font-size:12px'>
                <form action='doLogin.php' method='POST'>
                    Käyttäjätunnus: <input type="text" name="ktunnus"/> 
                    Salasana: <input type="password" name="salasana"/>
                    <button type="submit" value="Submit">Kirjaudu</button>
                </form>
            </div>
            <div id="otsikko" align='left'>
                <h1>Kurssikysely</h1>
            </div>
            <?php 
            require 'views/'.$sivu; 
        endif; ?>
    </body>
</html>