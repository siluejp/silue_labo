<?php /* Smarty version 2.6.26, created on 2011-09-26 19:35:10
         compiled from design/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'design/header.tpl', 26, false),array('modifier', 'h', 'design/header.tpl', 39, false),)), $this); ?>
<div id="design" class="contents-main">

    <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['err'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
        <div class="message">
            <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['err'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
        </div>
    <?php endif; ?>

        <h2>ヘッダー編集</h2>
    <form name="form_header" id="form_header" method="post" action="?" >
    <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
    <input type="hidden" name="mode" value="" />
    <input type="hidden" name="division" value="header" />
    <input type="hidden" name="header_row" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['header_row'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
    <input type="hidden" name="device_type_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['device_type_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />

        <textarea id="header-area" class="top" name="header" rows="<?php echo ((is_array($_tmp=$this->_tpl_vars['header_row'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="width: 100%;"><?php echo ((is_array($_tmp=$this->_tpl_vars['header_data'])) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</textarea>
        <div class="btn">
            <a id="header-area-resize-btn" class="btn-normal" href="javascript:;" onclick="ChangeSize('#header-area-resize-btn', '#header-area', 50, 13); $('input[name=header_row]').val($('#header-area').attr('rows'));return false;"><span>拡大</span></a>
        </div>

        <div class="btn-area">
                <ul>
                    <li><a class="btn-action" href="javascript:;" name='subm' onclick="fnFormModeSubmit('form_header','regist','',''); return false;"><span class="btn-next">登録する</span></a></li>
                </ul>
        </div>

    </form>
    
        <h2>フッター編集</h2>
    <form name="form_footer" id="form_footer" method="post" action="?" >
    <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
    <input type="hidden" name="mode" value="" />
    <input type="hidden" name="division" value="footer" />
    <input type="hidden" name="footer_row" value=<?php echo ((is_array($_tmp=$this->_tpl_vars['footer_row'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 />
    <input type="hidden" name="device_type_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['device_type_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />

        <textarea id="footer-area" class="top" name="footer" rows="<?php echo ((is_array($_tmp=$this->_tpl_vars['footer_row'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="width: 100%;"><?php echo ((is_array($_tmp=$this->_tpl_vars['footer_data'])) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</textarea>
        <div class="btn">
            <a id="footer-area-resize-btn" class="btn-normal" href="javascript:;" onclick="ChangeSize('#footer-area-resize-btn', '#footer-area', 50, 13); $('input[name=footer_row]').val($('#footer-area').attr('rows'));return false;"><span>拡大</span></a>
        </div>

        <div class="btn-area">
                <ul>
                    <li><a class="btn-action" href="javascript:;" name='subm' onclick="fnFormModeSubmit('form_footer','regist','',''); return false;"><span class="btn-next">登録する</span></a></li>
                </ul>
        </div>

    </form>
    </div>