<!-- •ファイル word_list.txtには、半角スペース区切りで複数の単語が並べられています -->
<!-- •ファイルから単語を読み取って、アルファベット昇順に並び替えてブラウザの画面に表示してください -->
<!-- •複数回同じ単語が出てくる場合は、重複しないように取り除いてください -->
<?php

function get_words($file_name) {
    $file_handler = fopen($file_name, "r");
    $line = fgets($file_handler);
    fclose($file_handler);
    $arr = explode(" ", $line);
    sort($arr);
    $unique = array_unique($arr);
    return $unique;
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
    $arr = get_words($file_name);
    $str = make_element_order_list($arr);
    output_html($str);
}

main();

?>
