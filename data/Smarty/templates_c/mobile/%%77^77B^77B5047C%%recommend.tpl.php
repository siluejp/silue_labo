<?php /* Smarty version 2.6.26, created on 2011-10-07 16:45:40
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/recommend.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/recommend.tpl', 24, false),array('modifier', 'u', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/recommend.tpl', 29, false),array('modifier', 'h', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/recommend.tpl', 30, false),array('modifier', 'nl2br', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/recommend.tpl', 30, false),)), $this); ?>
<?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrBestProducts'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>

<?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrBestProducts'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['best_products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['best_products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['arrProduct']):
        $this->_foreach['best_products']['iteration']++;
?>

<!-- ▼おすすめ商品コメント ここから -->
<a href="<?php echo ((is_array($_tmp=@MOBILE_P_DETAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('u', true, $_tmp) : smarty_modifier_u($_tmp)); ?>
">
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</a>
<!-- ▲おすすめ商品コメント ここまで -->

<?php if (! ((is_array($_tmp=($this->_foreach['best_products']['iteration'] == $this->_foreach['best_products']['total']))) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><br><?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<br>
<br>
<hr>

<?php endif; ?>