<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2011 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

// {{{ requires
require_once DATA_REALDIR . 'module/Net/URL.php';

/**
 * Web Page を制御する基底クラス
 *
 * Web Page を制御する Page クラスは必ずこのクラスを継承する.
 * PHP4 ではこのような抽象クラスを作っても継承先で何でもできてしまうため、
 * あまり意味がないが、アーキテクトを統一するために作っておく.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id:LC_Page.php 15532 2007-08-31 14:39:46Z nanasess $
 */
class LC_Page {

    // {{{ properties

    /** メインテンプレート */
    var $tpl_mainpage;

    /** テンプレートのカラム数 */
    var $tpl_column_num;

    /** メインナンバー */
    var $tpl_mainno;

    /** CSS のパス */
    var $tpl_css;

    /** JavaScript */
    var $tpl_javascript;

    /** タイトル */
    var $tpl_title;

    /** カテゴリ */
    var $tpl_page_category;

    /** ログインメールアドレス */
    var $tpl_login_email;

    /** HTML ロード後に実行する JavaScript コード */
    var $tpl_onload;

    /** トランザクションID */
    var $transactionid;

    /** メインテンプレート名 */
    var $template = SITE_FRAME;

    /** 店舗基本情報 */
    var $arrSiteInfo;

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        
        $this->isIE = ( strpos( $this->browser_class(), 'msie' ) !== false )? true: false;
        
        // 開始時刻を設定する。
        $this->timeStart = SC_Utils_Ex::sfMicrotimeFloat();

        $this->tpl_authority = $_SESSION['authority'];

        // ディスプレイクラス生成
        $this->objDisplay = new SC_Display_Ex();

        $layout = new SC_Helper_PageLayout_Ex();
        $layout->sfGetPageLayout($this, false, $_SERVER['PHP_SELF'],
                                 $this->objDisplay->detectDevice());

        // プラグインクラス生成
        $this->objPlugin = new SC_Helper_Plugin_Ex();
        $this->objPlugin->preProcess($this);

        // 店舗基本情報取得
        $this->arrSiteInfo = SC_Helper_DB_Ex::sfGetBasisData();

        // トランザクショントークンの検証と生成
        $this->doValidToken();
        $this->setTokenTo();
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {}

    /**
     * Page のレスポンス送信.
     *
     * @return void
     */
    function sendResponse() {

        if (isset($this->objPlugin)) { // FIXME モバイルエラー応急対応
            // post-prosess処理(暫定的)
            $this->objPlugin->process($this);
        }

        $this->objDisplay->prepare($this);
        $this->objDisplay->response->write();
    }

    /**
     * Page のレスポンス送信(ダウンロード).
     *
     * @return void
     */
    function sendResponseCSV($file_name, $data) {
        $this->objDisplay->prepare($this);
        $this->objDisplay->addHeader("Content-disposition", "attachment; filename=${file_name}");
        $this->objDisplay->addHeader("Content-type", "application/octet-stream; name=${file_name}");
        $this->objDisplay->addHeader("Cache-Control", "");
        $this->objDisplay->addHeader('Pragma', "");

        $this->objDisplay->response->body = $data;
        $this->objDisplay->response->write();
        exit;
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        // 一定時間以上かかったページの場合、ログ出力する。
        // エラー画面の表示では $this->timeStart が出力されない
        if (defined('PAGE_DISPLAY_TIME_LOG_MODE') && PAGE_DISPLAY_TIME_LOG_MODE == true && isset($this->timeStart)) {
            $timeEnd = SC_Utils_Ex::sfMicrotimeFloat();
            $timeExecTime = $timeEnd - $this->timeStart;
            if (defined('PAGE_DISPLAY_TIME_LOG_MIN_EXEC_TIME') && $timeExecTime >= (float)PAGE_DISPLAY_TIME_LOG_MIN_EXEC_TIME) {
                $logMsg = sprintf("PAGE_DISPLAY_TIME_LOG [%.2fsec]", $timeExecTime);
                GC_Utils_Ex::gfPrintLog($logMsg);
            }
        }

    }

    /**
     * テンプレート取得
     *
     */
    function getTemplate() {
        return $this->template;
    }

    /**
     * テンプレート設定(ポップアップなどの場合)
     *
     */
    function setTemplate($template) {
        $this->template = $template;
    }

