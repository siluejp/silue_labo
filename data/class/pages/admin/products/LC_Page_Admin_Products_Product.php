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
require_once CLASS_EX_REALDIR . 'page_extends/admin/products/LC_Page_Admin_Products_Ex.php';

/**
 * 商品登録 のページクラス
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Admin_Products_Product.php 20970 2011-06-10 10:27:24Z Seasoft $
 */
class LC_Page_Admin_Products_Product extends LC_Page_Admin_Products_Ex {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $this->tpl_mainpage = 'products/product.tpl';
        $this->tpl_mainno = 'products';
        $this->tpl_subno = 'product';
        $this->tpl_maintitle = '商品管理';
        $this->tpl_subtitle = '商品登録';

        $masterData = new SC_DB_MasterData_Ex();
        $this->arrProductType = $masterData->getMasterData("mtb_product_type");
        $this->arrDISP = $masterData->getMasterData("mtb_disp");
        $this->arrCLASS = $masterData->getMasterData("mtb_class");
        $this->arrSTATUS = $masterData->getMasterData("mtb_status");
        $this->arrSTATUS_IMAGE = $masterData->getMasterData("mtb_status_image");
        $this->arrDELIVERYDATE = $masterData->getMasterData("mtb_delivery_date");
        $this->arrMaker = SC_Helper_DB_Ex::sfGetIDValueList("dtb_maker", "maker_id", 'name');
        $this->arrAllowedTag = $masterData->getMasterData("mtb_allowed_tag");
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {
        $objFormParam = new SC_FormParam_Ex();

        // アップロードファイル情報の初期化
        $objUpFile = new SC_UploadFile_Ex(IMAGE_TEMP_REALDIR, IMAGE_SAVE_REALDIR);
        $this->lfInitFile($objUpFile);
        $objUpFile->setHiddenFileList($_POST);

        // ダウンロード販売ファイル情報の初期化
        $objDownFile = new SC_UploadFile_Ex(DOWN_TEMP_REALDIR, DOWN_SAVE_REALDIR);
        $this->lfInitDownFile($objDownFile);
        $objDownFile->setHiddenFileList($_POST);

        // 検索パラメーター引き継ぎ
        $this->arrSearchHidden = $this->lfGetSearchParam($_POST);

        $mode = $this->getMode();
        switch($mode) {
        case 'pre_edit':
        case 'copy' :
            // パラメーター初期化(商品ID)
            $this->lfInitFormParam_PreEdit($objFormParam, $_POST);
            // エラーチェック
            $this->arrErr = $objFormParam->checkError();
            if(count($this->arrErr) > 0) {
                SC_Utils_Ex::sfDispException();
            }

            // 商品ID取得
            $product_id = $objFormParam->getValue('product_id');
            // 商品データ取得
            $arrForm = $this->lfGetFormParam_PreEdit($objUpFile, $objDownFile, $product_id);
            // ページ表示用パラメーター設定
            $this->arrForm = $this->lfSetViewParam_InputPage($objUpFile, $objDownFile, $arrForm);

            // 商品複製の場合、画像ファイルコピー
            if($mode == 'copy') {
                $this->arrForm["copy_product_id"] = $this->arrForm["product_id"];
                $this->arrForm["product_id"] = "";
                // 画像ファイルのコピー
                $this->lfCopyProductImageFiles($objUpFile);
            }

            // ページonload時のJavaScript設定
            $this->tpl_onload = $this->lfSetOnloadJavaScript_InputPage();
            break;

        case 'edit':
            // パラメーター初期化, 取得
            $this->lfInitFormParam($objFormParam, $_POST);
            $arrForm = $objFormParam->getHashArray();
            // エラーチェック
            $this->arrErr = $this->lfCheckError_Edit($objFormParam, $objUpFile, $objDownFile, $arrForm);
            if(count($this->arrErr) == 0) {
                // 確認画面表示設定
                $this->tpl_mainpage = 'products/confirm.tpl';
                $this->arrCatList = $this->lfGetCategoryList_Edit();
                $this->arrForm = $this->lfSetViewParam_ConfirmPage($objUpFile, $objDownFile, $arrForm);
            } else {
                // 入力画面表示設定
                $this->arrForm = $this->lfSetViewParam_InputPage($objUpFile, $objDownFile, $arrForm);
                // ページonload時のJavaScript設定
                $this->tpl_onload = $this->lfSetOnloadJavaScript_InputPage();
            }
            break;

        case 'complete':
            // パラメーター初期化, 取得
            $this->lfInitFormParam($objFormParam, $_POST);
            $arrForm = $this->lfGetFormParam_Complete($objFormParam);
            // エラーチェック
            $this->arrErr = $this->lfCheckError_Edit($objFormParam, $objUpFile, $objDownFile, $arrForm);
            if(count($this->arrErr) == 0) {
                // DBへデータ登録
                $product_id = $this->lfRegistProduct($objUpFile, $objDownFile, $arrForm);

                // 件数カウントバッチ実行
                $objQuery =& SC_Query_Ex::getSingletonInstance();
                $objDb = new SC_Helper_DB_Ex();
                $objDb->sfCountCategory($objQuery);
                $objDb->sfCountMaker($objQuery);

                // 一時ファイルを本番ディレクトリに移動する
                $this->lfSaveUploadFiles($objUpFile, $objDownFile, $product_id);

                $this->tpl_mainpage = 'products/complete.tpl';
                $this->arrForm['product_id'] = $product_id;
            } else {
                // 入力画面表示設定
                $this->arrForm = $this->lfSetViewParam_InputPage($objUpFile, $objDownFile, $arrForm);
                // ページonload時のJavaScript設定
                $this->tpl_onload = $this->lfSetOnloadJavaScript_InputPage();
            }
            break;

        // 画像のアップロード
        case 'upload_image':
        case 'delete_image':
            // パラメーター初期化
            $this->lfInitFormParam_UploadImage($objFormParam);
            $this->lfInitFormParam($objFormParam, $_POST);
            $arrForm = $objFormParam->getHashArray();

            switch($mode) {
            case 'upload_image':
                // ファイルを一時ディレクトリにアップロード
                $this->arrErr[$arrForm['image_key']] = $objUpFile->makeTempFile($arrForm['image_key'], IMAGE_RENAME);
                if($this->arrErr[$arrForm['image_key']] == "") {
                    // 縮小画像作成
                    $this->lfSetScaleImage($objUpFile, $arrForm['image_key']);
                }
                break;
            case 'delete_image':
                // ファイル削除
                $this->lfDeleteTempFile($objUpFile, $arrForm['image_key']);
                break;
            }

            // 入力画面表示設定
            $this->arrForm = $this->lfSetViewParam_InputPage($objUpFile, $objDownFile, $arrForm);
            // ページonload時のJavaScript設定
            $anchor_hash = $this->getAnchorHash($arrForm['image_key']);
            $this->tpl_onload = $this->lfSetOnloadJavaScript_InputPage($anchor_hash);
            break;

        // ダウンロード商品ファイルアップロード
        case 'upload_down':
        case 'delete_down':
            // パラメーター初期化
            $this->lfInitFormParam_UploadDown($objFormParam);
            $this->lfInitFormParam($objFormParam, $_POST);
            $arrForm = $objFormParam->getHashArray();

            switch($mode) {
            case 'upload_down':
                // ファイルを一時ディレクトリにアップロード
                $this->arrErr[$arrForm['down_key']] = $objDownFile->makeTempDownFile();
                break;
            case 'delete_down':
                // ファイル削除
                $objDownFile->deleteFile($arrForm['down_key']);
                break;
            }

            // 入力画面表示設定
            $this->arrForm = $this->lfSetViewParam_InputPage($objUpFile, $objDownFile, $arrForm);
            // ページonload時のJavaScript設定
            $anchor_hash = $this->getAnchorHash($arrForm['down_key']);
            $this->tpl_onload = $this->lfSetOnloadJavaScript_InputPage($anchor_hash);
            break;

        // 関連商品選択
        case 'recommend_select' :
            // パラメーター初期化
            $this->lfInitFormParam_RecommendSelect($objFormParam);
            $this->lfInitFormParam($objFormParam, $_POST);
            $arrForm = $objFormParam->getHashArray();
            // 入力画面表示設定
            $this->arrForm = $this->lfSetViewParam_InputPage($objUpFile, $objDownFile, $arrForm);

            // 選択された関連商品IDがすでに登録している関連商品と重複していないかチェック
            $this->lfCheckError_RecommendSelect($this->arrForm, $this->arrErr);

            // ページonload時のJavaScript設定
            $anchor_hash = $this->getAnchorHash($this->arrForm['anchor_key']);
            $this->tpl_onload = $this->lfSetOnloadJavaScript_InputPage($anchor_hash);
            break;

        // 確認ページからの戻り
        case 'confirm_return':
            // パラメーター初期化
            $this->lfInitFormParam($objFormParam, $_POST);
            $arrForm = $objFormParam->getHashArray();
            // 入力画面表示設定
            $this->arrForm = $this->lfSetViewParam_InputPage($objUpFile, $objDownFile, $arrForm);
            // ページonload時のJavaScript設定
            $this->tpl_onload = $this->lfSetOnloadJavaScript_InputPage();
            break;

        default:
            // 入力画面表示設定
            $arrForm = array();
            $this->arrForm = $this->lfSetViewParam_InputPage($objUpFile, $objDownFile, $arrForm);
            // ページonload時のJavaScript設定
            $this->tpl_onload = $this->lfSetOnloadJavaScript_InputPage();
            break;
        }

        // 関連商品の読み込み
        $this->arrRecommend = $this->lfGetRecommendProducts($this->arrForm);
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
     * パラメーター情報の初期化
     * - 編集/複製モード
     *
     * @param object $objFormParam SC_FormParamインスタンス
     * @param array $arrPost $_POSTデータ
     * @return void
     */
    function lfInitFormParam_PreEdit(&$objFormParam, $arrPost) {
        $objFormParam->addParam("商品ID", "product_id", INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->setParam($arrPost);
        $objFormParam->convParam();
    }

    /**
     * パラメーター情報の初期化
     *
     * @param object $objFormParam SC_FormParamインスタンス
     * @param array $arrPost $_POSTデータ
     * @return void
     */
    function lfInitFormParam(&$objFormParam, $arrPost) {
        $objFormParam->addParam("商品ID", "product_id", INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("商品名", 'name', STEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("商品カテゴリ", "category_id", INT_LEN, 'n', array("EXIST_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("公開・非公開", 'status', INT_LEN, 'n', array("EXIST_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("商品ステータス", "product_status", INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));

        if($this->lfGetProductClassFlag($arrPost['has_product_class']) == false) {
            // 新規登録, 規格なし商品の編集の場合
            $objFormParam->addParam("商品種別", "product_type_id", INT_LEN, 'n', array("EXIST_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
            $objFormParam->addParam("ダウンロード商品ファイル名", "down_filename", STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
            $objFormParam->addParam("ダウンロード商品実ファイル名", "down_realfilename", MTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
            $objFormParam->addParam("temp_down_file", "temp_down_file", '', "", array());
            $objFormParam->addParam("save_down_file", "save_down_file", '', "", array());
            $objFormParam->addParam("商品コード", "product_code", STEXT_LEN, 'KVna', array("EXIST_CHECK", "SPTAB_CHECK","MAX_LENGTH_CHECK"));
            $objFormParam->addParam(NORMAL_PRICE_TITLE, "price01", PRICE_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
            $objFormParam->addParam(SALE_PRICE_TITLE, "price02", PRICE_LEN, 'n', array("EXIST_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
            $objFormParam->addParam("在庫数", 'stock', AMOUNT_LEN, 'n', array("SPTAB_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
            $objFormParam->addParam("在庫無制限", "stock_unlimited", INT_LEN, 'n', array("SPTAB_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
        }
        $objFormParam->addParam("商品送料", "deliv_fee", PRICE_LEN, 'n', array("NUM_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ポイント付与率", "point_rate", PERCENTAGE_LEN, 'n', array("EXIST_CHECK", "NUM_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("発送日目安", "deliv_date_id", INT_LEN, 'n', array("NUM_CHECK"));
        $objFormParam->addParam("購入制限", "sale_limit", AMOUNT_LEN, 'n', array("SPTAB_CHECK", "ZERO_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("メーカー", "maker_id", INT_LEN, 'n', array("NUM_CHECK"));
        $objFormParam->addParam("メーカーURL", "comment1", URL_LEN, 'a', array("SPTAB_CHECK", "URL_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("検索ワード", "comment3", LLTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("備考欄(SHOP専用)", 'note', LLTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("一覧-メインコメント", "main_list_comment", MTEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("詳細-メインコメント", "main_comment", LLTEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("save_main_list_image", "save_main_list_image", '', "", array());
        $objFormParam->addParam("save_main_image", "save_main_image", '', "", array());
        $objFormParam->addParam("save_main_large_image", "save_main_large_image", '', "", array());
        $objFormParam->addParam("temp_main_list_image", "temp_main_list_image", '', "", array());
        $objFormParam->addParam("temp_main_image", "temp_main_image", '', "", array());
        $objFormParam->addParam("temp_main_large_image", "temp_main_large_image", '', "", array());

        for ($cnt = 1; $cnt <= PRODUCTSUB_MAX; $cnt++) {
            $objFormParam->addParam("詳細-サブタイトル" . $cnt, "sub_title" . $cnt, STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
            $objFormParam->addParam("詳細-サブコメント" . $cnt, "sub_comment" . $cnt, LLTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
            $objFormParam->addParam("save_sub_image" . $cnt, "save_sub_image" . $cnt, '', "", array());
            $objFormParam->addParam("save_sub_large_image" . $cnt, "save_sub_large_image" . $cnt, '', "", array());
            $objFormParam->addParam("temp_sub_image" . $cnt, "temp_sub_image" . $cnt, '', "", array());
            $objFormParam->addParam("temp_sub_large_image" . $cnt, "temp_sub_large_image" . $cnt, '', "", array());
        }

        for ($cnt = 1; $cnt <= RECOMMEND_PRODUCT_MAX; $cnt++) {
            $objFormParam->addParam("関連商品コメント" . $cnt, "recommend_comment" . $cnt, LTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
            $objFormParam->addParam("関連商品ID" . $cnt, "recommend_id" . $cnt, INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
            $objFormParam->addParam("recommend_delete" . $cnt, "recommend_delete" . $cnt, '', 'n', array());
        }

        $objFormParam->addParam("商品ID", "copy_product_id", INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));

        $objFormParam->addParam("has_product_class", "has_product_class", INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("product_class_id", "product_class_id", INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));

        $objFormParam->setParam($arrPost);
        $objFormParam->convParam();
    }

    /**
     * パラメーター情報の初期化
     * - 画像ファイルアップロードモード
     *
     * @param object $objFormParam SC_FormParamインスタンス
     * @return void
     */
    function lfInitFormParam_UploadImage(&$objFormParam) {
        $objFormParam->addParam("image_key", "image_key", "", "", array());
    }

    /**
     * パラメーター情報の初期化
     * - ダウンロード商品ファイルアップロードモード
     *
     * @param object $objFormParam SC_FormParamインスタンス
     * @return void
     */
    function lfInitFormParam_UploadDown(&$objFormParam) {
        $objFormParam->addParam("down_key", "down_key", "", "", array());
    }

    /**
     * パラメーター情報の初期化
     * - 関連商品追加モード
     *
     * @param object $objFormParam SC_FormParamインスタンス
     * @return void
     */
    function lfInitFormParam_RecommendSelect(&$objFormParam) {
        $objFormParam->addParam("anchor_key", "anchor_key", "", "", array());
        $objFormParam->addParam("select_recommend_no", "select_recommend_no", INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
    }

    /**
     * アップロードファイルパラメーター情報の初期化
     * - 画像ファイル用
     * 
     * @param object $objUpFile SC_UploadFileインスタンス
     * @return void
     */
    function lfInitFile(&$objUpFile) {
        $objUpFile->addFile("一覧-メイン画像", 'main_list_image', array('jpg', 'gif', 'png'),IMAGE_SIZE, false, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);
        $objUpFile->addFile("詳細-メイン画像", 'main_image', array('jpg', 'gif', 'png'), IMAGE_SIZE, false, NORMAL_IMAGE_WIDTH, NORMAL_IMAGE_HEIGHT);
        $objUpFile->addFile("詳細-メイン拡大画像", 'main_large_image', array('jpg', 'gif', 'png'), IMAGE_SIZE, false, LARGE_IMAGE_WIDTH, LARGE_IMAGE_HEIGHT);
        for ($cnt = 1; $cnt <= PRODUCTSUB_MAX; $cnt++) {
            $objUpFile->addFile("詳細-サブ画像$cnt", "sub_image$cnt", array('jpg', 'gif', 'png'), IMAGE_SIZE, false, NORMAL_SUBIMAGE_WIDTH, NORMAL_SUBIMAGE_HEIGHT);
            $objUpFile->addFile("詳細-サブ拡大画像$cnt", "sub_large_image$cnt", array('jpg', 'gif', 'png'), IMAGE_SIZE, false, LARGE_SUBIMAGE_WIDTH, LARGE_SUBIMAGE_HEIGHT);
        }
    }

    /**
     * アップロードファイルパラメーター情報の初期化
     * - ダウンロード商品ファイル用
     *
     * @param object $objDownFile SC_UploadFileインスタンス
     * @return void
     */
    function lfInitDownFile(&$objDownFile) {
        $objDownFile->addFile("ダウンロード販売用ファイル", 'down_file', explode(",", DOWNLOAD_EXTENSION),DOWN_SIZE, true, 0, 0);
    }

    /**
     * フォーム入力パラメーターのエラーチェック
     * 
     * @param object $objFormParam SC_FormParamインスタンス
     * @param object $objUpFile SC_UploadFileインスタンス
     * @param object $objDownFile SC_UploadFileインスタンス
     * @param array $arrForm フォーム入力パラメーター配列
     * @return array エラー情報を格納した連想配列
     */
    function lfCheckError_Edit(&$objFormParam, &$objUpFile, &$objDownFile, $arrForm) {
        $objErr = new SC_CheckError_Ex($arrForm);
        $arrErr = array();

        // 入力パラメーターチェック
        $arrErr = $objFormParam->checkError();

        // アップロードファイル必須チェック
        $arrErr = array_merge((array)$arrErr, (array)$objUpFile->checkEXISTS());

        // HTMLタグ許可チェック
        $objErr->doFunc(array("詳細-メインコメント", "main_comment", $this->arrAllowedTag), array("HTML_TAG_CHECK"));
        for ($cnt = 1; $cnt <= PRODUCTSUB_MAX; $cnt++) {
            $objErr->doFunc(array("詳細-サブコメント" . $cnt, "sub_comment" . $cnt, $this->arrAllowedTag), array("HTML_TAG_CHECK"));
        }

        // 規格情報がない商品の場合のチェック
        if($arrForm['has_product_class'] != true) {
            // 在庫必須チェック(在庫無制限ではない場合)
            if(!isset($arrForm['stock_unlimited']) && $arrForm['stock_unlimited'] != UNLIMITED_FLG_UNLIMITED) {
                $objErr->doFunc(array("在庫数", 'stock'), array("EXIST_CHECK"));
            }
            // ダウンロード商品ファイル必須チェック(ダウンロード商品の場合)
            if($arrForm['product_type_id'] == PRODUCT_TYPE_DOWNLOAD) {
                $arrErr = array_merge((array)$arrErr, (array)$objDownFile->checkEXISTS());
            }
        }

        $arrErr = array_merge((array)$arrErr, (array)$objErr->arrErr);
        return $arrErr;
    }

    /**
     * 関連商品の重複登録チェック、エラーチェック
     *
     * 関連商品の重複があった場合はエラーメッセージを格納し、該当の商品IDをリセットする
     *
     * @param array $arrForm 入力値の配列
     * @param array $arrErr エラーメッセージの配列
     * @return void
     */
    function lfCheckError_RecommendSelect(&$arrForm, &$arrErr) {
        $select_recommend_no = $arrForm['select_recommend_no'];
        $select_recommend_id = $arrForm['recommend_id' . $select_recommend_no];

        foreach(array_keys($arrForm) as $key) {
            if(preg_match('/^recommend_id/', $key)) {
                if($select_recommend_no == preg_replace('/^recommend_id/', '', $key)) {
                    continue;
                }

                if($select_recommend_id == $arrForm[$key]) {
                    // 重複した場合、選択されたデータをリセットする
                    $arrForm['recommend_id' . $select_recommend_no] = '';
                    $arrErr['recommend_comment' . $select_recommend_no] = '※ すでに登録されている関連商品です。<br />';
                    break;
                }
            }
        }
    }

    /**
     * 検索パラメーター引き継ぎ用配列取得
     *
     * @param array $arrPost $_POSTデータ
     * @return array 検索パラメーター配列
     */
    function lfGetSearchParam($arrPost) {
        $arrSearchParam = array();
        $objFormParam = new SC_FormParam_Ex();

        parent::lfInitParam($objFormParam);
        $objFormParam->setParam($arrPost);
        $arrSearchParam = $objFormParam->getSearchArray();

        return $arrSearchParam;
    }

    /**
     * フォームパラメーター取得
     * - 編集/複製モード
     * 
     * @param object $objUpFile SC_UploadFileインスタンス
     * @param object $objDownFile SC_UploadFileインスタンス
     * @param integer $product_id 商品ID
     * @return array フォームパラメーター配列
     */
    function lfGetFormParam_PreEdit(&$objUpFile, &$objDownFile, $product_id) {
        $arrForm = array();

        // DBから商品データ取得
        $arrForm = $this->lfGetProductData_FromDB($product_id);
        // DBデータから画像ファイル名の読込
        $objUpFile->setDBFileList($arrForm);
        // DBデータからダウンロードファイル名の読込
        $objDownFile->setDBDownFile($arrForm);

        return $arrForm;
    }

    /**
     * フォームパラメーター取得
     * - 登録モード
     * 
     * @param object $objFormParam SC_FormParamインスタンス
     * @return array フォームパラメーター配列
     */
    function lfGetFormParam_Complete(&$objFormParam) {
        $arrForm = $objFormParam->getHashArray();
        $arrForm['category_id'] = unserialize($arrForm['category_id']);
        $objFormParam->setValue('category_id', $arrForm['category_id']);

        return $arrForm;
    }

    /**
     * 表示用フォームパラメーター取得
     * - 入力画面
     *
     * @param object $objUpFile SC_UploadFileインスタンス
     * @param object $objDownFile SC_UploadFileインスタンス
     * @param array $arrForm フォーム入力パラメーター配列
     * @return array 表示用フォームパラメーター配列
     */
    function lfSetViewParam_InputPage(&$objUpFile, &$objDownFile, &$arrForm) {
        // カテゴリマスターデータ取得
        $objDb = new SC_Helper_DB_Ex();
        list($this->arrCatVal, $this->arrCatOut) = $objDb->sfGetLevelCatList(false);

        if (isset($arrForm['category_id']) && !is_array($arrForm['category_id'])) {
            $arrForm['category_id'] = unserialize($arrForm['category_id']);
        }
        if($arrForm['status'] == "") {
            $arrForm['status'] = DEFAULT_PRODUCT_DISP;
        }
        if($arrForm['product_type_id'] == "") {
            $arrForm['product_type_id'] = DEFAULT_PRODUCT_DOWN;
        }
        // アップロードファイル情報取得(Hidden用)
        $arrHidden = $objUpFile->getHiddenFileList();
        $arrForm['arrHidden'] = array_merge((array)$arrHidden, (array)$objDownFile->getHiddenFileList());

        // 画像ファイル表示用データ取得
        $arrForm['arrFile'] = $objUpFile->getFormFileList(IMAGE_TEMP_URLPATH, IMAGE_SAVE_URLPATH);

        // ダウンロード商品実ファイル名取得
        $arrForm['down_realfilename'] = $objDownFile->getFormDownFile();

        // 基本情報(デフォルトポイントレート用)
        $arrForm['arrInfo'] = SC_Helper_DB_Ex::sfGetBasisData();

        // サブ情報ありなしフラグ
        $arrForm['sub_find'] = $this->hasSubProductData($arrForm);

        return $arrForm;
    }

    /**
     * 表示用フォームパラメーター取得
     * - 確認画面
     *
     * @param object $objUpFile SC_UploadFileインスタンス
     * @param object $objDownFile SC_UploadFileインスタンス
     * @param array $arrForm フォーム入力パラメーター配列
     * @return array 表示用フォームパラメーター配列
     */
    function lfSetViewParam_ConfirmPage(&$objUpFile, &$objDownFile, &$arrForm) {
        // カテゴリ表示用
        $arrForm['arrCategoryId'] = $arrForm['category_id'];
        // hidden に渡す値は serialize する
        $arrForm['category_id'] = serialize($arrForm['category_id']);
        // 画像ファイル用データ取得
        $arrForm['arrFile'] = $objUpFile->getFormFileList(IMAGE_TEMP_URLPATH, IMAGE_SAVE_URLPATH);
        // ダウンロード商品実ファイル名取得
        $arrForm['down_realfilename'] = $objDownFile->getFormDownFile();

        return $arrForm;
    }

    /**
     * 縮小した画像をセットする
     * 
     * @param object $objUpFile SC_UploadFileインスタンス
     * @param string $image_key 画像ファイルキー
     * @return void
     */
    function lfSetScaleImage(&$objUpFile, $image_key){
        $subno = str_replace("sub_large_image", "", $image_key);
        switch ($image_key){
        case "main_large_image":
            // 詳細メイン画像
            $this->lfMakeScaleImage($objUpFile, $image_key, "main_image");
        case "main_image":
            // 一覧メイン画像
            $this->lfMakeScaleImage($objUpFile, $image_key, "main_list_image");
            break;
        case "sub_large_image" . $subno:
            // サブメイン画像
            $this->lfMakeScaleImage($objUpFile, $_POST['image_key'], "sub_image" . $subno);
            break;
        default:
            break;
        }
    }

    /**
     * 画像ファイルのコピー
     * 
     * @param object $objUpFile SC_UploadFileインスタンス
     * @return void
     */
    function lfCopyProductImageFiles(&$objUpFile) {
        $arrKey = $objUpFile->keyname;
        $arrSaveFile = $objUpFile->save_file;

        foreach($arrSaveFile as $key => $val){
            $this->lfMakeScaleImage($objUpFile, $arrKey[$key], $arrKey[$key], true);
        }
    }

    /**
     * 縮小画像生成
     *
     * @param object $objUpFile SC_UploadFileインスタンス
     * @param string $from_key 元画像ファイルキー
     * @param string $to_key 縮小画像ファイルキー
     * @param boolean $forced
     * @return void
     */
    function lfMakeScaleImage(&$objUpFile, $from_key, $to_key, $forced = false){
        $arrImageKey = array_flip($objUpFile->keyname);
        $from_path = "";

        if($objUpFile->temp_file[$arrImageKey[$from_key]]) {
            $from_path = $objUpFile->temp_dir . $objUpFile->temp_file[$arrImageKey[$from_key]];
        } elseif($objUpFile->save_file[$arrImageKey[$from_key]]){
            $from_path = $objUpFile->save_dir . $objUpFile->save_file[$arrImageKey[$from_key]];
        }

        if(file_exists($from_path)) {
            // 生成先の画像サイズを取得
            $to_w = $objUpFile->width[$arrImageKey[$to_key]];
            $to_h = $objUpFile->height[$arrImageKey[$to_key]];

            if($forced) $objUpFile->save_file[$arrImageKey[$to_key]] = "";

            if(empty($objUpFile->temp_file[$arrImageKey[$to_key]])
                    && empty($objUpFile->save_file[$arrImageKey[$to_key]])) {
                // リネームする際は、自動生成される画像名に一意となるように、Suffixを付ける
                $dst_file = $objUpFile->lfGetTmpImageName(IMAGE_RENAME, "", $objUpFile->temp_file[$arrImageKey[$from_key]]) . $this->lfGetAddSuffix($to_key);
                $path = $objUpFile->makeThumb($from_path, $to_w, $to_h, $dst_file);
                $objUpFile->temp_file[$arrImageKey[$to_key]] = basename($path);
            }
        }
    }

    /**
     * アップロードファイルパラメーター情報から削除
     * 一時ディレクトリに保存されている実ファイルも削除する
     *
     * @param object $objUpFile SC_UploadFileインスタンス
     * @param string $image_key 画像ファイルキー
     * @return void
     */
    function lfDeleteTempFile(&$objUpFile, $image_key) {
        // TODO: SC_UploadFile::deleteFileの画像削除条件見直し要
        $arrTempFile = $objUpFile->temp_file;
        $arrKeyName = $objUpFile->keyname;

        foreach($arrKeyName as $key => $keyname) {
            if($keyname != $image_key) continue;

            if(!empty($arrTempFile[$key])) {
                $temp_file = $arrTempFile[$key];
                $arrTempFile[$key] = '';

                if(!in_array($temp_file, $arrTempFile)) {
                    $objUpFile->deleteFile($image_key);
                } else {
                    $objUpFile->temp_file[$key] = '';
                    $objUpFile->save_file[$key] = '';
                }
            } else {
                $objUpFile->temp_file[$key] = '';
                $objUpFile->save_file[$key] = '';
            }
        }
    }

    /**
     * アップロードファイルを保存する
     * 
     * @param object $objUpFile SC_UploadFileインスタンス
     * @param object $objDownFile SC_UploadFileインスタンス
     * @param integer $product_id 商品ID
     * @return void
     */
    function lfSaveUploadFiles(&$objUpFile, &$objDownFile, $product_id) {
        // TODO: SC_UploadFile::moveTempFileの画像削除条件見直し要
        $objImage = new SC_Image_Ex($objUpFile->temp_dir);
        $arrKeyName = $objUpFile->keyname;
        $arrTempFile = $objUpFile->temp_file;
        $arrSaveFile = $objUpFile->save_file;
        $arrImageKey = array();
        foreach($arrTempFile as $key => $temp_file) {
            if($temp_file) {
                $objImage->moveTempImage($temp_file, $objUpFile->save_dir);
                $arrImageKey[] = $arrKeyName[$key];
                if(!empty($arrSaveFile[$key])
                        && !$this->lfHasSameProductImage($product_id, $arrImageKey, $arrSaveFile[$key])
                        && !in_array($temp_file, $arrSaveFile)) {
                    $objImage->deleteImage($arrSaveFile[$key], $objUpFile->save_dir);
                }
            }
        }
        $objDownFile->moveTempDownFile();
    }

    /**
     * 同名画像ファイル登録の有無を確認する.
     *
     * 画像ファイルの削除可否判定用。
     * 同名ファイルの登録がある場合には画像ファイルの削除を行わない。
     * 戻り値： 同名ファイル有り(true) 同名ファイル無し(false)
     *
     * @param string $product_id 商品ID
     * @param string $arrImageKey 対象としない画像カラム名
     * @param string $image_file_name 画像ファイル名
     * @return boolean
     */
    function lfHasSameProductImage($product_id, $arrImageKey, $image_file_name) {
        if (!SC_Utils_Ex::sfIsInt($product_id)) return false;
        if (!$arrImageKey) return false;
        if (!$image_file_name) return false;

        $arrWhere = array();
        $sqlval = array('0', $product_id);
        foreach ($arrImageKey as $image_key) {
            $arrWhere[] = "{$image_key} = ?";
            $sqlval[] = $image_file_name;
        }
        $where = implode(" OR ", $arrWhere);
        $where = "del_flg = ? AND ((product_id <> ? AND ({$where}))";

        $arrKeyName = $this->objUpFile->keyname;
        foreach ($arrKeyName as $key => $keyname) {
            if (in_array($keyname, $arrImageKey)) continue;
            $where .= " OR {$keyname} = ?";
            $sqlval[] = $image_file_name;
        }
        $where .= ")";

        $objQuery = new SC_Query_Ex();
        $count = $objQuery->count('dtb_products', $where, $sqlval);
        if (!$count) return false;
        return true;
    }

    /**
     * DBから商品データを取得する
     * 
     * @param integer $product_id 商品ID
     * @return array 商品データ配列
     */
    function lfGetProductData_FromDB($product_id) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $arrProduct = array();

        // 商品データ取得
        $col = "*";
        $table = <<< __EOF__
                      dtb_products AS T1
            LEFT JOIN (
                       SELECT product_id AS product_id_sub,
                              product_code,
                              price01,
                              price02,
                              deliv_fee,
                              stock,
                              stock_unlimited,
                              sale_limit,
                              point_rate,
                              product_type_id,
                              down_filename,
                              down_realfilename
                        FROM dtb_products_class
                       ) AS T2
                     ON T1.product_id = T2.product_id_sub
__EOF__;
        $where = "product_id = ?";
        $objQuery->setLimit('1');
        $arrProduct = $objQuery->select($col, $table, $where, array($product_id));

        // カテゴリID取得
        $col = "category_id";
        $table = "dtb_product_categories";
        $where = "product_id = ?";
        $objQuery->setOption('');
        $arrProduct[0]['category_id'] = $objQuery->getCol($col, $table, $where, array($product_id));

        // 規格情報ありなしフラグ取得
        $objDb = new SC_Helper_DB_Ex();
        $arrProduct[0]['has_product_class'] = $objDb->sfHasProductClass($product_id);

        // 規格が登録されていなければ規格ID取得
        if ($arrProduct[0]['has_product_class'] == false) {
            $arrProduct[0]['product_class_id'] = SC_Utils_Ex::sfGetProductClassId($product_id,"0","0");
        }

        // 商品ステータス取得
        $objProduct = new SC_Product_Ex();
        $productStatus = $objProduct->getProductStatus(array($product_id));
        $arrProduct[0]['product_status'] = $productStatus[$product_id];

        // 関連商品データ取得
        $arrRecommend = $this->lfGetRecommendProductsData_FromDB($product_id);
        $arrProduct[0] = array_merge($arrProduct[0], $arrRecommend);

        return $arrProduct[0];
    }

    /**
     * DBから関連商品データを取得する
     * 
     * @param integer $product_id 商品ID
     * @return array 関連商品データ配列
     */
    function lfGetRecommendProductsData_FromDB($product_id) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $arrRecommendProducts = array();

        $col = 'recommend_product_id,';
        $col.= 'comment';
        $table = 'dtb_recommend_products';
        $where = 'product_id = ?';
        $objQuery->setOrder("rank DESC");
        $arrRet = $objQuery->select($col, $table, $where, array($product_id));

        $no = 1;
        foreach ($arrRet as $arrVal) {
            $arrRecommendProducts['recommend_id' . $no] = $arrVal['recommend_product_id'];
            $arrRecommendProducts['recommend_comment' . $no] = $arrVal['comment'];
            $no++;
        }

        return $arrRecommendProducts;
    }

    /**
     * 関連商品データ表示用配列を取得する
     * 
     * @param string $arrForm フォーム入力パラメーター配列
     * @return array 関連商品データ配列
     */
    function lfGetRecommendProducts(&$arrForm) {
        $arrRecommend = array();

        for($i = 1; $i <= RECOMMEND_PRODUCT_MAX; $i++) {
            $keyname = "recommend_id" . $i;
            $delkey = "recommend_delete" . $i;
            $commentkey = "recommend_comment" . $i;

            if (!isset($arrForm[$delkey])) $arrForm[$delkey] = null;

            if((isset($arrForm[$keyname]) && !empty($arrForm[$keyname])) && $arrForm[$delkey] != 1) {
                $objProduct = new SC_Product_Ex();
                $arrRecommend[$i] = $objProduct->getDetail($arrForm[$keyname]);
                $arrRecommend[$i]['product_id'] = $arrForm[$keyname];
                $arrRecommend[$i]['comment'] = $arrForm[$commentkey];
            }
        }
        return $arrRecommend;
    }

    /**
     * 表示用カテゴリマスターデータ配列を取得する
     * - 編集モード
     * 
     * @param void
     * @return array カテゴリマスターデータ配列
     */
    function lfGetCategoryList_Edit() {
        $objDb = new SC_Helper_DB_Ex();
        $arrCategoryList = array();

        list($arrCatVal, $arrCatOut) = $objDb->sfGetLevelCatList(false);
        for ($i = 0; $i < count($arrCatVal); $i++) {
            $arrCategoryList[$arrCatVal[$i]] = $arrCatOut[$i];
        }

        return $arrCategoryList;
    }

    /**
     * 入力フォームパラメーターの規格ありなしフラグを判定
     * 
     * @param string $has_product_class 入力フォームパラメーターの規格ありなしフラグ
     * @return boolean true: 規格あり, false: 規格なし
     */
    function lfGetProductClassFlag($has_product_class) {
        if($has_product_class == '1') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * ページonload用JavaScriptを取得する
     * - 入力画面
     *
     * @param string $anchor_hash アンカー用ハッシュ文字列(省略可)
     * @return string ページonload用JavaScript
     */
    function lfSetOnloadJavaScript_InputPage($anchor_hash = "") {
        return "fnCheckStockLimit('" . DISABLED_RGB . "'); fnMoveSelect('category_id_unselect', 'category_id');" . $anchor_hash;
    }

    /**
     * DBに商品データを登録する
     * 
     * @param object $objUpFile SC_UploadFileインスタンス
     * @param object $objDownFile SC_UploadFileインスタンス
     * @param array $arrList フォーム入力パラメーター配列
     * @return integer 登録商品ID
     */
    function lfRegistProduct(&$objUpFile, &$objDownFile, $arrList) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objDb = new SC_Helper_DB_Ex();

        // 配列の添字を定義
        $checkArray = array('name', 'status',
                            "main_list_comment", "main_comment",
                            "deliv_fee", "comment1", "comment2", "comment3",
                            "comment4", "comment5", "comment6", "main_list_comment",
                            "sale_limit", "deliv_date_id", "maker_id", 'note');
        $arrList = SC_Utils_Ex::arrayDefineIndexes($arrList, $checkArray);

        // INSERTする値を作成する。
        $sqlval['name'] = $arrList['name'];
        $sqlval['status'] = $arrList['status'];
        $sqlval['main_list_comment'] = $arrList['main_list_comment'];
        $sqlval['main_comment'] = $arrList['main_comment'];
        $sqlval['comment1'] = $arrList['comment1'];
        $sqlval['comment2'] = $arrList['comment2'];
        $sqlval['comment3'] = $arrList['comment3'];
        $sqlval['comment4'] = $arrList['comment4'];
        $sqlval['comment5'] = $arrList['comment5'];
        $sqlval['comment6'] = $arrList['comment6'];
        $sqlval['main_list_comment'] = $arrList['main_list_comment'];
        $sqlval['deliv_date_id'] = $arrList['deliv_date_id'];
        $sqlval['maker_id'] = $arrList['maker_id'];
        $sqlval['note'] = $arrList['note'];
        $sqlval['update_date'] = "Now()";
        $sqlval['creator_id'] = $_SESSION['member_id'];
        $arrRet = $objUpFile->getDBFileList();
        $sqlval = array_merge($sqlval, $arrRet);

        for($cnt = 1; $cnt <= PRODUCTSUB_MAX; $cnt++) {
            $sqlval['sub_title'.$cnt] = $arrList['sub_title'.$cnt];
            $sqlval['sub_comment'.$cnt] = $arrList['sub_comment'.$cnt];
        }

        $objQuery->begin();

        // 新規登録(複製時を含む)
        if($arrList['product_id'] == "") {
            $product_id = $objQuery->nextVal("dtb_products_product_id");
            $sqlval['product_id'] = $product_id;

            // INSERTの実行
            $sqlval['create_date'] = "Now()";
            $objQuery->insert("dtb_products", $sqlval);

            $arrList['product_id'] = $product_id;

            // カテゴリを更新
            $objDb->updateProductCategories($arrList['category_id'], $product_id);

            // 複製商品の場合には規格も複製する
            if($arrList["copy_product_id"] != "" && SC_Utils_Ex::sfIsInt($arrList["copy_product_id"])) {
                if($this->lfGetProductClassFlag($arrList["has_product_class"]) == false) {
                    //規格なしの場合、複製は価格等の入力が発生しているため、その内容で追加登録を行う
                    $this->lfCopyProductClass($arrList, $objQuery);
                } else {
                    //規格がある場合の複製は複製元の内容で追加登録を行う
                    // dtb_products_class のカラムを取得
                    $dbFactory = SC_DB_DBFactory_Ex::getInstance();
                    $arrColList = $objQuery->listTableFields('dtb_products_class');
                    $arrColList_tmp = array_flip($arrColList);

                    // 複製しない列
                    unset($arrColList[$arrColList_tmp["product_class_id"]]);     //規格ID
                    unset($arrColList[$arrColList_tmp["product_id"]]);           //商品ID
                    unset($arrColList[$arrColList_tmp["create_date"]]);

                    // 複製元商品の規格データ取得
                    $col = SC_Utils_Ex::sfGetCommaList($arrColList);
                    $table = 'dtb_products_class';
                    $where = 'product_id = ?';
                    $objQuery->setOrder('product_class_id');
                    $arrProductsClass = $objQuery->select($col, $table, $where, array($arrList["copy_product_id"]));

                    // 複製元商品の規格組み合わせデータ登録
                    // 登録した組み合わせIDを取得
                    $arrRetCombinationId = $this->lfRegistClassCombination($arrProductsClass);

                    // 規格データ登録
                    $objQuery =& SC_Query_Ex::getSingletonInstance();
                    foreach($arrProductsClass as $arrData) {
                        $sqlval = array();
                        $sqlval['product_class_id'] = $objQuery->nextVal('dtb_products_class_product_class_id');
                        $sqlval['product_id'] = $product_id;
                        $sqlval['create_date'] = 'now()';
                        $sqlval['class_combination_id'] = $arrRetCombinationId[$arrData['class_combination_id']];
                        $sqlval['product_type_id'] = $arrData['product_type_id'];
                        $sqlval['product_code'] = $arrData['product_code'];
                        $sqlval['stock'] = $arrData['stock'];
                        $sqlval['stock_unlimited'] = $arrData['stock_unlimited'];
                        $sqlval['sale_limit'] = $arrData['sale_limit'];
                        $sqlval['price01'] = $arrData['price01'];
                        $sqlval['price02'] = $arrData['price02'];
                        $sqlval['deliv_fee'] = $arrData['deliv_fee'];
                        $sqlval['point_rate'] = $arrData['point_rate'];
                        $sqlval['creator_id'] = $arrData['creator_id'];
                        $sqlval['update_date'] = 'now()';
                        $sqlval['down_filename'] = $arrData['down_filename'];
                        $sqlval['down_realfilename'] = $arrData['down_realfilename'];
                        $sqlval['del_flg'] = $arrData['del_flg'];
                        $objQuery->insert($table, $sqlval);
                    }
                }
            }
        // 更新
        } else {
            $product_id = $arrList['product_id'];
            // 削除要求のあった既存ファイルの削除
            $arrRet = $this->lfGetProductData_FromDB($arrList['product_id']);
            // TODO: SC_UploadFile::deleteDBFileの画像削除条件見直し要
            $objImage = new SC_Image_Ex($objUpFile->temp_dir);
            $arrKeyName = $objUpFile->keyname;
            $arrSaveFile = $objUpFile->save_file;
            $arrImageKey = array();
            foreach ($arrKeyName as $key => $keyname) {
                if ($arrRet[$keyname] && !$arrSaveFile[$key]) {
                    $arrImageKey[] = $keyname;
                    $has_same_image = $this->lfHasSameProductImage($arrList['product_id'], $arrImageKey, $arrRet[$keyname]);
                    if (!$has_same_image) {
                        $objImage->deleteImage($arrRet[$keyname], $objUpFile->save_dir);
                    }
                }
            }
            $objDownFile->deleteDBDownFile($arrRet);
            // UPDATEの実行
            $where = "product_id = ?";
            $objQuery->update("dtb_products", $sqlval, $where, array($product_id));

            // カテゴリを更新
            $objDb->updateProductCategories($arrList['category_id'], $product_id);
        }

        // 商品登録の時は規格を生成する。複製の場合は規格も複製されるのでこの処理は不要。
        if($arrList["copy_product_id"] == "") {
            // 規格登録
            if ($objDb->sfHasProductClass($product_id)) {
                // 規格あり商品（商品規格テーブルのうち、商品登録フォームで設定するパラメーターのみ更新）
                $this->lfUpdateProductClass($arrList);
            } else {
                // 規格なし商品（商品規格テーブルの更新）
                $this->lfInsertDummyProductClass($arrList);
            }
        }

        // ステータス設定
        $objProduct = new SC_Product_Ex();
        $objProduct->setProductStatus($product_id, $arrList['product_status']);

        // 関連商品登録
        $this->lfInsertRecommendProducts($objQuery, $arrList, $product_id);

        $objQuery->commit();
        return $product_id;
    }

    /**
     * 規格を設定していない商品を商品規格テーブルに登録
     *
     * @param array $arrList
     * @return void
     */
    function lfInsertDummyProductClass($arrList) {
        $objQuery = new SC_Query_Ex();
        $objDb = new SC_Helper_DB_Ex();

        $product_id = $arrList['product_id'];

        // 配列の添字を定義
        $checkArray = array('product_class_id', 'product_id', 'product_code', 'stock', 'stock_unlimited', 'price01', 'price02', 'sale_limit', 'deliv_fee', 'point_rate' ,'product_type_id', 'down_filename', 'down_realfilename');
        $sqlval = SC_Utils_Ex::sfArrayIntersectKeys($arrList, $checkArray);
        $sqlval = SC_Utils_Ex::arrayDefineIndexes($sqlval, $checkArray);

        $sqlval['stock_unlimited'] = $sqlval['stock_unlimited'] ? UNLIMITED_FLG_UNLIMITED : UNLIMITED_FLG_LIMITED;
        $sqlval['creator_id'] = strlen($_SESSION['member_id']) >= 1 ? $_SESSION['member_id'] : '0';

        if (strlen($sqlval['product_class_id']) == 0) {
            $sqlval['product_class_id'] = $objQuery->nextVal('dtb_products_class_product_class_id');
            $sqlval['create_date'] = 'now()';
            $sqlval['update_date'] = 'now()';
            // INSERTの実行
            $objQuery->insert('dtb_products_class', $sqlval);
        } else {
            $sqlval['update_date'] = 'now()';
            // UPDATEの実行
            $objQuery->update('dtb_products_class', $sqlval, "product_class_id = ?", array($sqlval['product_class_id']));

        }
    }

    /**
     * 規格を設定している商品の商品規格テーブルを更新
     * (deliv_fee, point_rate, sale_limit)
     *
     * @param array $arrList
     * @return void
     */
    function lfUpdateProductClass($arrList) {
        $objQuery = new SC_Query_Ex();
        $sqlval = array();
        
        $sqlval['deliv_fee'] = $arrList['deliv_fee'];
        $sqlval['point_rate'] = $arrList['point_rate'];
        $sqlval['sale_limit'] = $arrList['sale_limit'];
        $where = 'product_id = ?';
        $objQuery->update('dtb_products_class', $sqlval, $where, array($arrList['product_id']));
    }

    /**
     * DBに関連商品データを登録する
     * 
     * @param object $objQuery SC_Queryインスタンス
     * @param string $arrList フォーム入力パラメーター配列
     * @param integer $product_id 登録する商品ID
     * @return void
     */
    function lfInsertRecommendProducts(&$objQuery, $arrList, $product_id) {
        // 一旦関連商品をすべて削除する
        $objQuery->delete("dtb_recommend_products", "product_id = ?", array($product_id));
        $sqlval['product_id'] = $product_id;
        $rank = RECOMMEND_PRODUCT_MAX;
        for($i = 1; $i <= RECOMMEND_PRODUCT_MAX; $i++) {
            $keyname = "recommend_id" . $i;
            $commentkey = "recommend_comment" . $i;
            $deletekey = "recommend_delete" . $i;

            if (!isset($arrList[$deletekey])) $arrList[$deletekey] = null;

            if($arrList[$keyname] != "" && $arrList[$deletekey] != '1') {
                $sqlval['recommend_product_id'] = $arrList[$keyname];
                $sqlval['comment'] = $arrList[$commentkey];
                $sqlval['rank'] = $rank;
                $sqlval['creator_id'] = $_SESSION['member_id'];
                $sqlval['create_date'] = "now()";
                $sqlval['update_date'] = "now()";
                $objQuery->insert("dtb_recommend_products", $sqlval);
                $rank--;
            }
        }
    }

    /**
     * 規格データをコピーする
     * 
     * @param array $arrList フォーム入力パラメーター配列
     * @param object $objQuery SC_Queryインスタンス
     * @return boolean エラーフラグ
     */
    function lfCopyProductClass($arrList, &$objQuery) {
        // 複製元のdtb_products_classを取得（規格なしのため、1件のみの取得）
        $col = "*";
        $table = "dtb_products_class";
        $where = "product_id = ?";
        $arrProductClass = $objQuery->select($col, $table, $where, array($arrList["copy_product_id"]));

        //トランザクション開始
        $objQuery->begin();
        $err_flag = false;
        //非編集項目は複製、編集項目は上書きして登録
        foreach($arrProductClass as $records) {
            foreach($records as $key => $value) {
                if(isset($arrList[$key])) {
                    switch($key) {
                    case 'stock_unlimited':
                        $records[$key] = (int)$arrList[$key];
                        break;
                    default:
                        $records[$key] = $arrList[$key];
                        break;
                    }
                }
            }

            $records["product_class_id"] = $objQuery->nextVal('dtb_products_class_product_class_id');
            $records["update_date"] = 'now()';
            $records["create_date"] = "Now()";
            $objQuery->insert($table, $records);
            //エラー発生時は中断
            if($objQuery->isError()) {
                $err_flag = true;
                continue;
            }
        }
        //トランザクション終了
        if($err_flag) {
            $objQuery->rollback();
        } else {
            $objQuery->commit();
        }
        return !$err_flag;
    }

    /**
     * 商品規格データを元に、規格組み合わせデータを複製登録する
     * 
     * @param array $arrProductsClass 商品規格データ配列
     * @return array 登録した規格組み合わせID配列
     */
    function lfRegistClassCombination($arrProductsClass) {
        $arrRetCombinationId = array();

        // 規格組み合わせデータを取得
        $arrClassCombination = $this->lfGetClassCombination($arrProductsClass);

        // 規格2を持っているかチェック
        $has_class2 = $this->lfHasClass2($arrClassCombination);

        // 規格組み合わせデータを複製登録
        if($has_class2 == true) {
            // 規格2を持っている場合、規格1の組み合わせデータも取得
            $arrClassCombinationParent = $this->lfGetClassCombination($arrClassCombination, true);

            // 親組み合わせデータを複製登録
            $arrRetCombinationId = $this->lfInsertClassCombination($arrClassCombinationParent);
            // 子組み合わせデータを複製登録
            $arrRetCombinationId = $this->lfInsertClassCombination($arrClassCombination, $arrRetCombinationId);
        } else {
            // 規格1のみの場合、複製登録
            $arrRetCombinationId = $this->lfInsertClassCombination($arrClassCombination);
        }

        return $arrRetCombinationId;
    }

    /**
     * 規格2を持っている規格組み合わせデータであるか判定する
     * 
     * @param array $arrClassCombination 規格組み合わせデータ配列
     * @return boolean true: 規格2を持っている, false: 規格1のみ
     */
    function lfHasClass2($arrClassCombination) {
        $has_class2 = false;

        foreach($arrClassCombination as $arrVal) {
            if($arrVal['level'] == '2') {
                $has_class2 = true;
                break;
            }
        }

        return $has_class2;
    }

    /**
     * 規格組み合わせデータを取得する
     * 
     * @param array $arrData 組み合わせIDを含むデータ配列
     * @param boolean $is_parent 親規格IDから抽出するフラグ(省略時: false)
     * @return array 規格組み合わせデータ配列
     */
    function lfGetClassCombination($arrData, $is_parent = false) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $key = 'class_combination_id';
        if($is_parent == true) {
            $key = 'parent_class_combination_id';
        }

        $where = 'class_combination_id IN (';
        $arrParam = array();
        foreach($arrData as $arrVal) {
            if(SC_Utils_Ex::isBlank($arrVal[$key]) == true) {
                continue;
            }
            $where .= '?,';
            $arrParam[] = $arrVal[$key];
        }
        $where = preg_replace('/,$/', ')', $where);
        $arrClassCombination = $objQuery->select('*', 'dtb_class_combination', $where, $arrParam);

        return $arrClassCombination;
    }

    /**
     * 規格組み合わせデータを複製登録する
     * 
     * @param array $arrClassCombination 複製元の規格組み合わせデータ配列
     * @param array $arrParentCombinationId 登録する親組み合わせID配列 (省略可)
     * @return array 登録した規格組み合わせID配列
     */
    function lfInsertClassCombination($arrClassCombination, $arrParentCombinationId = array()) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $arrRetCombinationId = array();

        // 親組み合わせIDの指定がある場合、指定された親組み合わせIDで複製登録
        if(count($arrParentCombinationId) > 0) {
            foreach($arrClassCombination as $key => $arrVal) {
                $arrClassCombination[$key]['parent_class_combination_id'] = $arrParentCombinationId[$arrVal['parent_class_combination_id']];
            }
        }

        foreach($arrClassCombination as $arrVal) {
            $sqlval = array();
            $sqlval['class_combination_id'] = $objQuery->nextVal('dtb_class_combination_class_combination_id');
            $sqlval['parent_class_combination_id'] = $arrVal['parent_class_combination_id'];
            $sqlval['classcategory_id'] = $arrVal['classcategory_id'];
            $sqlval['level'] = $arrVal['level'];
            $objQuery->insert('dtb_class_combination', $sqlval);

            $arrRetCombinationId[$arrVal['class_combination_id']] = $sqlval['class_combination_id'];
        }

        return $arrRetCombinationId;
    }

    /**
     * リネームする際は、自動生成される画像名に一意となるように、Suffixを付ける
     * 
     * @param string $to_key
     * @return string 
     */
    function lfGetAddSuffix($to_key){
        if( IMAGE_RENAME === true ) return ;

        // 自動生成される画像名
        $dist_name = "";
        switch($to_key) {
        case "main_list_image":
            $dist_name = '_s';
            break;
        case "main_image":
            $dist_name = '_m';
            break;
        default:
            $arrRet = explode('sub_image', $to_key);
            $dist_name = '_sub' .$arrRet[1];
            break;
        }
        return $dist_name;
    }

    /**
     * サブ情報の登録があるかを取得する
     * タイトル, コメント, 画像のいずれかに登録があれば「あり」と判定する
     * 
     * @param array $arrSubProductData サブ情報配列
     * @return boolean true: サブ情報あり, false: サブ情報なし
     */
    function hasSubProductData($arrSubProductData) {
        $has_subproduct_data = false;

        for($i = 1; $i <= PRODUCTSUB_MAX; $i++) {
            if(SC_Utils_Ex::isBlank($arrSubProductData['sub_title'.$i]) == false
                    || SC_Utils_Ex::isBlank($arrSubProductData['sub_comment'.$i]) == false
                    || SC_Utils_Ex::isBlank($arrSubProductData['sub_image'.$i]) == false
                    || SC_Utils_Ex::isBlank($arrSubProductData['sub_large_image'.$i]) == false
                    || SC_Utils_Ex::isBlank($arrSubProductData['temp_sub_image'.$i]) == false
                    || SC_Utils_Ex::isBlank($arrSubProductData['temp_sub_large_image'.$i]) == false) {
                $has_subproduct_data = true;
                break;
            }
        }

        return $has_subproduct_data;
    }

    /**
     * アンカーハッシュ文字列を取得する
     * アンカーキーをサニタイジングする
     * 
     * @param string $anchor_key フォーム入力パラメーターで受け取ったアンカーキー
     * @return <type> 
     */
    function getAnchorHash($anchor_key) {
        if($anchor_key != "") {
            return "location.hash='#" . htmlspecialchars($anchor_key) . "'";
        } else {
            return "";
        }
    }
}
?>
