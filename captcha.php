<?php
session_start();//开启一个服务端会话
header("Cache-Control: no-cache, must-revalidate");//不缓存
header("Content-Type:image/png");//返回图片类型
$Image= imagecreatetruecolor(90, 80);//画布大小 宽90 高80
$color = imagecolorallocate($Image, 255, 255, 255);//
imagefill($Image, 0, 0, $color);
$font_msyh = "msyh.ttf";//微软雅黑 需要下载并上传到目录内
$black=ImageColorAllocate($Image, 0, 0, 0);
$red=ImageColorAllocate($Image, 255, 0, 0);
$green=ImageColorAllocate($Image, 0, 255, 0);
$blue=ImageColorAllocate($Image, 0, 0, 255);
$colorset=array($black,$red,$green,$blue);
$dataset=generate();
imagettftext($Image,15,0,20,30,$colorset[rand(0,3)],$font_msyh,$dataset[0]); //a11
imagettftext($Image,15,0,20,70,$colorset[rand(0,3)],$font_msyh,$dataset[1]);//a12
imagettftext($Image,15,0,60,30,$colorset[rand(0,3)],$font_msyh,$dataset[2]); //a21
imagettftext($Image,15,0,60,70,$colorset[rand(0,3)],$font_msyh,$dataset[3]);//a22
ImageLine($Image,5,10,5,70,$black) ;
ImageLine($Image,85,10,85,70,$black) ;
$answer=$dataset[0]*$dataset[3]-$dataset[1]*$dataset[2];
$_SESSION['authcode'] = $answer;
//imagettftext($Image,10,0,50,50,$black,$font_msyh,$answer);//调试答案正式使用请注释掉本行
imagepng($Image);//显示出图片
function generate(  )
{
    for ($i = 0; $i < 4; $i++) {
        $gen[$i]= rand(0,9);
    }
    return $gen;
}