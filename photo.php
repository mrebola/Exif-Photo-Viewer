<!--

 

 .S_SsS_S.    .S_sSSs      sSSs   .S_SSSs      sSSs_sSSs    S.       .S_SSSs  
.SS~S*S~SS.  .SS~YS%%b    d%%SP  .SS~SSSSS    d%%SP~YS%%b   SS.     .SS~SSSSS 
S%S `Y' S%S  S%S   `S%b  d%S'    S%S   SSSS  d%S'     `S%b  S%S     S%S   SSSS
S%S     S%S  S%S    S%S  S%S     S%S    S%S  S%S       S%S  S%S     S%S    S%S
S%S     S%S  S%S    d*S  S&S     S%S SSSS%P  S&S       S&S  S&S     S%S SSSS%S
S&S     S&S  S&S   .S*S  S&S_Ss  S&S  SSSY   S&S       S&S  S&S     S&S  SSS%S
S&S     S&S  S&S_sdSSS   S&S~SP  S&S    S&S  S&S       S&S  S&S     S&S    S&S
S&S     S&S  S&S~YSY%b   S&S     S&S    S&S  S&S       S&S  S&S     S&S    S&S
S*S     S*S  S*S   `S%b  S*b     S*S    S&S  S*b       d*S  S*b     S*S    S&S
S*S     S*S  S*S    S%S  S*S.    S*S    S*S  S*S.     .S*S  S*S.    S*S    S*S
S*S     S*S  S*S    S&S   SSSbs  S*S SSSSP    SSSbs_sdSSS    SSSbs  S*S    S*S
SSS     S*S  S*S    SSS    YSSP  S*S  SSY      YSSP~YSSY      YSSP  SSS    S*S
        SP   SP                  SP                                        SP 
        Y    Y                   Y                                         Y  
                                                                              

                                                                          
-->
<h1>Standard Data</h1>
<?php
$exif = exif_read_data('1.jpg', 'IFD0');
echo $exif===false ? "No header data found.<br />\n" : "Image contains headers<br /><br />";

$exif = exif_read_data('1.jpg', 0, true);
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        echo "$key.$name: $val<br />\n";
    }
}
?>
<br><br>
<h1>Print All Information</h1>
<?php
function arrayPrettyPrint($exif, $level) {
    foreach($exif as $k => $v) {
        for($i = 0; $i < $level; $i++)
            echo("&nbsp;");  
        if(!is_array($v))
            echo("<b>".$k ."</b> => " . $v . "<br/>");
        else {
            echo("<br><b>".$k . "</b> => <br/>");
            arrayPrettyPrint($v, $level+1);
        }
    }
}
arrayPrettyPrint($exif, 0);
?>
