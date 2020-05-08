<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendError($message,$data = []){

        $data['status'] = 0;

        $this->sendSuccess($data,$message);

    }

    public function sendSuccess($data = [],$message = '')
    {
        if(is_string($data))
        {
            response()->json([
                'message'=>$data,
                'status'=>true
            ])->send();
            die;
        }

        if(!isset($data['status'])) $data['status'] = 1;

        if($message)
            $data['message'] = $message;

        response()->json($data)->send();
        die;
    }


    public function setActiveMenu($item)
    {
        set_active_menu($item);
    }

    public function currentUser()
    {
        return Auth::user();
    }

    protected function filterLang(&$query){

        if(!setting_item('site_enable_multi_lang') or !setting_item('site_locale')) return false;

        if($lang = request()->route('locale'))
        {
            if($lang != setting_item('site_locale'))
                $query->where('lang',$lang);
            else{
                $query->where(function ($query){
                    $query->whereRAW("IFNULL(lang,'') = '' ")->orWhere('lang','=',setting_item('site_locale'));
                });
            }
        }else{
            $query->where(function ($query){
                $query->whereRAW("IFNULL(lang,'') = '' ")->orWhere('lang','=',setting_item('site_locale'));
            });
        }
    }

    protected function registerJs($file,$inFooter = true, $pos = 10,$version = false){
        Assets::registerJs($file,$inFooter,$pos,$version);
    }
    protected function registerCss($file,$inFooter = false, $pos = 10,$version = false){
        Assets::registerCss($file,$inFooter,$pos,$version);
    }
}
