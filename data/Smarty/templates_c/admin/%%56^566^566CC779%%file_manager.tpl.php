<?php /* Smarty version 2.6.26, created on 2011-10-18 20:28:26
         compiled from contents/file_manager.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'contents/file_manager.tpl', 26, false),array('modifier', 'h', 'contents/file_manager.tpl', 50, false),array('modifier', 'number_format', 'contents/file_manager.tpl', 110, false),)), $this); ?>
<script type="text/javascript">//<![CDATA[
    $(function() {
        var bread_crumbs = <?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_now_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
;
        var file_path = '<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
';
        var $delimiter = '<span>&nbsp;&gt;&nbsp;</span>';
        var $node = $('h2');
        var total = bread_crumbs.length;
        for (var i in bread_crumbs) {
            file_path += bread_crumbs[i] + '/';
            $('<a href="javascript:;" onclick="fnFolderOpen(\'' + file_path + '\'); return false;" />')
                .text(bread_crumbs[i])
                .appendTo($node);
            if (i < total - 1) $node.append($delimiter);
        }
    });

var IMG_FOLDER_CLOSE   = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/folder_close.gif";  // フォルダクローズ時画像
var IMG_FOLDER_OPEN    = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/folder_open.gif";   // フォルダオープン時画像
var IMG_PLUS           = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/plus.gif";          // プラスライン
var IMG_MINUS          = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/minus.gif";         // マイナスライン
var IMG_NORMAL         = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/space.gif";         // スペース
//]]>
</script>
<form name="form1" method="post" action="?"  enctype="multipart/form-data">
<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
<input type="hidden" name="mode" value="" />
<input type="hidden" name="now_file" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_now_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
<input type="hidden" name="now_dir" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_now_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
<input type="hidden" name="tree_select_file" value="" />
<input type="hidden" name="tree_status" value="" />
<input type="hidden" name="select_file" value="" />
<div id="admin-contents" class="contents-main">
    <div id="contents-filemanager-tree">
        <div id="tree"></div>
    </div>
    <div id="contents-filemanager-right">
        <table class="now_dir">
            <tr>
                <th>ファイルのアップロード</th>
                <td>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['upload_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['upload_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
                    <input type="file" name="upload_file" size="40" <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['upload_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>style="background-color:<?php echo ((is_array($_tmp=((is_array($_tmp=@ERR_COLOR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"<?php endif; ?>><a class="btn-normal" href="javascript:;" onclick="setTreeStatus('tree_status');fnModeSubmit('upload','',''); return false;">アップロード</a>
                </td>
            </tr>
            <tr>
                <th>フォルダ作成</th>
                <td>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['create_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['create_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
                    <input type="text" name="create_file" value="" style="width:336px;<?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['create_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?> background-color:<?php echo ((is_array($_tmp=((is_array($_tmp=@ERR_COLOR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php endif; ?>"><a class="btn-normal" href="javascript:;" onclick="setTreeStatus('tree_status');fnModeSubmit('create','',''); return false;">作成</a>
                </td>
            </tr>
        </table>
        <h2></h2>
        <table class="list">
            <tr>
                <th>ファイル名</th>
                <th>サイズ</th>
                <th>更新日付</th>
                <th class="edit">表示</th>
                <th>ダウンロード</th>
                <th class="delete">削除</th>
            </tr>
            <?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_is_top_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <tr id="parent_dir" onclick="fnSetFormVal('form1', 'select_file', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_parent_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
');fnSelectFile('parent_dir', '#808080');" onDblClick="setTreeStatus('tree_status');fnDbClick(arrTree, '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_parent_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
', true, '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_now_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
', true)" style="">
                    <td>
                        <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/folder_parent.gif" alt="フォルダ">&nbsp;..
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            <?php endif; ?>
            <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrFileList'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
$this->_sections['cnt']['start'] = $this->_sections['cnt']['step'] > 0 ? 0 : $this->_sections['cnt']['loop']-1;
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = $this->_sections['cnt']['loop'];
    if ($this->_sections['cnt']['total'] == 0)
        $this->_sections['cnt']['show'] = false;
} else
    $this->_sections['cnt']['total'] = 0;
if ($this->_sections['cnt']['show']):

            for ($this->_sections['cnt']['index'] = $this->_sections['cnt']['start'], $this->_sections['cnt']['iteration'] = 1;
                 $this->_sections['cnt']['iteration'] <= $this->_sections['cnt']['total'];
                 $this->_sections['cnt']['index'] += $this->_sections['cnt']['step'], $this->_sections['cnt']['iteration']++):
$this->_sections['cnt']['rownum'] = $this->_sections['cnt']['iteration'];
$this->_sections['cnt']['index_prev'] = $this->_sections['cnt']['index'] - $this->_sections['cnt']['step'];
$this->_sections['cnt']['index_next'] = $this->_sections['cnt']['index'] + $this->_sections['cnt']['step'];
$this->_sections['cnt']['first']      = ($this->_sections['cnt']['iteration'] == 1);
$this->_sections['cnt']['last']       = ($this->_sections['cnt']['iteration'] == $this->_sections['cnt']['total']);
?>
                <?php $this->assign('id', "select_file".($this->_sections['cnt']['index'])); ?>
                <tr id="<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="">
                    <td class="file-name" onDblClick="setTreeStatus('tree_status');fnDbClick(arrTree, '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
', <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['is_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp))): ?>true<?php else: ?>false<?php endif; ?>, '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_now_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
', false)">
                        <?php if (((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['is_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/folder_close.gif" alt="フォルダ">
                        <?php else: ?>
                            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/file.gif">
                        <?php endif; ?>
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['file_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                    </td>
                    <td class="right">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['file_size'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

                    </td>
                    <td class="center">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['file_time'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                    </td>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['is_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <td class="center">
                            <a href="javascript:;" onclick="fnSetFormVal('form1', 'tree_select_file', '<?php echo ((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
');fnSelectFile('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '#808080');fnModeSubmit('move','',''); return false;">表示</a>
                        </td>
                    <?php else: ?>
                        <td class="center">
                            <a href="javascript:;" onclick="fnSetFormVal('form1', 'select_file', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
');fnSelectFile('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '#808080');fnModeSubmit('view','',''); return false;">表示</a>
                        </td>
                    <?php endif; ?>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['is_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                                <td class="center">-</td>
                    <?php else: ?>
                        <td class="center">
                            <a href="javascript:;" onclick="fnSetFormVal('form1', 'select_file', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
');fnSelectFile('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '#808080');setTreeStatus('tree_status');fnModeSubmit('download','',''); return false;">ダウンロード</a>
                        </td>
                    <?php endif; ?>
                    <td class="center">
                        <a href="javascript:;" onclick="fnSetFormVal('form1', 'select_file', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrFileList'][$this->_sections['cnt']['index']]['file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
');fnSelectFile('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '#808080');setTreeStatus('tree_status');fnModeSubmit('delete','',''); return false;">削除</a>
                    </td>
                </tr>
            <?php endfor; endif; ?>
        </table>
    </div>
</div>
</form>