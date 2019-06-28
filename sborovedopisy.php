<?php

$SDList = array();
$files = glob('sdopis/*.pdf');
foreach ($files as $file) {
    $SDList[filemtime($file)] = $file;
}

ksort($SDList);
$SDPoslednichCtyricet =  array_slice($SDList, -40, 40, true);
$SDPoslednichCtyricet = array_reverse($SDPoslednichCtyricet, true);

function upravaNazvu($nazev)
{
    $sDopisName = str_replace("sdopis/","",$nazev);
    $sDopisName = str_replace(".pdf","",$sDopisName);
    $sDopisName = str_replace("_"," ",$sDopisName);
    return $sDopisName;
}

?>
<div class="sectiondopis">
    <h1>Sborový dopis</h1>
    
    <h2>Aktuální číslo:</h2>
    <?php
    
    $aktualniDopis = array_shift($SDPoslednichCtyricet);
    $fileSize = round(filesize($aktualniDopis) / 1024 / 1024, 1);
    echo "<a href='$aktualniDopis' class='aktualnidopis' target='_blank'>".upravaNazvu($aktualniDopis)."</a> <span> ( PDF - $fileSize MB )</span>";
    
    ?>
    <h3>Archiv:</h3>
        <div class="d-flex">
            <ul class="fa-ul mx-auto">
                <?php 
                foreach ($SDPoslednichCtyricet as $index => $sDopis)
                {
                    $fileSize = round(filesize($sDopis) / 1024 / 1024, 1);
                    echo "<li><span class='fa-li'><i class='fas fa-square' data-fa-transform='rotate-45'></i></span><a href='$sDopis' target='_blank'>".upravaNazvu($sDopis)."</a> ";
                    echo " <span> (PDF - $fileSize MB ) </span></li>";
                }
                ?>
            </ul>
        </div>
                <div class="acrobatodkaz d-flex flex-wrap justify-content-center">
                    <div class="col-sm-2 col-lg-1 col-3">
                        <a href="https://get.adobe.com/cz/reader/otherversions/" target="_blank"><img src="img/acrobat2.png" class="" alt="Acrobat Reader"></a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5 col-8 col-sm-6 align-self-center">
                    <a href="https://get.adobe.com/cz/reader/otherversions/" target="_blank">Pro čtení souborů PDF je třeba 
nainstalovat prohlížeč Acrobat Reader</a>
                    </div>
                </div>
</div>