    /**
     * $path から URL を取得する.
     *
     * 以下の順序で 引数 $path から URL を取得する.
     * 1. realpath($path) で $path の 絶対パスを取得
     * 2. $_SERVER['DOCUMENT_ROOT'] と一致する文字列を削除
     * 3. $useSSL の値に応じて, HTTP_URL 又は, HTTPS_URL を付与する.
     *
     * 返り値に, QUERY_STRING を含めたい場合は, key => value 形式
     * の配列を $param へ渡す.
     *
     * @access protected
     * @param string $path 結果を取得するためのパス
     * @param array $param URL に付与するパラメーターの配列
     * @param mixed $useSSL 結果に HTTPS_URL を使用する場合 true,
     *                         HTTP_URL を使用する場合 false,
     *                         デフォルト 'escape' 現在のスキーマを使用
     * @return string $path の存在する http(s):// から始まる絶対パス
     * @see Net_URL
     */
    function getLocation($path, $param = array(), $useSSL = 'escape') {
        $rootPath = $this->getRootPath($path);

        // スキーマを定義
        if ($useSSL === true) {
            $url = HTTPS_URL . $rootPath;
        } elseif ($useSSL === false){
            $url = HTTP_URL . $rootPath;
        } elseif ($useSSL == 'escape') {
            if (SC_Utils_Ex::sfIsHTTPS()) {
                $url = HTTPS_URL . $rootPath;
            } else {
                $url = HTTP_URL . $rootPath;
            }
        } else {
            die("[BUG] Illegal Parametor of \$useSSL ");
        }

        $netURL = new Net_URL($url);
        // QUERY_STRING 生成
        foreach ($param as $key => $val) {
            $netURL->addQueryString($key, $val);
        }

        return $netURL->getURL();
    }

    /**
     * EC-CUBE のWEBルート(/html/)を / としたパスを返す
     *
     * @param string $path 結果を取得するためのパス
     * @return string EC-CUBE のWEBルート(/html/)を / としたパス
     */
    function getRootPath($path) {
        // Windowsの場合は, ディレクトリの区切り文字を\から/に変換する
        $path = str_replace('\\', '/', $path);
        $htmlPath = str_replace('\\', '/', HTML_REALDIR);

        // PHP 5.1 対策 ( http://xoops.ec-cube.net/modules/newbb/viewtopic.php?topic_id=4277&forum=9 )
        if (strlen($path) == 0) {
            $path = '.';
        }

        // $path が / で始まっている場合
        if (substr($path, 0, 1) == '/') {
            $realPath = realpath($htmlPath . substr_replace($path, '', 0, strlen(ROOT_URLPATH)));
        // 相対パスの場合
        } else {
            $realPath = realpath($path);
        }
        $realPath = str_replace('\\', '/', $realPath);

        // $path が / で終わっている場合、realpath によって削られた末尾の / を復元する。
        if (substr($path, -1, 1) == '/' && substr($realPath, -1, 1) != '/') {
            $realPath .= '/';
        }

        // HTML_REALDIR を削除した文字列を取得.
        $rootPath = str_replace($htmlPath, '', $realPath);
        $rootPath = ltrim($rootPath, '/');

        return $rootPath;
    }

    /**
     * 互換性確保用メソッド
     *
     * @access protected
     * @return void
     * @deprecated 決済モジュール互換のため
     */
    function allowClientCache() {
        $this->httpCacheControl('private');
    }

    /**
     * クライアント・プロキシのキャッシュを制御する.
     *
     * @access protected
     * @param string $mode (nocache/private)
     * @return void
     */
    function httpCacheControl($mode = '') {
        switch ($mode) {
            case 'nocache':
                header('Pragma: no-cache');
                header('Expires: Thu, 19 Nov 1981 08:52:00 GMT');
                header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                header('Last-Modified:');
                break;

            case 'private':
                $cache_expire = session_cache_expire() * 60;
                header('Pragma: no-cache');                                                            // anti-proxy
                header('Expires:');                                                                    // anti-mozilla
                header("Cache-Control: private, max-age={$cache_expire}, pre-check={$cache_expire}");  // HTTP/1.1 client
                header('Last-Modified:');
                break;

            default:
                break;
        }
    }

