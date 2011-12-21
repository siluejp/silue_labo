<?php /* Smarty version 2.6.26, created on 2011-10-07 16:45:40
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/news.tpl', 24, false),array('modifier', 'h', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/news.tpl', 28, false),array('block', 'marquee', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/mobile/frontparts/bloc/news.tpl', 27, false),)), $this); ?>
<?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrNews'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
<center>
―――――――――<br>
<?php $this->_tag_stack[] = array('marquee', array()); $_block_repeat=true;smarty_block_marquee($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrNews'][0]['news_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNews'][0]['news_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"><?php endif; ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNews'][0]['news_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['arrNews'][0]['news_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?></a><?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_marquee($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
―――――――――<br>
</center>
<?php endif; ?>