<?php
namespace app\common\controller;

use think\Controller;
use app\common\model\Msg as Model;

class Excel extends Controller
{
  public function export($fileData = ['content' => "2sasd"])
  {
    $before = file_get_contents("static/index/custom/txt/before.txt");
    $after = file_get_contents("static/index/custom/txt/after.txt");
    $content = $fileData['content'];
    $res = $before . $content . $after;

    $ua = $_SERVER["HTTP_USER_AGENT"];    
    $filename = "数据.doc";    
    $encoded_filename = urlencode($filename);    
    $encoded_filename = str_replace("+", "%20", $encoded_filename);

    header("Content-Type: application/octet-stream");      
    if (preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT']) ) {      
        header('Content-Disposition:  attachment; filename="' . $encoded_filename . '"');      
    } elseif (preg_match("/Firefox/", $_SERVER['HTTP_USER_AGENT'])) {      
        header('Content-Disposition: attachment; filename*="utf8' .  $filename . '"');      
    } else {      
        header('Content-Disposition: attachment; filename="' .  $filename . '"');      
    }  
    echo $res;
  }
}