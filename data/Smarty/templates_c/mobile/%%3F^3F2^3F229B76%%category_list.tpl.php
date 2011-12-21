<?php /* Smarty version 2.6.26, created on 2011-10-07 16:45:57
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/products/category_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/products/category_list.tpl', 24, false),array('modifier', 'h', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/products/category_list.tpl', 30, false),)), $this); ?>
<?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrChildren'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['arrChild']):
?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrChild']['has_children'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
<?php $this->assign('path', (@ROOT_URLPATH)."products/category_list.php"); ?>
<?php else: ?>
<?php $this->assign('path', (@ROOT_URLPATH)."products/list.php"); ?>
<?php endif; ?>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
?category_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['arrChild']['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrChild']['category_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
(<?php echo ((is_array($_tmp=$this->_tpl_vars['arrChild']['product_count'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
)</a><br>
<?php endforeach; endif; unset($_from); ?>

<br>