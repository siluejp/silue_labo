<!-- -*- coding: utf-8 -*- -->
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
require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';

/**
 * エラー表示のページクラス
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Error_DispError.php 20764 2011-03-22 06:26:40Z nanasess $
 */
class LC_Page_Error_DispError extends LC_Page_Admin_Ex {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     * LC_Page_Adminクラス内でエラーページを表示しようとした際に無限ループに陥るのを防ぐため,
     * ここでは, parent::init() を行わない.(フロントのエラー画面出力と同様の仕様)
     *
     * @return void
     */
    function init() {
        $this->template = LOGIN_FRAME;
        $this->tpl_mainpage = 'login_error.tpl';
        $this->tpl_title = 'ログインエラー';
        // ディスプレイクラス生成
        $this->objDisplay = new SC_Display_Ex();
    }

    /**
     * Page のプロセス。
     *
     * @return void
     */
    function process() {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のプロセス。
     *
     * @return void
     */
    function action(){
        switch ($this->type) {
            case LOGIN_ERROR:
                $this->tpl_error="ＩＤまたはパスワードが正しくありません。<br />もう一度ご確認のうえ、再度入力してください。";
                break;
            case ACCESS_ERROR:
                $this->tpl_error="ログイン認証の有効期限切れの可能性があります。<br />もう一度ご確認のうえ、再度ログインしてください。";
                break;
            case AUTH_ERROR:
                $this->tpl_error="このページにはアクセスできません";
                SC_Response_Ex::sendHttpStatus(403);
                break;
            case INVALID_MOVE_ERRORR:
                $this->tpl_error="不正なページ移動です。<br />もう一度ご確認のうえ、再度入力してください。";
                header("HTTP/1.1 301 Moved Permanently");
				header("Location: http://geneks.sakura.ne.jp/eccube-2.11.2/html/");
				exit();
                break;
            default:
                $this->tpl_error="エラーが発生しました。<br />もう一度ご確認のうえ、再度ログインしてください。";
                break;
        }
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::destroy();
    }

    /**
     * エラーページではトランザクショントークンの自動検証は行わない
     */
    function doValidToken() {
        // queit.
    }
}
?>
