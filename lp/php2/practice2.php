<?php
$agent = getenv("HTTP_USER_AGENT");
if(strpos($agent,"iPhone")==true || strpos($agent,"Android")==true){
echo "スマホ用のサイトです";
}else{
echo "PC用のサイトです";
}