<div class="sectiongalerie">
    <h1>Galerie</h1>
    <?php 
    $galerie = array();
    $rokGalerie = array();
    $galerieRoky = array();
    $path = 'img/galleria'; // . $name[0];
    $obsahGalerie = scandir($path);
    
foreach ($obsahGalerie as $imgFolder) 
{
    if ($imgFolder === '.' or $imgFolder === '..')
        { 
            continue;
        }
    if (is_dir($path . '/' . $imgFolder)) 
        {
        $galerie[] =  $imgFolder;
        $rokGalerie[] = substr($imgFolder, 0, 4);
        }
}
$rokGalerieSuma = array_reverse(array_unique($rokGalerie));

        
foreach ($rokGalerieSuma as $rokGalerieNadpis)
            {
            echo "<div class='galerieblok'>";
            echo "<div class='galnadpis' data-blok='".$rokGalerieNadpis."'><p id='".$rokGalerieNadpis."head' class='d-flex align-items-center justify-content-center'><span>".$rokGalerieNadpis." </span> <i class='fas fa-caret-down'></i></p></div>";
            echo "<div class='galblok' id='".$rokGalerieNadpis."'><ul>";
                foreach ($galerie as $galerieFolder)
                {
                    if(substr($galerieFolder, 0, 4) != $rokGalerieNadpis)
                    {
                        continue;
                    }
                    else
                    {
                        $dir = "img/galleria/".$galerieFolder;
                        $fotos = glob("$dir/*.{jpg,png,bmp,JPG,JPEG,jpeg}", GLOB_BRACE);
                        $fotothumb = array_shift($fotos);
                        echo "<li class='row m-auto galrow'>";
                        echo "<div class='col-5 col-md-4 thumbnail'><a href='galeriesingle.php?galerie=".$galerieFolder."' target='_blank'><img class='img-fluid' src='".$fotothumb."'</a></div>";
                        echo "<div class='col-7 col-md-8 galodkaz d-flex align-items-center'><a href='galeriesingle.php?galerie=".$galerieFolder."' target='_blank' >".upravaNazvuSlozky($galerieFolder)."</a></div></li>";
                    }    
                }
                echo "<a href='#".$rokGalerieNadpis."' class='caretup' data-blok='".$rokGalerieNadpis."'><i class='fas fa-caret-up'></i></a>";
                echo "</ul></div>";
                echo "</div>";
            }

?>
    <div class='galerieblok'>
    <div class='galnadpis' data-blok='archiv'><p id='archivhead' class='d-flex align-items-center justify-content-center'><span>Archiv </span><i class='fas fa-caret-down'></i></p></div>
    <div class='galblok' id='archiv'><ul>
            <?php
                    $dir = "img/galleria";
                    $fotos = glob("$dir/*.{jpg,png,bmp,JPG,JPEG,jpeg}", GLOB_BRACE);
                    $fotothumb = array_shift($fotos);
                    echo "<li class='row m-auto'>";
                    echo "<div class='col-5 col-md-4 thumbnail'><a href='galeriesingle.php?galerie=archiv' target='_blank' ><img class='img-fluid' src='".$fotothumb."'</a></div>";
                    echo "<div class='col-7 col-md-8 galodkaz d-flex align-items-center'><a href='galeriesingle.php?galerie=archiv' target='_blank' >Archiv nezařazených fotek</a></div></li>";
                
                echo "<a href='#archiv' class='caretup' data-blok='archiv'><i class='fas fa-caret-up'></i></a>";
                echo "</ul></div>";
                echo "</div>";
                
                ?>
<!--    <div class="galleria">
        <a href="img/galleria/1JPechar20101226.JPG"><img src="img/galleria/1JPechar20101226.JPG" data-big="img/galleria/1JPechar20101226.JPG" data-title="My title" data-description="My description"></a>
        <a href="img/galleria/2JPechar20101226.JPG"><img src="img/galleria/2JPechar20101226.JPG" data-big="img/galleria/2JPechar20101226.JPG" data-title="My title" data-description="My description"></a>
        <a href="img/galleria/08Divadlo01.JPG"><img src="img/galleria/08Divadlo01.JPG" data-big="img/galleria/08Divadlo01.JPG" data-title="My title" data-description="My description"></a>
        <a href="img/galleria/08Divadlo02.jpg"><img src="img/galleria/08Divadlo02.jpg" data-big="img/galleria/08Divadlo02.jpg" data-title="My title" data-description="My description"></a>
    </div>-->
</div>
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


