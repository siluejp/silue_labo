<?php /* Smarty version 2.6.26, created on 2011-10-07 16:45:40
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/site_logo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/site_logo.tpl', 2, false),array('modifier', 'h', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/site_logo.tpl', 2, false),)), $this); ?>
<!-- ▼ロゴ ここから -->
<center><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/header/logo.gif" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"></center>
<!-- ▲ロゴ ここまで -->
<br>