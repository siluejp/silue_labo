<?php /* Smarty version 2.6.26, created on 2011-09-26 19:36:13
         compiled from order/product_select.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'order/product_select.tpl', 42, false),array('modifier', 'h', 'order/product_select.tpl', 131, false),array('modifier', 'sfNoImageMainList', 'order/product_select.tpl', 186, false),array('modifier', 'sfGetErrorColor', 'order/product_select.tpl', 207, false),array('function', 'html_options', 'order/product_select.tpl', 140, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_ADMIN_REALDIR)."admin_popup_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
<!--
self.moveTo(20,20);self.focus();

function func_submit(product_id, class_name1, class_name2) {
    var err_text = '';
    var fm = window.opener.document.form1;
    var fm1 = window.opener.document;
    var class1 = "classcategory_id" + product_id + "_1";
    var class2 = "classcategory_id" + product_id + "_2";

    var class1_id = document.getElementById(class1).value;
    var class2_id = document.getElementById(class2).value;
    var product_class_id = document.getElementById("product_class_id" + product_id).value;
    var opner_product_id = 'add_product_id';
    var opner_product_class_id = 'add_product_class_id';
    var tpl_no = '<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_no'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
';

    if (tpl_no != '') {
        opner_product_id = 'edit_product_id';
        opner_product_class_id = 'edit_product_class_id';
        fm1.getElementById("no").value = escape('<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_no'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
');
    }
    if (document.getElementById(class1).type == 'select-one' && class1_id == '') {
        err_text = class_name1 + "を選択してください。\n";
    }
    if (document.getElementById(class2).type == 'select-one' && class2_id == '') {
        err_text = err_text + class_name2 + "を選択してください。\n";
    }
    if (err_text != '') {
        alert(err_text);
        return false;
    }

    fm1.getElementById(opner_product_id).value = product_id;
    fm1.getElementById(opner_product_class_id).value = product_class_id;

    fm.mode.value = 'select_product_detail';
    fm.anchor_key.value = 'order_products';
    fm.submit();
    window.close();

    return true;
}
//-->
</script>


<script type="text/javascript">//<![CDATA[
// 規格2に選択肢を割り当てる。
function fnSetClassCategories(form, classcat_id2_selected) {
    sele1 = form.classcategory_id1;
    sele2 = form.classcategory_id2;
    product_id = form.product_id.value;

    if (sele1) {
        if (sele2) {
            // 規格2の選択肢をクリア
            count = sele2.options.length;
            for(i = count; i >= 0; i--) {
                sele2.options[i] = null;
            }

            // 規格2に選択肢を割り当てる
            classcats = productsClassCategories[product_id][sele1.value];
            i = 0;
            for (var classcat_id2_key in classcats) {
                classcategory_id2 = classcats[classcat_id2_key].classcategory_id2;
                sele2.options[i] = new Option(classcats[classcat_id2_key].name, classcategory_id2);
                if (classcategory_id2 == classcat_id2_selected) {
                    sele2.options[i].selected = true;
                }
                i++;
            }
        }
        fnCheckStock(form);
    }
}

function fnCheckStock(form) {
    product_id = form.product_id.value;
    classcat_id1 = form.classcategory_id1.value;
    classcat_id2 = form.classcategory_id2 ? form.classcategory_id2.value : '';
    classcat2 = productsClassCategories[product_id][classcat_id1]['#' + classcat_id2];
    // 商品規格
    eleDynamic = document.getElementById('product_class_id' + product_id);
    if (
        classcat2
        && typeof classcat2.product_class_id != 'undefined'
        && String(classcat2.product_class_id).length >= 1
    ) {
        eleDynamic.value = classcat2.product_class_id;
    } else {
        eleDynamic.value = ''
    }
}
//]]>
</script>

<!--▼検索フォーム-->
<form name="form1" id="form1" method="post" action="?">
<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
<input name="mode" type="hidden" value="search" />
<input name="anchor_key" type="hidden" value="" />
<input name="search_pageno" type="hidden" value="" />
<input name="no" type="hidden" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_no'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
<table class="form">
    <colgroup width="20%">
    <colgroup width="80%">
    <tr>
        <th>カテゴリ</th>
        <td>
            <select name="search_category_id">
                <option value="" selected="selected">選択してください</option>
                <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrCatList'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

            </select>
        </td>
    </tr>
    <tr>
        <th>商品名</th>
        <td><input type="text" name="search_name" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['search_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="35" class="box35" /></td>
    </tr>
    <tr>
        <th>商品コード</th>
        <td><input type="text" name="search_product_code" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['search_product_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="35" class="box35" /></td>
    </tr>
</table>
<div class="btn-area">
    <ul>
        <li><a class="btn-action" href="javascript:;" onclick="fnFormModeSubmit('form1', 'search', '', ''); return false;"><span class="btn-next">検索を開始</span></a></li>
    </ul>
</div>
</form>
<!--▼検索結果表示-->
<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_linemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
    <p>
        <?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_linemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
件が該当しました。
        <?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_strnavi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

    </p>

    <!--▼検索後表示部分-->
    <table class="list">
    <colgroup width="20%">
    <colgroup width="20%">
    <colgroup width="50%">
    <colgroup width="10%">
        <tr>
            <th class="image">商品画像</th>
            <th class="id">商品コード</th>
            <th class="name">商品名</th>
            <th class="action">決定</th>
        </tr>
        <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrProducts'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php $this->assign('id', ((is_array($_tmp=$this->_tpl_vars['arrProducts'][$this->_sections['cnt']['index']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
            <form name="product_form<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" action="?" onsubmit="return false;">
                <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                <!--▼商品<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-->
                <?php $this->assign('status', ($this->_tpl_vars['arrProducts'][$this->_sections['cnt']['index']]['status'])); ?>
                <tr style="background:<?php echo ((is_array($_tmp=$this->_tpl_vars['arrPRODUCTSTATUS_COLOR'][$this->_tpl_vars['status']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
;">
                    <td class="center">
                        <img src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
resize_image.php?image=<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProducts'][$this->_sections['cnt']['index']]['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&width=65&height=65" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrRecommend'][$this->_tpl_vars['recommend_no']]['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                    </td>    
                    <td>
                        <?php $this->assign('codemin', ($this->_tpl_vars['arrProducts'][$this->_sections['cnt']['index']]['product_code_min'])); ?>
                        <?php $this->assign('codemax', ($this->_tpl_vars['arrProducts'][$this->_sections['cnt']['index']]['product_code_max'])); ?>
                                                <?php if (((is_array($_tmp=$this->_tpl_vars['codemin'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ((is_array($_tmp=$this->_tpl_vars['codemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['codemin'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
～<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['codemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                        <?php else: ?>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['codemin'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProducts'][$this->_sections['cnt']['index']]['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>


                        <?php $this->assign('class1', "classcategory_id".($this->_tpl_vars['id'])."_1"); ?>
                        <?php $this->assign('class2', "classcategory_id".($this->_tpl_vars['id'])."_2"); ?>
                        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_classcat_find1'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <dl>
                            <dt><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_class_name1'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：</dt>
                            <dd>
                                <select name="classcategory_id1" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['class1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['class1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
"    onchange="fnSetClassCategories(this.form);">
                                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrClassCat1'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['class1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                                </select>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['class1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                <br /><span class="attention">※ <?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_class_name1'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
を入力して下さい。</span>
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <?php else: ?>
                        <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['class1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['class1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="" />
                        <?php endif; ?>

                        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_classcat_find2'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <dl>
                            <dt><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_class_name2'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：</dt>
                            <dd>
                                <select name="classcategory_id2" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['class2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['class2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" onchange="fnCheckStock(this.form);"></select>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['class2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                <br /><span class="attention">※ <?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_class_name2'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
を入力して下さい。</span>
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <?php else: ?>
                        <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['class2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['class2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="" />
                        <?php endif; ?>
                        <input type="hidden" name="product_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                        <input type="hidden" name="product_class_id<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="product_class_id<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_product_class_id'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                        <input type="hidden" name="product_type" id="product_type<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_product_type'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                    </td>
                    <td class="center"><a href="javascript:;" onclick="return func_submit('<?php echo ((is_array($_tmp=$this->_tpl_vars['arrProducts'][$this->_sections['cnt']['index']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_class_name1'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_class_name2'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false;">決定</a></td>
                </tr>
                <!--▲商品<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-->
            </form>
        <?php endfor; else: ?>
            <tr>
                <td colspan="4">商品が登録されていません</td>
            </tr>
        <?php endif; ?>
    </table>
<?php endif; ?>
<!--▲検索結果表示-->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_ADMIN_REALDIR)."admin_popup_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>