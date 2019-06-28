<?php
session_start();
require "seznamstranek.php";

if (array_key_exists("stranka", $_GET))
{
    $stranka = $_GET["stranka"];
    
    if (!array_key_exists($stranka, $seznamStranek))
    {
        $stranka = "404";
        http_response_code(404);
    }
}
 else
{
  
     $stranka = array_keys($seznamStranek)[0];
}

?>

<!DOCTYPE html>

<html>
    <head>
        <title><?php echo $seznamStranek[$stranka]->getTitulek() ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="apple-touch-icon" sizes="57x57" href="./favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="./favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="./favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="./favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="./favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="./favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="./favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="./favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="./favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="./favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
        <link rel="manifest" href="./favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="./favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
	
        <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&amp;subset=latin-ext" rel="stylesheet"> 
    </head>
    <body>
        <header>
            <div class="toplinebar">
                <div class="container gsearch">
                   
                </div>
            </div>
            <div class="headertopb pt-xl-3 pb-xl-3">
	    <div class="container row">
                <div class="col-lg-3 col-sm-4 logocb">
                    <img src="img/CCELogo2.png" class="logocb img-fluid" alt="ČeskobratrskáCírkevEvangelická">
                </div>
                <div class="col-lg-6 col-sm-8 logonazev my-auto text-center">
                    <p>Českobratrská církev evangelická</p><p> v Praze - Horních Počernicích</p>

                </div>
                <div class="col-lg-3 fotouvod">
                        <img src="img/cbhplogocut.png" class="img-fluid logocb" alt="CBHorníPočernice">
        
                </div>
	    </div>
	    </div>
		
                          </ul>
                  
		 <nav class="navbar navbar-expand-md mainmenu justify-content-center" id="navbar">
                     
                     <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_nav">
			 <span class="navbar-toggler-icon"><i class="fas fa-bars"> </i> </span>
		     </button>
                     
		     <ul class="navbar-nav collapse navbar-collapse justify-content-center" id="collapse_nav">
                        <li class="nav-item"><a class="nav-link btn btn-outline-dark mx-lg-2 mx-md-1" role="button" href="domu">Domů</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-dark mx-lg-2 mx-md-1" role="button" href="program">Program</a></li>
                        <li class="nav-item dropdown"><a class="nav-link btn btn-outline-dark dropdown-toggle mx-lg-2 mx-md-1" id="navbardrop" role="button" data-toggle="dropdown" href="#">Služba</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Přijetí do sboru a křest</a>
                                <a class="dropdown-item" href="#">Doprovázení a služba pro veřejnost</a>
                                <a class="dropdown-item" href="#">Pohřeb</a>
                                <a class="dropdown-item" href="#">Svatba</a>
                            </div>
                            </li>
                        <li class="nav-item dropdown"><a class="nav-link btn btn-outline-dark dropdown-toggle mx-lg-2 mx-md-1" id="navbardrop" role="button" data-toggle="dropdown" href="#">Přečtěte si</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="kazani">Kázání</a>
                                <a class="dropdown-item" href="sborovedopisy">Sborové dopisy</a>
                                <a class="dropdown-item" href="historie">Historie sboru</a>
                                <a class="dropdown-item" href="odkazy">Odkazy</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-dark mx-lg-2 mx-md-1" role="button" href="galerie">Galerie</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-dark mx-lg-2 mx-md-1" role="button" href="kontakt">Kontakt</a></li>
                    </ul>
                  
                </nav>
        </header>
        <section class="content toggle-able invisible">
            <div class="container">
                 <?php