    /**
     * リクエストパラメーター 'mode' を取得する.
     *
     * 1. $_GET['mode'] の値を取得する.
     * 2. 1 が存在しない場合は $_POST['mode'] の値を取得する.
     * 3. どちらも存在しない場合は null を返す.
     *
     * mode に, 半角英数字とアンダーバー(_) 以外の文字列が検出された場合は null を
     * 返す.
     *
     * @access protected
     * @return string $_GET['mode'] 又は $_POST['mode'] の文字列
     */
    function getMode() {
        $pattern = '/^[a-zA-Z0-9_]+$/';
        $mode = null;
        if (isset($_GET['mode']) && preg_match($pattern, $_GET['mode'])) {
            $mode =  $_GET['mode'];
        } elseif (isset($_POST['mode']) && preg_match($pattern, $_POST['mode'])) {
            $mode = $_POST['mode'];
        }
        return $mode;
    }

    /**
     * POST アクセスの妥当性を検証する.
     *
     * 生成されたトランザクショントークンの妥当性を検証し,
     * 不正な場合はエラー画面へ遷移する.
     *
     * この関数は, 基本的に init() 関数で呼び出され, POST アクセスの場合は自動的に
     * トランザクショントークンを検証する.
     * ページによって検証タイミングなどを制御する必要がある場合は, この関数を
     * オーバーライドし, 個別に設定を行うこと.
     *
     * @access protected
     * @param boolean $is_admin 管理画面でエラー表示をする場合 true
     * @return void
     */
    function doValidToken($is_admin = false) {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (!SC_Helper_Session_Ex::isValidToken(false)) {
                if ($is_admin) {
                    SC_Utils_Ex::sfDispError(INVALID_MOVE_ERRORR);
                } else {
                    SC_Utils_Ex::sfDispSiteError(PAGE_ERROR, "", true);
                }
                exit;
            }
        }
    }

    /**
     * トランザクショントークンを取得し, 設定する.
     *
     * @access protected
     * @return void
     */
    function setTokenTo() {
        $this->transactionid = SC_Helper_Session_Ex::getToken();
    }

    /**
     * ログ出力を行う.
     *
     * ログイン中の顧客IDを含めてログ出力します.
     *
     * @access protected
     * @param string $mess ログメッセージ
     * @param string $log_level ログレベル("Info" or "Debug")
     * @return void
     */
    function log($mess, $log_level) {
        $mess = $mess . " user=" . $_SESSION['customer']['customer_id'];

        GC_Utils_Ex::gfFrontLog($mess, $log_level);
    }

    /**
     * デバック出力を行う.
     *
     * デバック用途のみに使用すること.
     *
     * @access protected
     * @param mixed $val デバックする要素
     * @return void
     */
    function p($val) {
        SC_Utils_Ex::sfPrintR($val);
    }
    
    function browser_class(){
        $classes = "";
        $agent = getenv( "HTTP_USER_AGENT" );
     
        if(strstr($agent,"MSIE")){
            $classes .= "msie ";
            if(strstr($agent,"MSIE 6.0")) $classes .= "ie6 lt7 lt8 lt9";
            if(strstr($agent,"MSIE 7.0")) $classes .= "gt6 ie7 lt8 lt9";
            if(strstr($agent,"MSIE 8.0")) $classes .= "gt6 gt7 ie8 lt9";
            if(strstr($agent,"MSIE 9.0")) $classes .= "gt6 gt7 gt8 ie9";
        }
        else {
            $classes .= "noie ";
            if( strstr($agent,"Firefox")) {
                $classes .= "firefox gecko";
            }
            elseif( strstr($agent,"Safari")) {
                $classes .= "safari webkit";
            }
            elseif( strstr($agent,"Chrome")) {
                $classes .= "Chrome webkit";
            }
            elseif( strstr($agent,"Opera")) {
                $classes .= "opera presto";
            }
            //ここからは気休め。
            //AppleWebKit/534.30 (KHTML, like Gecko) なので先に記述
            elseif( stristr($agent,"WebKit")) {
                $classes .= "webkit";
            }
            //AppleWebKit/534.30 (KHTML, like Gecko) なので先に記述
            elseif( stristr($agent,"KHTML")) {
                $classes .= "khtml";
            }
            elseif(stristr($agent,"Gecko")) {
                $classes .= "gecko";
            }else {
                $classes .= "other";
            }
        }
        return $classes;
    }
}
?>
