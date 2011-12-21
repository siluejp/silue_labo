<?php /* Smarty version 2.6.26, created on 2011-09-26 19:16:04
         compiled from mail/template_input.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'mail/template_input.tpl', 25, false),array('modifier', 'h', 'mail/template_input.tpl', 27, false),array('function', 'sfSetErrorStyle', 'mail/template_input.tpl', 33, false),array('function', 'html_radios', 'mail/template_input.tpl', 33, false),)), $this); ?>
<form name="form1" id="form1" method="post" action="?">
<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
<input type="hidden" name="mode" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
<input type="hidden" name="template_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['template_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
<div id="mail" class="contents-main">
    <table class="form">
        <tr>
            <th>メール形式<span class="attention"> *</span></th>
            <td>
                <span <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['mail_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo SC_Utils_Ex::sfSetErrorStyle(array(), $this);?>
<?php endif; ?>><?php echo smarty_function_html_radios(array('name' => 'mail_method','options' => ((is_array($_tmp=$this->_tpl_vars['arrMagazineType'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'separator' => "&nbsp;",'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['mail_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>
</span>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['mail_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><br /><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['mail_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Subject<span class="attention"> *</span></th>
            <td>
                <input type="text" name="subject" size="65" class="box65" <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['subject'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo SC_Utils_Ex::sfSetErrorStyle(array(), $this);?>
<?php endif; ?> value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['subject'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['subject'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><br /><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['subject'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>本文<span class="attention"> *</span><br />（名前差し込み時は {name} といれてください）</th>
            <td>
                <textarea name="body" cols="90" rows="40" class="area90 top" <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['body'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo SC_Utils_Ex::sfSetErrorStyle(array(), $this);?>
<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['body'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</textarea>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['body'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><br /><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['body'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
                <div>
                    <a class="btn-normal" href="javascript:;" onclick="fnCharCount('form1','body','cnt_footer'); return false;" name="next" id="next"><span>文字数カウント</span></a>
                    <span>今までに入力したのは<input type="text" name="cnt_footer" size="4" class="box4" readonly = true style="text-align:right" />文字です。</span>
                </div>
            </td>
        </tr>
    </table>
    <div class="btn-area">
        <ul>
            <li><a class="btn-action" href="javascript:;" onclick="fnFormModeSubmit('form1', '<?php echo ((is_array($_tmp=$this->_tpl_vars['mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '', ''); return false;"><span class="btn-next">この内容で登録する</span></a></li>
        </ul>
    </div>
</div>
</form>