<?php /* Smarty version 2.6.26, created on 2011-09-26 19:16:14
         compiled from contents/recommend.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'contents/recommend.tpl', 51, false),array('modifier', 'h', 'contents/recommend.tpl', 51, false),array('modifier', 'sfNoImageMainList', 'contents/recommend.tpl', 91, false),array('modifier', 'sfGetErrorColor', 'contents/recommend.tpl', 104, false),array('modifier', 'sfGetEnabled', 'contents/recommend.tpl', 104, false),)), $this); ?>
<script type="text/javascript">
<!--
function lfnCheckSubmit( fm ){

    var err = '';
    /*
    if ( ! fm["title"].value ){
        err += '見出しコメントを入力して下さい。';
    }
    */
    if ( ! fm["comment"].value ){
        if ( err ) err += '';
        err += 'コメントを入力して下さい。';
    }
    if ( err ){
        alert(err);
        return false;
    } else {
        if(window.confirm('内容を登録しても宜しいですか')){
                fm.submit();
                return true;
        }
    }
}

function lfnCheckSetItem( rank ){
    var flag = true;
    var checkRank = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['checkRank'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
';
    if ( checkRank ){
        if ( rank != checkRank ){
            if( ! window.confirm('さきほど選択した<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['checkRank'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
位の情報は破棄されます。宜しいでしょうか')){
                flag = false;
            }
        } 
    }

    if ( flag ){
        win03('./recommend_search.php?rank=' + rank,'search','615','600');
    }
}

//-->
</script>


        <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['tpl_disp_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

<div id="admin-contents" class="contents-main">
    <table class="list center" id="recommend-table">
        <colgroup width="13%">
        <colgroup width="73%">
        <colgroup width="7%">
        <colgroup width="7%">
        <tr>
            <th>順位</th>
            <th>商品/コメント</th>
            <th>編集</th>
            <th>削除</th>
        </tr>

        <tr>
            <td>おすすめ商品(<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
)</td>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <td>
                        <div id="table-wrap" class="clearfix">
                            <div class="table-img">
                                <?php if (((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                    <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" width="100" height="100" />
                                <?php endif; ?>
                            </div>
                            <div class="table-detail">
                                <div class="detail-name">商品名： <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</div>
                                    <div class="detail-form">
                                        <form name="form<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" id="form<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" method="post" action="?">
                                            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                                            <input type="hidden" name="mode" value="regist" />
                                            <input type="hidden" name="product_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                                            <input type="hidden" name="category_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                                            <input type="hidden" name="rank" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['rank'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                                            <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_sections['cnt']['iteration']]['comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                                            <textarea class="top" name="comment" cols="45" rows="4" style="width: 586px; height: 80px; <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_sections['cnt']['iteration']]['comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetEnabled', true, $_tmp) : SC_Utils_Ex::sfGetEnabled($_tmp)); ?>
><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</textarea>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                <?php else: ?>
                    <td class="AlignLeft">
                        <a class="btn-action-m" href="javascript:;" onclick="lfnCheckSetItem('<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false;" target="_blank"><span class="btn-next">商品を選択する</span></a>
                        <form name="form<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" id="form<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" method="post" action="?">
                            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                            <input type="hidden" name="mode" value="regist" />
                            <input type="hidden" name="product_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                            <input type="hidden" name="category_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                            <input type="hidden" name="rank" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['rank'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                        </form>
                    </td>
                <?php endif; ?>
            <td>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <a href="javascript:;" onclick="lfnCheckSetItem('<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false;" target="_blank">
                        編集</a>
                <?php else: ?>
                    - -
                <?php endif; ?>
            </td>
            <td>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <a href="javascript:;" onClick="return fnInsertValAndSubmit( document.form<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
, 'mode', 'delete', '削除します。宜しいですか' )">削除</a>
                <?php else: ?>
                    - -
                <?php endif; ?>
            </td>
        </tr>

        <tr><td colspan="4" class="no-border-w" height="20"></td></tr>
        <?php if (((is_array($_tmp=$this->_tpl_vars['arrItems'][$this->_sections['cnt']['iteration']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
        <tr><td colspan="4" class="no-border">
        <a class="btn-action" href="javascript:;" onclick="return lfnCheckSubmit(document.form<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
);"><span class="btn-next">この内容で登録する</span></a>
        </td>
        </tr>
        <?php endif; ?>
    <!--▲おすすめ商品<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-->
    <?php endfor; endif; ?>
    </table>
</div>