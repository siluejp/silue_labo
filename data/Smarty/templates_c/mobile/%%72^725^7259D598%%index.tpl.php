<?php /* Smarty version 2.6.26, created on 2011-10-07 16:45:40
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'numeric_emoji', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/index.tpl', 25, false),array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/index.tpl', 26, false),)), $this); ?>
<!-- ▼メニュー ここから -->
<a href="products/search.php" accesskey="2"><?php echo ((is_array($_tmp=2)) ? $this->_run_mod_handler('numeric_emoji', true, $_tmp) : smarty_modifier_numeric_emoji($_tmp)); ?>
商品検索</a><br>
<?php if (((is_array($_tmp=$this->_tpl_vars['isLogin'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == true): ?>
<a href="<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/refusal.php?<?php echo ((is_array($_tmp=@SID)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" accesskey="3"><?php echo ((is_array($_tmp=3)) ? $this->_run_mod_handler('numeric_emoji', true, $_tmp) : smarty_modifier_numeric_emoji($_tmp)); ?>
会員退会</a><br>
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
entry/kiyaku.php?<?php echo ((is_array($_tmp=@SID)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" accesskey="3"><?php echo ((is_array($_tmp=3)) ? $this->_run_mod_handler('numeric_emoji', true, $_tmp) : smarty_modifier_numeric_emoji($_tmp)); ?>
新規会員登録</a><br>
<?php endif; ?>
<a href="guide/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" accesskey="4"><?php echo ((is_array($_tmp=4)) ? $this->_run_mod_handler('numeric_emoji', true, $_tmp) : smarty_modifier_numeric_emoji($_tmp)); ?>
ご利用ガイド</a><br>
<a href="contact/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" accesskey="5"><?php echo ((is_array($_tmp=5)) ? $this->_run_mod_handler('numeric_emoji', true, $_tmp) : smarty_modifier_numeric_emoji($_tmp)); ?>
お問い合わせ</a><br>
<a href="order/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" accesskey="6"><?php echo ((is_array($_tmp=6)) ? $this->_run_mod_handler('numeric_emoji', true, $_tmp) : smarty_modifier_numeric_emoji($_tmp)); ?>
特定商取引に関する表記</a>
<!-- ▲メニュー ここまで -->