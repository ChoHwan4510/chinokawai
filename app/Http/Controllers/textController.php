<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TestController extends Controller{
    public function crawler(){

        $url = "https://ko.wikipedia.org/wiki/%EB%B6%84%EB%A5%98:%ED%8C%90%ED%83%80%EC%A7%80_%EC%95%A0%EB%8B%88%EB%A9%94%EC%9D%B4%EC%85%98";
        $html = file_get_contents($url);        
        
        $crawler = new Crawler($html);
        $crawler_data = $crawler->filter('.mw-category-group > ul > li > a')->each(function(Crawler $node, $i){
            return $node->text();           
        });

        $title_array = array();
        $preg_special_characters = "/[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/";
        $preg_english = "/[a-zA-Z]/";
        foreach($crawler_data as $v){
            if(!preg_match_all($preg_english,$v)){

                $v = preg_replace($preg_special_characters,"",$v);
                $title_array[$v] = $this->changeHangul($v); 

                DB::insert('insert into quiz_word_game_word (word, consonant, genre, create_date, update_date) values (?, ?, ?, ?, ?)', [$v, $this->changeHangul($v),'fantasy',now(),now()]);
                           
            }
        }
        dd($title_array);
    }

    public function utf8_strlen($str) { return mb_strlen($str, 'UTF-8'); }
    public function utf8_charAt($str, $num) { return mb_substr($str, $num, 1, 'UTF-8'); }
    function utf8_ord($c) {
        $len = strlen($c);
        if($len <= 0) return false;
        $h = ord($c[0]);
        if ($h <= 0x7F) return $h;
        if ($h < 0xC2) return false;
        if ($h <= 0xDF && $len>1) return ($h & 0x1F) <<  6 | (ord($c[1]) & 0x3F);
        if ($h <= 0xEF && $len>2) return ($h & 0x0F) << 12 | (ord($c[1]) & 0x3F) <<  6 | (ord($c[2]) & 0x3F);		  
        if ($h <= 0xF4 && $len>3) return ($h & 0x0F) << 18 | (ord($c[1]) & 0x3F) << 12 | (ord($c[2]) & 0x3F) << 6 | (ord($c[3]) & 0x3F);
        return false;
    } 
    public function changeHangul($str, $accept_nonhangul=false){                         
        $cho = ['ㄱ','ㄲ','ㄴ','ㄷ','ㄸ','ㄹ','ㅁ','ㅂ','ㅃ','ㅅ','ㅆ','ㅇ','ㅈ','ㅉ','ㅊ','ㅋ','ㅌ','ㅍ','ㅎ',' ','1','2','3','4','5','6','7','8','9','0'];
        $result = '';
        for ($i=0; $i<$this->utf8_strlen($str); $i++) {
            $c = $this->utf8_charAt($str, $i);
            $code = $this->utf8_ord($c) - 44032;
            if ($code > -1 && $code < 11172) {
                $cho_idx = $code / 588;	  
                $result .= $cho[$cho_idx];
                continue;
            }
            if( $accept_nonhangul || in_array($c, $cho) ) {
                $result .= $c;
                continue;
            }
        }
        return $result;
    }
}