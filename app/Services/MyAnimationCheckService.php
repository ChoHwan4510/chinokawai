<?php
namespace App\Services;

use App\Models\ProejctMyAnimationCheckModel;

class MyAnimationCheckService{
    private $proejctMyAnimationCheck = null;

    public function __construct(){
        $this->proejctMyAnimationCheck = new ProejctMyAnimationCheckModel();
    }

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

    public function getMyanimationList(){
        return "아아아아앜";
    }
}