if (array_key_exists("galerie", $_GET))
{
    $adresar = $_GET["galerie"];
    if($adresar == "archiv")
    {
        $rok = "Archiv nezařazených fotek";
        $dir = "img/galleria";
        $foto = glob("$dir/*.{jpg,png,bmp,JPG,JPEG,jpeg}", GLOB_BRACE);
    }
    else 
    {
        $rok = substr($adresar, 0, 4);
        $dir = "img/galleria/".$adresar;
        $foto = glob("$dir/*.{jpg,png,bmp,JPG,JPEG,jpeg}", GLOB_BRACE);
    }
    
    ?>


    <div class="sectiongaleriesingle">
        <h1><?php echo $rok ?></h1>
        <h2><?php 
        if ($adresar == "archiv")
        {
            echo $adresar;
        }
        else 
        {
            echo upravaNazvuSlozky($adresar);
        }
         ?></h2>
           <div class="galleria">
           <?php
           foreach ($foto as $fotka)
           {
               echo "<img src='".$fotka."'/>";
           }

?>
        </div>
        <a href="galerie">Zpět na seznam Galerií</a> 

    </div>
<?php
}
else
{    
    echo "<div class='galerror'>";
    echo "<h1>ERROR: Nevybrali jste galerii!</h1>";
    echo "<a href='galerie'>Zpět na galerie</a>";
    echo "</div>";
}
?>

            </div>

        </section>
        <footer class="content">
            <div class="footer">
	    <div class="container">
                <div class="footermain d-flex flex-column flex-md-row">
                    <div class="footermenu pl-xl-4 col-md-3">
                        <h3 class="mb-1">Menu</h3>
                        <ul class="">
                            <li><a href="uvod">Domů</a></li>
                            <li><a href="historie">Historie</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Program </a>
				<ul class="dropdown-menu">
				    <li><a class="dropdown-item" href="program">Aktuální program</a></li>
				    <li><a class="dropdown-item" href="sdopis">Sborový dopis</a></li>
				    <li><a class="dropdown-item" href="texty">Texty</a></li>
				</ul>
			    </li>
                            <li><a href="galerie" class="">Galerie</a></li>
                             <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Služby </a>
				<ul class="dropdown-menu">
				    <li><a class="dropdown-item" href="x">Křty</a></li>
				    <li><a class="dropdown-item" href="x">Svatby</a></li>
				    <li><a class="dropdown-item" href="x">Pohřby</a></li>
				</ul>
			    </li>
                            <li><a href="kontakt" class="">Kontakt</a></li>
                        </ul>
                    </div>
                    <div class="footeradr pl-1 col-lg-3 col-md-4">
                        <h3 class="mb-1 mb-md-3">Kontakt a adresa</h3>
                        <i class="fas fa-phone fa-rotate-90"></i><a class="mb-1" href="tel:420281922216"> 281 922 216</a>
			<p><i class="far fa-envelope"></i><b class="mb-md-2 d-inline-block">horni-pocernice@evangnet.cz</b></p>
                        <p class="mb-1">Třebešovská 2101/46</p>
                        <p class="mb-1">Praha 20</p>
                        <p class="">19300</p>
                        
                    </div>
                    <div class="footermap mx-auto d-block col-lg-6 col-md-5 align-self-md-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d226.14251887296518!2d14.615525722671741!3d50.11416788953359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470bf293f4bcdbc7%3A0xd119cef3a0a5a576!2zRmFybsOtIHNib3IgxIxlc2tvYnJhdHJza8OpIGPDrXJrdmUgZXZhbmdlbGlja8OpIHYgUHJhemUgOSAtIEhvcm7DrSBQb8SNZXJuaWNl!5e0!3m2!1sen!2scz!4v1535993836195" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                </div>
		<div class="footerbottom">
                    Webdesign © <?php echo date("Y"); ?> Mikuláš Hrubeš
                </div>
            </div>
        </footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <script src="galleria/galleria-1.5.7.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
        
        <script>
        $(window).load(function () {
            var pozice = $('.mainmenu').offset().top;
            var vyskaNavbar = $('.mainmenu').height();
            console.log(pozice);
            console.log(vyskaNavbar);
            $("html, body").animate({                    
            scrollTop: pozice - vyskaNavbar;  
        }, 1000);
        });
        </script>
        <script src="main.js"></script>
        <script>
  (function() { 
    Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('.galleria');
  }());
  Galleria.configure({
    imageCrop: true,
    transition: 'fade',
    responsive: true,
    theme: fullscreen,
    trueFullscreen: true,
    fullscreenDoubleTap: true
});

        </script>
        <script>
            window.onscroll = function() {myFunction()};

            var navbar = document.getElementById("navbar");
            var sticky = navbar.offsetTop;

            function myFunction() {
              if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
              } else {
                navbar.classList.remove("sticky");
              }
            }
        </script>
    </body>
</html>
