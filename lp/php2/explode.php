<?php
$data = "1,apple,150,25";
$id = explode(',',$data);
echo <<< END
ID：$id[0]
名前：$id[1]
料金：$id[2]
個数：$id[3]
END;
