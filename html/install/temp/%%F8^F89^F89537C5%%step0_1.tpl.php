<?php /* Smarty version 2.6.26, created on 2011-09-26 11:02:09
         compiled from step0_1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'step0_1.tpl', 28, false),array('modifier', 'h', 'step0_1.tpl', 35, false),)), $this); ?>

<div class="contents">
    <div class="message">
        <h2>必要なファイルのコピー</h2>
    </div>
    <div class="result-info01">
        <textarea name="disp_area" cols="50" rows="20" class="box470"><?php echo ((is_array($_tmp=$this->_tpl_vars['copy_mess'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</textarea>
    </div>
    <form name="form1" id="form1" method="post" action="?">
    <input type="hidden" name="mode" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
    <input type="hidden" name="step" value="0" />

    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrHidden'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
        <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
    <?php endforeach; endif; unset($_from); ?>
    <div class="result-info02">
        <?php if (((is_array($_tmp=$this->_tpl_vars['hasErr'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <p class="action-message">[次へ進む] をクリックすると、チェックを再実行します。</p>
            <div><input type="checkbox" name="mode_overwrite" value="step0" id="mode_overwrite" /> <label for="mode_overwrite">問題点を無視して次へ進む (上級者向け)</label></div>
            <div class="attention">※ 問題点を解決せずに無視して進めると、トラブルの原因となる場合があります。</div>
        <?php else: ?>
            <p class="action-message">必要なファイルのコピーを開始します。</p>
        <?php endif; ?>
    </div>

    <div class="btn-area-top"></div>
    <div class="btn-area">
        <ul>
            <li><a href="#" class="btn-action" onclick="document.form1['mode'].value='return_step0';document.form1.submit();return false;"><span class="btn-prev">前へ戻る</span></a></li>
            <li><a class="btn-action" href="javascript:;" onclick="document.form1.submit(); return false;"><span class="btn-next">次へ進む</span></a></li>
        </ul>
    </div>
    <div class="btn-area-bottom"></div>
    </form>
</div>