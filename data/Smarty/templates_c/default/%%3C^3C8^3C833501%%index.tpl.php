<?php /* Smarty version 2.6.26, created on 2011-12-15 21:58:06
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/default/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/default/index.tpl', 23, false),)), $this); ?>
<form name="form1" id="form1" method="post" action="https://geneks.sakura.ne.jp/eccube-2.11.2/html/products/detail.php">
    <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
	
	<!--▼買い物かご-->
	<input type="hidden" name="mode" value="cart" />
	<input type="hidden" name="product_id" value="47<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
	<input type="hidden" name="product_class_id" value="190<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" id="product_class_id" />
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
	<a href="javascript:void(document.form1.submit());" onclick="fnInCartSubmit();" onmouseover="chgImg('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/banner/ec_bnr_mj.png','cart');" onmouseout="chgImg('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/banner/ec_bnr_mj.png','cart');">
	<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/banner/ec_bnr_mj.png" alt="マイケルジャクソングッズを購入する" name="cart" id="cart" /></a>
	<div class="attention" id="cartbtn_dynamic"></div>
	<!--▲買い物かご-->
	
	<a id="welcom_bnr" target="_blank" href="http://www.wat-shop.net/?mode=cate&cbid=1014659&csid=0"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/banner/ec_bnr_01.png" alt="チケット販売" /></a>
	<a id="welcom_bnr_01" target="_blank" href="http://www.wat-shop.net/"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/banner/ec_bnr_02.png" alt="その他商品" /></a>
	
	</div>
	
</form>