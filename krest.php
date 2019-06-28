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

$logoUvod = "";
$logoOstatni = "";

if ($stranka == "domu")
{
    $logoUvod = "d-none";
}
else
{
    $logoOstatni = "d-none";
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
        
        <link rel="stylesheet" href="animate.css/animate.min.css">

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
                        <img src="img/cbhplogocut.png" class="img-fluid logocb <?php echo $logoUvod ?>" alt="CBHorníPočernice">
                   
		   <div id="demo" class="carousel slide <?php echo $logoOstatni ?>" data-ride="carousel">

		    <!-- Indicators -->
		    <ul class="carousel-indicators ">
		      <li data-target="#demo" data-slide-to="0" class="active"></li>
		      <li data-target="#demo" data-slide-to="1"></li>
		      <li data-target="#demo" data-slide-to="2"></li>
		      <li data-target="#demo" data-slide-to="3"></li>
		    </ul>

		    <!-- The slideshow -->
		    <div class="carousel-inner fotouvod2">
			<div class="carousel-item img-fluid active">
			<img src="img/cbhplogosmall.jpg" alt="CB Logo">
			</div>
			<div class="carousel-item img-fluid">
			<img src="img/modlitebna.jpg" alt="Modlitebna">
			</div>
			<div class="carousel-item img-fluid">
			<img src="img/modlitebna1.JPG" alt="Modlitebna">
			</div>
			<div class="carousel-item img-fluid">
			<img src="img/modlitebna2.JPG" alt="Modlitebna">
			</div>
		      
		    </div>

		</div>
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
                        <li class="nav-item dropdown"><a class="nav-link btn btn-outline-dark dropdown-toggle mx-lg-2 mx-md-1" id="navbardrop" role="button" data-toggle="dropdown" href="#">Služba </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="krest">Přijetí do sboru a křest</a>
                                <a class="dropdown-item" href="verejnost">Doprovázení a služba pro veřejnost</a>
                                <a class="dropdown-item" href="pohreb">Pohřeb</a>
                                <a class="dropdown-item" href="svatba">Svatba</a>
                            </div>
                            </li>
                        <li class="nav-item dropdown"><a class="nav-link btn btn-outline-dark dropdown-toggle mx-lg-2 mx-md-1" id="navbardrop" role="button" data-toggle="dropdown" href="#">Přečtěte si </a>
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
            <div id="pozvankapopup" class="animated fadeInDown">
                <div class="pozvanka"><a href="program" target="_blank"><img src="img/pozvánkainstalace2122018.jpg" class="img-fluid mx-auto" alt="Pozvánka na instalaci"/></a></div>
            </div>
            <div class="gettotop">
                <i class="fas fa-arrow-alt-circle-up"></i>
            </div>
            <div class="container">
                <section class="sectionkrest">
                    <h1>Přijetí do sboru, křest</h1>
                    

                    <p><b>Církev od začátku svého působení vítá nové lidi, protože jako svůj hlavní úkol vidí vyřídit světu, že Pán Bůh má svoje stvoření a člověka rád a že má radost z každého, kdo tuto lásku přijímá.</b></p> 
                    <p><b>Rádi Vás přivítáme jako občasnou návštěvu přátel sboru i jako nové členy.</b></p>

<p>Když přišel na svět Ježíš Kristus a setkával se s lidmi, mnozí poznali, že v té chvíli se nebe dotknulo země. Poznali, že celý Ježíšův život i to, že se nedal odradit a kvůli svému poslání zemřel na kříži, je jedním velkým svědectvím o Boží lásce.</p> 
<p>O lásce, která má moc překonat dokonce i zlou vůli a smrt. Lidem, kteří se s tímto svědectvím setkali, dal Ježíš za úkol pokračovat – učit další lidi dobrému životu a přijímat je do společenství.</p> 
<p>A aby to Boží přijetí bylo vidět, ustanovil jasné znamení – křest.</p>
<p>Ve křtu Bůh člověku dosvědčuje, že ho cele přijímá a očišťuje od hříchu. Voda odmývá všechno zlé, co by nás od Boha mohlo dělit, voda občerstvuje a dává život, připomíná nové narození.</p>

<p><b>Křest a jeho zaslíbení je ovšem třeba ze strany lidské přijmout.</b> Přijetím křtu (pro sebe či pro své děti) se také hlásíme k Ježíši Kristu a vstupujeme do jeho rodiny – do církve, a to v její konkrétní podobě místního společenství. Proto se křest koná při bohoslužbách. Někdo se pro křest rozhoduje rychle, mnohdy se jedná o proces, který zraje roky.</p> 
<p><b>Tento důležitý krok vyžaduje dobrou přípravu.</b> Tradičně se mluví o předkřestní katechezi (urgentní situace samozřejmě řešíme s ohledem na konkrétní podmínky). Ozvěte se včas farářce, přijďte na bohoslužby, rádi Vás uvidíme. Obvykle se s farářkou domluvíte na pěti setkáních (úvodní, otázky života a víry, příprava bohoslužeb se křtem), rodiny s malými dětmi je možné navštěvovat i doma.</p>

<p><b>Českobratrská církev evangelická uznává křest všech křesťanských církví a neopakuje ho. Křest dětí a dospělých vyznává jako rovnocenný.</b></p>
<p>Někteří možná namítnou, že z dětství si vlastní křest nepamatují nebo že byli pokřtění v jiné denominaci a chtějí vstoupit do evangelické církve. <b>Těm, kdo by rádi vstoupili do sboru, nabízíme bohoslužebné přijetí do sboru, připomínku křtu nebo konfirmaci (potvrzení křtu, nemusí jít vždy o dospívající) včetně přípravy.</b></p>
<p>Jiní rodiče by byli rádi za slavnostní přijetí dětí do sboru a požehnání pro jejich život, ale rozhodnutí ke křtu chtějí nechat na nich. I to je v našem sboru možné.</p>
<p>Pokud jste členy jiného (nejen) evangelického sboru, ale přistěhovali jste se poblíž nebo jen trávíte čas v Praze, přijďte, i kdyby „jen“ na návštěvu. Rádi se setkáme se všemi, kdo stojí o sborové společenství.</p>

<p><strong><i>Ve všech těchto případech se spojte s farářkou, ráda se Vám bude věnovat, nebo jednoduše přijďte na bohoslužby.</i></strong></p>

<div class="krestrad">
    <h2><a href="https://www.evangnet.cz/cce/czr/rsz.html" target="_blank">Řád sborového života ČCE:</a></h2>
    <p>„Žadatelé o křest jsou ke křtu připravováni soustředěnou, často individuální katechezí, jež je uvádí do základních obsahů křesťanské víry a do života sboru a církve. V případě křtu malých dětí jsou takto připravováni ti, kdo o křest požádali. Závěrem této přípravy je křest.</p>
    <p>Již pokřtěným zájemcům o víru a život v církvi, kteří dosud v církvi nežili nebo přicházejí z jiné církve, je poskytována odpovídající katechetická příprava, jejímž závěrem je přijetí za člena nebo členku sboru.</p>
    <p>Pokřtěným mladým členům sboru je v přiměřeném věku určena konfirmační katecheze, která má rozšířit jejich znalost obsahů křesťanské víry i života a dějin církve, a tak hlouběji zakotvit a upevnit jejich víru. Konfirmační příprava je završena konfirmací.“ (Článek 2., bod 4.-6.)</p>

</div>

<div class="krestodkazy">
    <h2>Odkazy:</h2>
    <ul>
        <li><a href="https://cs.wikipedia.org/wiki/Spole%C4%8Denstv%C3%AD_evangelick%C3%BDch_c%C3%ADrkv%C3%AD_v_Evrop%C4%9B" target="_blank">Společenství evangelických církví v Evropě</a> (Leuenberská konkordie): oddíl <a href="https://www.evangnet.cz/texty:leuenberska_konkordie_krest" target="_blank">Křest v učení a praxi</a></li>
        <li><a href="https://www.getsemany.cz/node/1590" target="_blank">Dohody o křtu</a>: zpráva o dohodě s katolíky (1994)</li>
        <li><a href="https://www.evangnet.cz/texty:" target="_blank">Vyznání a základní křesťanské texty</a>: texty klíčové pro křesťanství obecně i specificky pro evangelickou tradici</li>
        <li><a href="https://www.evangnet.cz/cce_pruvodce:obsah" target="_blank">Průvodce Českobratrskou církví evangelickou</a> </li>
    </ul>
</div>

<img src="img/galleria/EKkrest1.jpg" class="img-fluid d-block mx-auto animated fadeInUp" alt="Bratr Firbas při křtu">

</section>


            </div>
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
        </section>
        <footer class="content">
            <div class="footer">
	    <div class="container">
                <div class="footermain d-flex flex-column flex-md-row">
                    <div class="footermenu pl-xl-4 col-lg-3">
                        <h3 class="mb-1">Menu</h3>
                        <ul class="">
                            <li><a href="uvod">Domů</a></li>
                            <li><a href="program">Program</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Služba </a>
				<ul class="dropdown-menu">
				    <li><a class="dropdown-item" href="krest">Přijetí do sboru a křest</a></li>
				    <li><a class="dropdown-item" href="verejnost">Doprovázení a služba pro veřejnost</a></li>
				    <li><a class="dropdown-item" href="pohreb">Pohřeb</a></li>
				    <li><a class="dropdown-item" href="svatba">Svatba</a></li>
				</ul>
			    </li>
                             <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Přečtěte si </a>
				<ul class="dropdown-menu">
				    <li><a class="dropdown-item" href="kazani">Kázání</a></li>
				    <li><a class="dropdown-item" href="sborovedopisy">Sborové dopisy</a></li>
				    <li><a class="dropdown-item" href="historie">Historie sboru</a></li>
				    <li><a class="dropdown-item" href="odkazy">Odkazy</a></li>
				</ul>
			    </li>
                            <li><a href="galerie" class="">Galerie</a></li>
                            <li><a href="kontakt" class="">Kontakt</a></li>
                        </ul>
                    </div>
                    <div class="footeradr pl-1 col-xl-3 col-lg-4">
                        <h3 class="mb-1">Kontakt a adresa</h3>
                        <i class="fas fa-phone fa-rotate-90"></i><a class="" href="tel:420281922216"> 281 922 216</a>
			<p><i class="far fa-envelope"></i><b class="mb-md-2">horni-pocernice@evangnet.cz</b></p>
                        <p class="mb-1">Třebešovská 2101/46</p>
                        <p class="mb-1">Praha 20</p>
                        <p class="">19300</p>
                        
                    </div>
                    <div class="footermap mx-auto d-block col-xl-6 col-lg-5 align-self-md-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d226.14251887296518!2d14.615525722671741!3d50.11416788953359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470bf293f4bcdbc7%3A0xd119cef3a0a5a576!2zRmFybsOtIHNib3IgxIxlc2tvYnJhdHJza8OpIGPDrXJrdmUgZXZhbmdlbGlja8OpIHYgUHJhemUgOSAtIEhvcm7DrSBQb8SNZXJuaWNl!5e0!3m2!1sen!2scz!4v1535993836195" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                
                <div class="podminky">
                    <div class="podminkybutton align-items-center">
                        Informace o zpracování osobních údajů <i class='fas fa-caret-down'></i>                    </div>
                    <div class="podminkytext">
                        <p>Farní sbor Českobratrské církve evangelické v Praze - Horních Počernicích, IČO: 64937127 se sídlem: Třebešovská 2101/46, 19300 Praha - Horní Počernice (dále také jen „správce“), tímto prohlašuje, že ve smyslu nařízení Evropského parlamentu a Rady (EU) 2016/679 o ochraně fyzických osob v souvislosti se zpracováním osobních údajů a volném pohybu těchto údajů a o zrušení směrnice 95/46/ES (dále jen „GDPR“) zpracovává osobní údaje subjektů údajů pro svou činnost, a je tedy správcem osobních údajů (tj. osobou, která určuje způsoby a účely zpracování osobních údajů).</p>
                        <h5>Zpracování osobních údajů</h5>
                        <p>Sbor zpracovává osobní údaje zejména v následujících oblastech:</p>
                        <ul>
                            <li>agenda související se správou a chodem sboru,</li>
                            <li>agenda související s přijímáním svátosti křtu,</li>
                            <li>personalistická agenda,</li>
                            <li>správa majetku a souvisejících smluvních poměrů,</li>
                            <li>pořádání přednášek, školení, kurzů a dalších akcí pro veřejnost,</li>
                            <li>pořádání dobročinných sbírek.</li>
                        </ul>
                        <p>Pro zpracování osobních údajů svědčí správci tituly plnění zákonné povinnosti, plnění smlouvy, oprávněného zájmu správce nebo třetí osoby nebo souhlasu se zpracováním osobních údajů uděleného subjektem údajů. Při zpracování osobních údajů se správce řídí zákonem stanovenými lhůtami a lhůtami stanovenými po pečlivém zvážení ve vnitřním předpise tak, aby nedocházelo k porušování práv subjektů údajů.</p>
                        <p>V rámci zpracování osobních údajů je v některých případech nutné předat osobní údaje jiné osobě. Sbor se snaží předávání minimalizovat, v některých případech je ale nezbytné pro splnění povinností sboru ze zákona, smlouvy nebo v rámci činnosti církve. Ve všech případech, kdy správce předává osobní údaje jiné osobě, dbá sbor o zajištění maximální ochrany práv subjektů údajů.</p>
                        <h5>Pověřenec pro ochranu osobních údajů</h5>
                        <p>Synodní rada Českobratrské církve evangelické jmenovala pověřence pro ochranu osobních údajů v Českobratrské církvi evangelické. Naším pověřencem je JUDr. Adam Csukás, právník Ústřední církevní kanceláře. V případě jakýchkoli přání nebo dotazů jej můžete kontaktovat poštou na adrese Českobratrská církev evangelická, Jungmannova 22/9, P. O. BOX 466, 111 21 Praha 1, telefonicky na čísle 224 999 220 či prostřednictvím e-mailu na adrese pravnik@e-cirkev.cz.</p>
                        <p>Náš pověřenec pro ochranu osobních údajů je odborníkem s přehledem o činnosti sboru a zpracování osobních údajů, ke kterému při něm dochází. Je připraven reagovat na Vaše zprávy, přání a stížnosti tak, aby bylo na Vaší straně dosaženo co možná nejvyšší spokojenosti.</p>
                        <h5>Práva subjektu údajů</h5>
                        <p>Aby byla zajištěna možnost subjektů údajů rozhodovat v co možná nejširší míře o zpracování jejich osobních údajů, stanovuje GDPR řadu práv, která lze vůči správci údajů uplatnit. V případě, že se rozhodnete některé ze svých práv uplatnit, obraťte se buď na správce, nebo přímo na našeho pověřence pro ochranu osobních údajů, čímž celý proces vyřizování žádosti urychlíte.</p>
                        <p>Vaším základním právem je požadovat sdělení, zda správce zpracovává Vaše osobní údaje. Pokud je zpracováváme, máte právo požadovat jednu kopii všech dokumentů s osobními údaji, které o Vás zpracováváme. V případě, že zjistíte, že zpracovávané údaje nejsou přesné, máte právo požadovat opravu osobních údajů. Pokud dojdete k názoru, že Vaše osobní údaje nezpracováváme po právu, můžete uplatnit právo na výmaz osobních údajů. Pokud budete toho názoru, že jsme Vaši žádost nevyřídili tak, jak jsme měli, máte právo obrátit se na Úřad pro ochranu osobních údajů se stížností. Je naším zájmem zpracovávat osobní údaje zákonně a řádně a nepoškozovat Vaše práva. Pokud máte pochybnosti, že se nám to daří, budeme rádi, když nás na to upozorníte.</p>
Mgr. Petr Firbas, farář sboru, RNDr. Martin Hrubeš, kurátor sboru</div>
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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="main.js"></script>
    </body>
</html>

