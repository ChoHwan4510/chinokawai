<?php
namespace App\Services;

use App\Models\ProejctMyAnimationCheckModel;
use Symfony\Component\DomCrawler\Crawler;

class MyAnimationCheckService{
    private $proejctMyAnimationCheck = null;

    public function __construct(){
        $this->proejctMyAnimationCheck = new ProejctMyAnimationCheckModel();
    }

    public function siteAnimationCheck($aniSearchUrl = '', $aniCheckVal = ''){
        return $this->siteCheckCrawler($aniSearchUrl, $aniCheckVal);
    }

    /**
     * 애니메이션 INSERT
     * @return bool|int
     */
    public function insertMyAnimation(){
        $input_test = [
            'mem_no' => 1,
            'animation_name' => '오빠는끝',
            'update_last_episode' => 0,
            'mem_last_episode' => 0,
            'flag_update' => 0,
            'reg_dt' => date('Y-m-d H:i:s'),
            'update_dt' => date('Y-m-d H:i:s'),
        ];

        $result = $this->proejctMyAnimationCheck->insert_proejct_my_animation_check($input_test);

        return $result;
    }

    public function siteCheckCrawler($url = '', $search_animation = ''){
        if($url == '') return false;

        $checkUrl = $url.$search_animation;
        $html = file_get_contents($checkUrl);

        $crawler = new Crawler($html);
        $crawler_data = $crawler->filter('.titled')->each(function(Crawler $node, $i){
            return $node->text();
        });

        return $crawler_data;
    }

    public function getMyanimationList(){
        return "아아아아앜";
    }
}
