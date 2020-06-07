<?php
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo = array( "Database"=>"WebDashboard", "UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
   echo "";

}else{
     echo "Connection could not be established.<br />";
     echo
     die( print_r( sqlsrv_errors(), true));
}
ini_set('max_execution_time', 0);

function RemoveXSS($val) {
	$val = str_replace(",","(++)",$val);
           $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
           $val = str_replace("(++)",",",$val);
           $search = 'abcdefghijklmnopqrstuvwxyz';
           $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
           $search .= '1234567890!@#$%^&*()';
           $search .= '~`";:?+/={}[]-_|\'\\';
           for ($i = 0; $i < strlen($search); $i++) {
              $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
              $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
           }

           $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', '_style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
           $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
           $ra = array_merge($ra1, $ra2);

           $found = true;
           while ($found == true) {
              $val_before = $val;
              for ($i = 0; $i < sizeof($ra); $i++) {
                 $pattern = '/';
                 for ($j = 0; $j < strlen($ra[$i]); $j++) {
                    if ($j > 0) {
                       $pattern .= '(';
                       $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                       $pattern .= '|';
                       $pattern .= '|(&#0{0,8}([9|10|13]);)';
                       $pattern .= ')*';
                    }
                    $pattern .= $ra[$i][$j];
                 }
                 $pattern .= '/i';
                 $replacement = substr($ra[$i], 0, 2).'<sildim>'.substr($ra[$i], 2);
                 $val = preg_replace($pattern, $replacement, $val);
                 if ($val_before == $val) {
                    $found = false;
                 }
              }
           }
return $val;
} 


?>