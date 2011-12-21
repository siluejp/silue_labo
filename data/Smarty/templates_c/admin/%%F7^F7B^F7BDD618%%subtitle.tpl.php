<?php /* Smarty version 2.6.26, created on 2011-12-09 10:32:56
         compiled from total/subtitle.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'total/subtitle.tpl', 24, false),)), $this); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['page']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'term' || ((is_array($_tmp=$this->_tpl_vars['arrForm']['page']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ""): ?>
    <strong>期間別集計</strong>&nbsp;（
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'day' || ((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ''): ?>
        <span class="over">日別</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'day');">日別</a>&nbsp;
    <?php endif; ?>
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'month'): ?>
        <span class="over">月別</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'month');">月別</a>&nbsp;
    <?php endif; ?>
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'year'): ?>
        <span class="over">年別</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'year');">年別</a>&nbsp;
    <?php endif; ?>
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'wday'): ?>
        <span class="over">曜日別</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'wday');">曜日別</a>&nbsp;
    <?php endif; ?>
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'hour'): ?>
        <span class="over">時間別</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'hour');">時間別</a>&nbsp;
    <?php endif; ?>
    ）
<?php endif; ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['page']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'products'): ?>
    <strong>商品別集計</strong>&nbsp;（
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'all' || ((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ''): ?>
        <span class="over">全体</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'all');">全体</a>&nbsp;
    <?php endif; ?>
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'member'): ?>
        <span class="over">会員</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'member');">会員</a>&nbsp;
    <?php endif; ?>
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'nonmember'): ?>
        <span class="over">非会員</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'nonmember');">非会員</a>&nbsp;
    <?php endif; ?>
    ）
<?php endif; ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['page']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'age'): ?>
    <strong>年代別集計</strong>&nbsp;（
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'all' || ((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ''): ?>
        <span class="over">全体</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'all');">全体</a>&nbsp;
    <?php endif; ?>
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'member'): ?>
        <span class="over">会員</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'member');">会員</a>&nbsp;
    <?php endif; ?>
    <?php if (((is_array($_tmp=$_POST['type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'nonmember'): ?>
        <span class="over">非会員</span>&nbsp;
    <?php else: ?>
        <a href="?" onclick="document.form1.mode.value='search'; return fnSetFormSubmit('form1', 'type', 'nonmember');">非会員</a>&nbsp;
    <?php endif; ?>
    ）
<?php endif; ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['page']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'job'): ?>
    <strong>職業別集計</strong>&nbsp;（
    <span class="over">全体</span>
    ）
    <?php endif; ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['page']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'member'): ?>
    <strong>会員別集計</strong>
<?php endif; ?>