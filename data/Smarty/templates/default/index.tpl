<!--{*
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
 *}-->
<form name="form1" id="form1" method="post" action="https://geneks.sakura.ne.jp/eccube-2.11.2/html/products/detail.php">
    <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
	
	<!--▼買い物かご-->
	<input type="hidden" name="mode" value="cart" />
	<input type="hidden" name="product_id" value="47<!--{$tpl_product_id}-->" />
	<input type="hidden" name="product_class_id" value="190<!--{$tpl_product_class_id}-->" id="product_class_id" />
	<input type="hidden" name="favorite_product_id" value="" />
	<input type="hidden" name="quantity" value="1" />

	<div id="welcom_bnr">
	
	<!--★カゴに入れる★-->
<script type="text/javascript">//<![CDATA[
function fnInCartSubmit() {
$(form1).submit();
//document.form1.submit();
//return false;
}
//]]>
</script>
	<a href="javascript:void(document.form1.submit());" onclick="fnInCartSubmit();" onmouseover="chgImg('<!--{$TPL_URLPATH}-->img/banner/ec_bnr_mj.png','cart');" onmouseout="chgImg('<!--{$TPL_URLPATH}-->img/banner/ec_bnr_mj.png','cart');">
	<img src="<!--{$TPL_URLPATH}-->img/banner/ec_bnr_mj.png" alt="マイケルジャクソングッズを購入する" name="cart" id="cart" /></a>
	<div class="attention" id="cartbtn_dynamic"></div>
	<!--▲買い物かご-->
	
	<a id="welcom_bnr" target="_blank" href="http://www.wat-shop.net/?mode=cate&cbid=1014659&csid=0"><img src="<!--{$TPL_URLPATH}-->img/banner/ec_bnr_01.png" alt="チケット販売" /></a>
	<a id="welcom_bnr_01" target="_blank" href="http://www.wat-shop.net/"><img src="<!--{$TPL_URLPATH}-->img/banner/ec_bnr_02.png" alt="その他商品" /></a>
	
	</div>
	
</form>
