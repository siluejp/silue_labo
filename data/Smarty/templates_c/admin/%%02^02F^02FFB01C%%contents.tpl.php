<?php /* Smarty version 2.6.26, created on 2011-09-26 19:35:21
         compiled from css/contents.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'css/contents.tpl', 26, false),)), $this); ?>
<style type="text/css">
.mainbg {
    background: #fff url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/main_bg.jpg);
    background-repeat: repeat-x;
}

.infobg {
    background: #fff url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/home_bg.jpg);
    background-repeat: no-repeat;
    background-color: #e3e3e3;
}

.navi a{
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/navi_bar.gif);
    background-repeat: repeat-y;
    background-color: #636469;
    width:140px;
    padding: 10px 5px 10px 12px;
    color:#ffffff;
    text-decoration:none;
    display:block ;
}

.navi-on a{
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/navi_bar.gif);
    background-repeat: repeat-y;
    background-color: #a5a5a5;
    width:140px;
    padding: 10px 5px 10px 12px;
    color:#000000;
    text-decoration:none;
    display:block;
}

.icon_edit{
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/icon_edit.jpg);
    background-repeat: no-repeat;
    padding: 0 0 0 15px;
}

.icon_mail {
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/icon_mail.jpg);
    background-repeat: no-repeat;
    padding: 0 0 0 15px;
}

.icon_delete {
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/icon_delete.jpg);
    background-repeat: no-repeat;
    padding: 0 0 0 15px;
}

.icon_copy {
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/icon_copy.jpg);
    background-repeat: no-repeat;
    padding: 0 0 0 15px;
}

.icon_class {
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/icon_class.jpg);
    background-repeat: no-repeat;
    padding: 0 0 0 15px;
}

.icon_confirm {
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/icon_confirm.jpg);
    background-repeat: no-repeat;
    padding: 0 0 0 15px;
}

.number a{
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/number_bg.jpg);
    background-repeat: repeat-x;
    background-color: #505468;
    padding-top: 3px;
    padding-bottom: 5px;
    padding-left: 8px;
    padding-right: 8px;
    color:#ffffff;
    font-size: 65%;
    line-height: 160%;
    font-weight: bold;
    text-decoration:none;
}

.number a:hover{
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/number_bg_on.jpg);
    background-repeat: repeat-x;
    background-color: #f7c600;
    padding-top: 3px;
    padding-bottom: 5px;
    padding-left: 8px;
    padding-right: 8px;
    color:#ffffff;
    font-size: 65%;
    line-height: 160%;
    font-weight: bold;
    text-decoration:none;
}

.number-on a{
    padding-top: 3px;
    padding-bottom: 5px;
    padding-left: 8px;
    padding-right: 8px;
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/number_bg_on.jpg);
    background-repeat: repeat-x;
    background-color: #f7c600;
    color:#ffffff;
    font-size: 65%;
    line-height: 160%;
    font-weight: bold;
    text-decoration:none;

}

.number-on a:hover{
    background: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH_DEFAULT'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/number_bg_on.jpg);
    background-repeat: repeat-x;
    background-color: #f7c600;
    padding-top: 3px;
    padding-bottom: 5px;
    padding-left: 8px;
    padding-right: 8px;
    color:#ffffff;
    font-size: 65%;
    line-height: 160%;
    font-weight: bold;
    text-decoration:none;
}
</style>