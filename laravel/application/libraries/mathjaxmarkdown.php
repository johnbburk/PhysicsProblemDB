<?php
class mathjaxmarkdown {
	public static function mjmd($text)
	{
		$tmp=preg_split('/(\\\\[\(\[].*?\\\\[\)\]])/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
		$replacestring="MaThJaX EqUaTiOn";
		$number=floor(count($tmp)/2);
		$corrected='';
		$eqns=array();
		for ($i=0; $i<$number; $i++) {
			$corrected.=$tmp[$i*2];
			$alt=$tmp[$i*2+1];
			$eqns[]=$alt;
			$corrected.=$replacestring;
			};
		$corrected.=$tmp[2*$number]; 
		$intermediate=Sparkdown\Markdown($corrected);
		$tmp=preg_split('/('.$replacestring.')/', $intermediate, -1, PREG_SPLIT_DELIM_CAPTURE);
		$corrected='';
		for ($i=0; $i<$number; $i++) {
			$corrected.=$tmp[$i*2];
			$corrected.=$eqns[$i];
			};
		$corrected.=$tmp[2*$number];
		return $corrected;
	}
}
