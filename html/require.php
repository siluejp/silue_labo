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

// rtrim は PHP バージョン依存対策
define('HTML_REALDIR', rtrim(realpath(rtrim(realpath(dirname(__FILE__)), '/\\') . '/'), '/\\') . '/');

if (ADMIN_FUNCTION !== true) {
    define('FRONT_FUNCTION', true);
}

require_once HTML_REALDIR . 'define.php';

if (SAFE === true) {
    require_once HTML_REALDIR . HTML2DATA_DIR . 'require_safe.php';
} else {
    require_once HTML_REALDIR . 'handle_error.php';
    require_once HTML_REALDIR . HTML2DATA_DIR . 'require_base.php';
}

if (SC_Display_Ex::detectDevice() == DEVICE_TYPE_MOBILE) {
    $objMobile = new SC_Helper_Mobile_Ex();
    $objMobile->sfMobileInit();
    ob_start();
} else {
    // 絵文字変換 (除去) フィルターを組み込む。
    ob_start(array('SC_MobileEmoji', 'handler'));
}
