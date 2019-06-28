<?php

class DB 
{
    // proměná pro vytvořené spojení s databází
    protected static $db;
    
    // funkce pro vytvoření spojení s databází
    static function pripojDatabazi($nazevDatabaze)
    {
        //DB::$db = mysqli_connect("10.10.2.1", "hornipocer", "kanoer873ho", $nazevDatabaze);
        DB::$db = mysqli_connect("localhost", "root", "", $nazevDatabaze);
        mysqli_set_charset(DB::$db, "utf8");
    }
    
    // funkce provede sql dotaz a zkontroluje zdali dopadl ok
    // pokud je sql nevalidni tak vyhodí vyjímku
    // pokud je sql ok a jde o SELECT tak vrátí výsledek jako řádek
    // pokud je sql OK a nic nevrací tak ani funkce nic nevrací 
    
    static function provedSql($sql)
    {
        $vysledek = mysqli_query(DB::$db, $sql);
        // pokud je sql nevalidí nebo nastala chyba
        
        if ($vysledek === false)
        {
            // získáme si z databáze chybovou hlášsku
            $chyba = mysqli_error(DB::$db);
            throw new Exception("Spatny sql ($sql). Chyba: $chyba");
        }
        else if ($vysledek === true)
        {
            // byl proveden validní dotaz, který ale nic nevrací, jako např UPDATE, CREATE, DELETE, ALTER etc,
            // vše je ok ale neni potřeba nic vracet
            
        }
        else 
        {
            // byl proveden validní dotaz který něco vrací
            // vrátíme tedy výsledek jako pole řádek
            $radky = array();
            while ( ($radka = mysqli_fetch_assoc($vysledek)) != null)
            {
                // nakrmíme do pole řádku po řádce
                $radky[] = $radka;
            }
            return $radky;
        }
    }
    
    // funkce pro převod libovolné hodnoty na sql reprezentaci
    // NULL převede na text NULL
    // číslo převede na text
    // text oescapuje a obalí apostrofama
    
    static function prevodHodnoty($hodnota)
    {
        if(is_null($hodnota))
        {
            return "NULL";
        }
        else if (is_string($hodnota))
        {
            // text vrátíme obalený apostrofy a escapovaný
            $hodnota = mysqli_real_escape_string(DB::$db, $hodnota);
            return "'$hodnota'";
        }
        else if (is_numeric($hodnota))
        {
            // číslo necháme jak je, jen ho převedeme na text
            return "$hodnota";
        }
        else
        {
            // přišel nám nesmysl
            throw new Exception("Neznamy typ pro prevod na sql");
        }
    }
}
