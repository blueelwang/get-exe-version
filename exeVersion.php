<?php
/**
 * 获取exe的版本号, 这个类可以检测exe 和 dll 文件
 * @author BlueelWang
 * @date 2014.07.21
 */
class exeVersion{
	
	public static function getExeVersion($filename){
		$fileversion='';
		//$fpFile = @fopen($filename, "rb");
		//$strFileContent = @fread($fpFile, filesize($filename));
		$strFileContent = file_get_contents($filename);
		//fclose($fpFile);
		if($strFileContent){
			$strTagBefore = 'F\0i\0l\0e\0V\0e\0r\0s\0i\0o\0n\0\0\0\0\0';
			$strTagAfter = '\0\0';
			if (preg_match("/$strTagBefore(.*?)$strTagAfter/", $strFileContent,$arrMatches)){
				if(count($arrMatches)==2) $fileversion=str_replace("\0",'',$arrMatches[1]);
			}
		}
		return $fileversion;
	}
	
}
