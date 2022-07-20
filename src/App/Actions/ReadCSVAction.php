<?php
namespace App\Actions;
class ReadCSVAction
{
    public function read($name)
    {
        $arr = [];
        $fp = fopen($name,'r') or die("can't open file");
        while($csv_line = fgetcsv($fp,1024)) {
            for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                $arr[] = $csv_line[$i];
            }
        }
        fclose($fp) or die("can't close file");
        return $arr;
    }
}