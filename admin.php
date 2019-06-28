<?php

require "seznamstranek.php";

session_start();

$chybaPrihlaseni = "";

if(array_key_exists("prihlasit", $_POST))
{
    $heslo = $_POST["heslo"];
    if ($heslo == "tajneheslo1")
    {
        //přihlašovací údaje jsou vpořádku
        //uložíme si do session kdo je přihlášen
        $_SESSION["uzivatel"] = "admin";
    }
    else 
    {
        $chybaPrihlaseni = "Heslo neni spravne!";
    }
}

// zkontrolujeme zdali se uzivatel nechce odhlasit
if(array_key_exists("odhlas", $_GET))
{
    //odstranime prihlaseneho uzivate z session z loginu
    unset($_SESSION["uzivatel"]);
    // provedeme přesměrování abychom se zbavili parametru (odhlas) v url
    header("Location: ?");
    exit;
}

$aktualniStranka = null;
// proměná s aktuálně vybranou stránkou
if(array_key_exists("stranka", $_GET))
{
    $stranka = $_GET["stranka"];
    $aktualniStranka = $seznamStranek[$stranka];    // najde nám OBJEKT $stranka
}

// zpracujeme akce přidat/odebrat stránku (je třeba mít to dřív než se zpracuje parametr 'ulozit')
if (array_key_exists("akce", $_GET))
{
    $akce = $_GET["akce"];
    
    if ($akce == "pridat")
    {
        $aktualniStranka = new Stranka("", "", "");
    }
    else if ($akce == "smazat")
    {
        $_SESSION['hlaska'] = "Stránka {$aktualniStranka->getId()} byla vymazána";
        $aktualniStranka->smazat();
        header("Location: ?");
        exit;
    }
    else if ($akce == "nastavPoradi")
    {
        $poradi = $_GET["poradi"];
        Stranka::nastavPoradi($poradi);
        echo "OK";
        exit;
    }
}

if ($aktualniStranka != NULL)
{
    if (array_key_exists("ulozit", $_POST))
    {
        $puvodniId = $aktualniStranka->getId();   // než zmením ID stránky funkcí setId, musím si uložit původní ID stránky, abych mohl zprávně zapsat příkaz UPDATE 
        $aktualniStranka->setId($_POST["id"]);
        $aktualniStranka->setMenu($_POST["menu"]);
        $aktualniStranka->setTitulek($_POST["titulek"]);
        $aktualniStranka->ulozit($puvodniId);
        
        
        // rozdílný systém ukládání protože: id, titulek a menu načítáme pořád, kdežto obsah chceme načíst jen konkrétní 
        $obsah = $_POST["obsah"];
        $aktualniStranka->setObsah($obsah);
        
        // přesměrujeme na editaci stránky dle jejího aktuálního id
        header("Location: ?stranka=".$aktualniStranka->getId());
        exit;
        
    }
}
?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="admin.js"></script>
<link href="css/prism.css" rel="stylesheet" >
<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/all.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&amp;subset=latin-ext" rel="stylesheet"> 
</head>
<body>
    <div class="sectionadmin">
<?php

if (!array_key_exists("uzivatel", $_SESSION))
{

?>
<form method="post">
    Heslo: <input type="password" name="heslo"/> <?php echo $chybaPrihlaseni ?><br>
    <input type="submit" name="prihlasit" value="Prihlasit"/>
</form>
<?php 
}
else 
{
?>
    <div class="useradmin">
    Přihlášen jako: <b><?php echo $_SESSION["uzivatel"] ?></b>
    <form>
        <input type="submit" name="odhlas" value="Odhlasit"/>
    </form>
    </div>

    <?php
        if (array_key_exists("hlaska", $_SESSION))
    {
        echo "<h4>{$_SESSION['hlaska']}</h4>";
        unset($_SESSION['hlaska']);
    }
    echo "<h3>Seznam stránek:</h3>";
    echo "<ul id='menu-stranek'>";
    foreach ($seznamStranek as $strankaMenu => $infoOStrance)
    {
        // on click - java script
        echo "<li id='$strankaMenu'><a href='?stranka=$strankaMenu'>$strankaMenu</a><a href='?stranka=$strankaMenu&akce=smazat'
        
        
        onclick='return confirm(\"Opravdu smazat?\")'                       

        >
            
        Odstranit</a></li>";
    }
    echo "</ul>";
    
    // přidáme možnost přidat novou stránku
    echo "<a href='?akce=pridat'>Přidat stránku</a>";
    

    // zobrazit editační formulář pokud je nějaká stránka vybraná
    if($aktualniStranka != null)
    {
        echo "<h1>Editace stránky: {$aktualniStranka->getId()}</h1>";
?>
     <form method="post" class="textarea">
        Id: <input type="text" name="id" value="<?php echo htmlspecialchars($aktualniStranka->getId()) ?>"/><br>
        Menu: <input type="text" name="menu" value="<?php echo htmlspecialchars($aktualniStranka->getMenu()) ?>"/><br>
        Titulek: <input type="text" name="titulek" value="<?php echo htmlspecialchars($aktualniStranka->getTitulek()) ?>"/><br>
        <textarea name="obsah" rows="30" cols="100"><?php echo htmlspecialchars($aktualniStranka->getObsah()) ?></textarea><br>
        <input type="submit" name="ulozit" value="Ulozit"/>
    </form>
    <script src="prism.js"></script>
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
      tinymce.init({ 
          forced_root_block : "",
          selector:'textarea', 
          entity_encoding : "raw", 
          plugins: ['code', 'codesample'],
          codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
        ],
          toolbar: "codesample",
          content_css: ['bootstrap-4.1.3-dist/css/bootstrap.min.css', 'css/style.css', 'css/all.css'],
          cleanup: false,
          verify_html: false
        });
    </script>
    </div>
</body>
<?php
        
    }
}
