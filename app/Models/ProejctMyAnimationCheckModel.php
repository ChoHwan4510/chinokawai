<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProejctMyAnimationCheckModel extends Model{
    protected $table = 'proejct_my_animation_check';

    public function insert_proejct_my_animation_check($input){
        if(count($input) <= 0){
            return 0;
        }
        $result = DB::table($this->table)->insert($input);
    }
}
