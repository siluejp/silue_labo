<?php /* Smarty version 2.6.26, created on 2011-09-26 19:17:41
         compiled from ownersstore/log.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'ownersstore/log.tpl', 25, false),array('modifier', 'h', 'ownersstore/log.tpl', 40, false),array('modifier', 'sfDispDBDate', 'ownersstore/log.tpl', 42, false),)), $this); ?>
<form name="form1" id="form1" method="post" action="?">
<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
<input type="hidden" name="mode" value="register" />

<div id="ownersstore" class="contents-main">

    <table class="list center">
        <tr>
            <th>モジュール名</th>
            <th>ステータス</th>
            <th>日時</th>
            <th>詳細</th>
                    </tr>
        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrInstallLogs'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['log_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['log_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['log']):
        $this->_foreach['log_loop']['iteration']++;
?>
            <tr>
                <td class="left"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['log']['module_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                <td><?php if (((is_array($_tmp=$this->_tpl_vars['log']['error_flg'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>失敗<?php else: ?>成功<?php endif; ?></td>
                <td class="left"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['log']['update_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                <td>
                        <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
ownersstore/log.php?mode=detail&amp;log_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['log']['log_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                        詳細</a>
                </td>
                            </tr>
        <?php endforeach; endif; unset($_from); ?>
    </table>

</div>
</form>