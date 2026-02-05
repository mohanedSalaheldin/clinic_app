<?php


 namespace App\Traits;
trait UploadFile{

private static $uploadDir = "public/uploads";
public static function UploadFile($file,?string $uploadfolder =null,$allawEX=["jpg","png","jpge"]){
  $filename = $file['name'];
  $exfile = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
  if(!in_array($exfile,$allawEX)){
    return null;
  }

  $realpath = realpath(__DIR__."/../../") ."/". self::$uploadDir;

    if(isset($uploadfolder) ){
        $pathfolder = $realpath."/".$uploadfolder;

    }else{
        $pathfolder = $realpath;
    }
    if(!is_dir($pathfolder)){
        mkdir($pathfolder,0775,true);
    }

    $fullpath = $pathfolder."/".$filename;
    if(move_uploaded_file($file["tmp_name"],$fullpath)){
        return  self::$uploadDir.$uploadfolder."/".$filename;
    }
    return null;
  
}

}