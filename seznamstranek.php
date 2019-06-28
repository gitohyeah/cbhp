<?php

require 'libdb.php';

DB::pripojDatabazi("cbhp");

class Stranka
{

    protected $menu;
    protected $titulek;
    protected $id;

    function __construct($id, $menu, $titulek)
    {
        $this->id = $id;
        $this->menu = $menu;
        $this->titulek = $titulek;
    }

    function getTitulek()
    {
        return $this->titulek;
    }

    function getMenu()
    {
        return $this->menu;
    }

    function getId()
    {
        return $this->id;
    }

    function getObsah()
    {
        // pokud stránka nemá ID tak vrátíme prázdný obsah (nastane při přidávání nové stránky
        if ($this->id == '')
        {
            return "";
        }
        // return file_get_contents("{$this->id}.html");
        $radky = DB::provedSql("SELECT obsah FROM stranka WHERE id = ".DB::prevodHodnoty($this->id)); 
        return $radky[0]['obsah'];
    }

    function setObsah($obsah)
    {
        // file_put_contents("{$this->id}.html", $obsah);
        DB::provedSql("UPDATE stranka SET obsah = "
                .DB::prevodHodnoty($obsah)
                ."WHERE id = ".DB::prevodHodnoty($this->id)
                );
    }
    
    function setId($id)
    {
        $this->id = $id;
    }
    function setMenu($menu)
    {
        $this->menu = $menu;
    }
    function setTitulek($titulek)
    {
        $this->titulek = $titulek;
    }
    function ulozit($puvodniId)
    {
        // pokud jde o přidávání stránky provedeme INSERT, při úpravě existující stránky provedeme UPDATE
        
        if ($puvodniId == "")
        {
            // zjistíme nové číslo pro poradi tak aby to bylo maximum z toho co tam je
            // a to co tam je navýšíme o jedna
            $radkyPoradi = DB::provedSql("SELECT MAX(poradi)+1 AS maxPoradi FROM stranka");
            $max = $radkyPoradi[0]["maxPoradi"];
            
            DB::provedSql("INSERT stranka SET
            id = ".DB::prevodHodnoty($this->id).",
            menu = ".DB::prevodHodnoty($this->menu).",
            titulek = ".DB::prevodHodnoty($this->titulek).",
            poradi = ".DB::prevodHodnoty($max) 
            ); 
        }
        else
        {
            DB::provedSql("UPDATE stranka SET
            id = ".DB::prevodHodnoty($this->id).",
            menu = ".DB::prevodHodnoty($this->menu).",
            titulek = ".DB::prevodHodnoty($this->titulek)."
            WHERE id = ".DB::prevodHodnoty($puvodniId) 
            ); 
        }
        
        
    }
    
    function smazat()
    {
        DB::provedSql("DELETE FROM stranka WHERE id = ".DB::prevodHodnoty($this->id) );
    }
    
    static function nastavPoradi($poradi)
    {
        foreach ($poradi as $index => $stranka)
        {
            DB::provedSql("UPDATE stranka SET poradi = $index WHERE id = ".DB::prevodHodnoty($stranka)
            );
        }
    }

}

$seznamStranek = array();

// začneme s prázdným polem a načteme seznam stránek z databáze

$stranky = DB::provedSql("SELECT * FROM stranka ORDER BY poradi");
//var_dump($stranky);
foreach ($stranky as $stranka)
{
    $idStranky = $stranka['id'];
    $seznamStranek[$idStranky] = new Stranka ($idStranky, $stranka['menu'], $stranka['titulek']);
}

// gallerie
   function upravaNazvuSlozky($nazevSlozky)
{
    $nazevSlozky = substr($nazevSlozky, 5);
    $nazevSlozky = str_replace("_", " ", $nazevSlozky); 
    $nazevSlozky = mb_convert_case($nazevSlozky, MB_CASE_TITLE);
    return $nazevSlozky;
}
