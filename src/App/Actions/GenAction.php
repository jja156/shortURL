<?php
namespace App\Actions;
class GenAction
{
    private array $dictionary = ['Q','q','W','w','R','r','t','I','i','L','l','S','s','N','n','F','f','G','g','Z','z', 'J', 'j', 'k'];

    public function genShortUrls($num): array
    {
        $arr = [];
        for ($i = 0; $i <= $num; $i++){
            $shortKey = array_rand($this->dictionary, 3);
            $shortStr = '';
            foreach ($shortKey as $value){
                $shortStr .= $this->dictionary[$value];
            }
            $str = rand(10, 99).$shortStr.rand(0, 9);
            $arr[] = $str;
        }
        return $arr;
    }
}