<!-- ファイル word_list.txtには、半角スペース区切りで複数の単語が並べられています -->
<!-- ファイルから単語を読み取って、アルファベット昇順に並び替えてブラウザの画面に表示してください -->
<!-- 同じ単語が複数出てくる場合は、重複して表示させて構いません -->
<?php

function get_word($file_name) {
    $file_handler = fopen($file_name, "r");
    $arr = array();
    while ( true ) {
        $line = fgets($file_handler);
        if ( !$line ) { break; }
        $arr = explode(" ", $line);
        sort($arr);
    }
    fclose($file_handler);
    return $arr;
}

function make_element_order_list($arr) {
    $str = "<ol>";
    foreach ( $arr as $val ) {
        $str .= "<li>" . $val . "</li>";
    }
    $str .= "</ol>";
    return $str;
}

function output_html($str) {
    echo $str;
}

function main() {
    $file_name = "word_list.txt";
    $arr = get_word($file_name);
    $str = make_element_order_list($arr);
    output_html($str);
}

main();

?>
