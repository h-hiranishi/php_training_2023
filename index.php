<?php

    // プログラムの開始位置
    output_main();


    // メイン関数
    function output_main() {
        // 表示用テンプレートの準備
        $filename = "tmpl/index.html";
        $file_handler = fopen($filename, "r");
        $src = fread($file_handler, filesize($filename));
        // 遷移先URLを持ったボタン要素を取得
        $buttons = search_dir();
        // テンプレートにデータを格納
        $src = str_replace("!buttons!", $buttons, $src);
        // 表示
        echo $src;
    }


    // ディレクトリを探索して対応するURLを持つボタン要素群を返却する関数
    function search_dir() {
        // url, ディレクトリの初期値を設定
        $root_url = "http://localhost:20080/php/teck_base_camp/lp";
        $dir = '.';
        return crawl_dir($root_url, $dir);
    }


    // 基準とするurlとディレクトリを受け取り、それより下に存在するディレクトリの探索を行う関数
    function crawl_dir($url, $dir) {
        // 現在のディレクトリにあるファイルを探索
        $buttons = get_url($url, $dir);
        // 現在のディレクトリにあるディレクトリを探して配列に格納
        $dir_list = glob("{$dir}/*", GLOB_ONLYDIR);
        // 新しく見つけたディレクトリを基準としてそれ以下のディレクトリを探索
        foreach ( $dir_list as $dir_name ) {
            $name = get_last_path($dir_name);
            if ( $name === "tmpl" || $name === "" )  { continue; }
            $buttons .= "<div>{$name}<br>";
            $buttons .= crawl_dir("{$url}/{$name}", "{$dir}/{$name}");
            $buttons .= '</div>';
        }
        return $buttons;
    }


    // 受け取ったディレクトリに存在するファイルに遷移するurlを持つボタン群を返却する関数
    function get_url($url, $dir) {
        // html, phpを拡張子に持つファイルを配列に格納
        $html_files = glob("{$dir}/{*.html}", GLOB_BRACE);
        $php_files = glob("{$dir}/{*.php}", GLOB_BRACE);
        $file_list = [...$html_files, ...$php_files];
        $buttons = "";
        // 見つかったファイルのurlにつながるボタン群を作成
        foreach ( $file_list as $file ) {
            if ( !is_file($file) ) { continue; }
            $name = get_last_path($file);
            $child_url = "{$url}/{$name}";
            $buttons .= update_str_to_button($child_url, $name);
        }
        return $buttons;
    }


    // ファイルパスからファイル名を取り出す関数
    function get_last_path($path) {
        $path = str_replace('../', '', $path);
        $path = str_replace('./', '', $path);
        $path_arr = explode('/', $path);
        return end($path_arr);
    }


    // urlと名前からボタンを作成
    function update_str_to_button($url, $name) {
        $str = "<button type=\"button\" onclick=\"location.href='{$url}'\"> {$name} </button>";
        return $str;
    }


?>
