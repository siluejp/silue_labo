<?php /* Smarty version 2.6.26, created on 2011-10-11 23:58:58
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/products/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/products/list.tpl', 22, false),array('modifier', 'h', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/products/list.tpl', 43, false),array('modifier', 'sfNoImageMainList', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/products/list.tpl', 84, false),array('modifier', 'u', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/products/list.tpl', 100, false),array('modifier', 'sfCalcIncTax', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/products/list.tpl', 107, false),array('modifier', 'number_format', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/products/list.tpl', 107, false),array('modifier', 'nl2br', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/products/list.tpl', 115, false),array('modifier', 'sfTrimURL', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/products/list.tpl', 143, false),)), $this); ?>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/products.js"></script>
<script type="text/javascript">//<![CDATA[
// 並び順を変更
function fnChangeOrderby(orderby) {
    fnSetVal('orderby', orderby);
    fnSetVal('pageno', 1);
    fnSubmit();
}
// 表示件数を変更
function fnChangeDispNumber(dispNumber) {
    fnSetVal('disp_number', dispNumber);
    fnSetVal('pageno', 1);
    fnSubmit();
}
//]]>
</script>

<!--▼CONTENTS-->
<section id="product_list">
    <form name="form1" id="form1" method="get" action="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
products/list.php">
        <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
        <input type="hidden" name="mode" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
        <input type="hidden" name="category_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSearchData']['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
        <input type="hidden" name="maker_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSearchData']['maker_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
        <input type="hidden" name="name" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSearchData']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
        <input type="hidden" name="orderby" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['orderby'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
        <input type="hidden" name="disp_number" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['disp_number'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
        <input type="hidden" name="pageno" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_pageno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
        <input type="hidden" name="product_id" value="" />
        <input type="hidden" name="classcategory_id1" value="" />
        <input type="hidden" name="classcategory_id2" value="" />
        <input type="hidden" name="product_class_id" value="" />
        <input type="hidden" name="quantity" value="" />
        <input type="hidden" name="rnd" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_rnd'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
    </form>
    
    <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>
            <p class="intro clear"><span class="attention"><span id="productscount"><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_linemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>件</span>の商品がございます。</p>

<!--▼ページナビ(本文)-->
<section class="pagenumberarea clearfix">
 <ul>
    <?php if (((is_array($_tmp=$this->_tpl_vars['orderby'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != 'price'): ?>
        <li><a href="javascript:fnChangeOrderby('price');" rel="external">価格順</a></li>
    <?php else: ?>
        <li class="on_number">価格順</li>
    <?php endif; ?>
    <?php if (((is_array($_tmp=$this->_tpl_vars['orderby'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != 'date'): ?>
        <li><a href="javascript:fnChangeOrderby('date');" rel="external">新着順</a></li>
    <?php else: ?>
        <li class="on_number">新着順</li>
    <?php endif; ?>
 </ul>
</section>
<!--▲ページナビ(本文)-->

<?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrProducts'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['arrProducts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['arrProducts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['arrProduct']):
        $this->_foreach['arrProducts']['iteration']++;
?>
    <?php $this->assign('id', ((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
    <?php $this->assign('arrErr', ((is_array($_tmp=$this->_tpl_vars['arrProduct']['arrErr'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
    <!--▼商品-->
    <div class="list_area clearfix">
     <!--★画像★-->
       <p class="listphoto"><img src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
resize_image.php?image=<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&amp;width=80&amp;height=80"  alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" /></p>
    
     <div class="listrightblock">
      <div class="statusArea">
      <!--▼商品ステータス-->
       <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['productStatus'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
            <ul class="status_icon">
                <?php $_from = ((is_array($_tmp=$this->_tpl_vars['productStatus'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['status']):
?> 
                     <li><?php echo ((is_array($_tmp=$this->_tpl_vars['arrSTATUS'][$this->_tpl_vars['status']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</li>
             <?php endforeach; endif; unset($_from); ?>
            </ul>
      <?php endif; ?>
      <!--▲商品ステータス-->
      </div>

      <!--★商品名★-->
        <h3><a rel="external" href="<?php echo ((is_array($_tmp=@P_DETAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('u', true, $_tmp) : smarty_modifier_u($_tmp)); ?>
" name="product<?php echo ((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="productName"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a></h3>
        
      <!--★商品価格★-->
        <p><span class="pricebox sale_price"><span class="mini">販売価格(税込):</span></span> 
        <span class="price"> 
            <span id="price02_default_<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
              <?php if (((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfCalcIncTax', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Helper_DB_Ex::sfCalcIncTax($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

              <?php else: ?>
                <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfCalcIncTax', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Helper_DB_Ex::sfCalcIncTax($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
～<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfCalcIncTax', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Helper_DB_Ex::sfCalcIncTax($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

              <?php endif; ?>
            </span><span id="price02_dynamic_<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
            </span>円
        </span></p>
      <!--★商品コメント価格★-->
         <p class="listcomment"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['main_list_comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
     </div>
     </div>
    <!--▲商品-->
    
<?php endforeach; else: ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frontparts/search_zero.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; unset($_from); ?>

<?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrProducts'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) < ((is_array($_tmp=$this->_tpl_vars['tpl_linemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
<div class="btn_area">
<p><a rel="external" href="javascript: void(0);" class="btn_more" id="btn_more_product" onClick="getProducts(<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['disp_number'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
); return false;">もっとみる(＋<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['disp_number'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
件)</a></p>
</div>
<?php endif; ?>
</section>
<!--▼検索バー -->
<section id="search_area">
<form method="get" action="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
products/list.php">
<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
<input type="search" name="name" id="search" value="" placeholder="キーワードを入力" class="searchbox" >
</form>
</section>
<!--▲検索バー -->
<!--▲CONTENTS-->

<script>
var pageNo = 2;
var url = "<?php echo ((is_array($_tmp=@P_DETAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
";
var imagePath = "<?php echo ((is_array($_tmp=((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfTrimURL', true, $_tmp) : SC_Utils_Ex::sfTrimURL($_tmp)); ?>
/";
var statusImagePath = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
";

function getProducts(limit) {
    $.mobile.pageLoading();
    var i = limit;
    //送信データを準備
    var postData = {};
    $('#form1').find(':input').each(function(){  
        postData[$(this).attr('name')] = $(this).val();  
    });
    postData["mode"] = "json";
    postData["pageno"] = pageNo;

    $.ajax({
        type: "POST",
           data: postData,
           cache: false,
           dataType: "json",
           error: function(XMLHttpRequest, textStatus, errorThrown){
            alert(textStatus);
            $.mobile.pageLoading(true);
           },
           success: function(result){
           
            var productStatus = result.productStatus;
             for (var j = 0; j < i; j++) {
                 if (result[j] != null) {
                     var product = result[j];
                     var productHtml = "";
                    var maxCnt = $(".list_area").length - 1;
                    var productEl = $(".list_area").get(maxCnt);
                    productEl = $(productEl).clone(true).insertAfter(productEl);
                    maxCnt++;
                    
                     //商品写真をセット
                     $($(".list_area .listphoto img").get(maxCnt)).attr({
                                                                 src: imagePath + product.main_list_image, 
                                                                 alt: product.name
                                                             });

                     //ステータスをセット
                     var statusAreaEl = $($(".list_area div.statusArea").get(maxCnt));
                    //ステータスの削除
                    statusAreaEl.empty();

                     if (productStatus[product.product_id] != null) {
                         var statusEl = '<ul class="status_icon">';
                         var statusCnt = productStatus[product.product_id].length;
                         for (var k = 0; k < statusCnt; k++) {
                             var status = productStatus[product.product_id][k];
                             var statusImgEl = '<li>' + status.status_name + '</li>' + "\n";
                             statusEl += statusImgEl;
                         }
                         statusEl += "</ul>";
                         statusAreaEl.append(statusEl);
                     }
                     
                     //商品名をセット
                     $($(".list_area a.productName").get(maxCnt)).text(product.name);
                     $($(".list_area a.productName").get(maxCnt)).attr("href", url + product.product_id);
                     
                     //販売価格をセット
                     var price = $($(".list_area span.price").get(maxCnt));
                    //販売価格をクリア
                     price.empty();
                     var priceVale = "";
                    //販売価格が範囲か判定
                     if (product.price02_min == product.price02_max) {
                         priceVale = product.price02_min_tax_format + '円';
                     } else {
                         priceVale = product.price02_min_tax_format + '～' + product.price02_max_tax_format + '円';
                     }
                     price.append(priceVale);
                     
                     //コメントをセット
                     $($(".list_area .listcomment").get(maxCnt)).text(product.main_list_comment);

                 }
             }
             pageNo++;

             //すべての商品を表示したか判定
             if (parseInt($("#productscount").text()) <= $(".list_area").length) {
                 $("#btn_more_product").hide();
             }
             $.mobile.pageLoading(true);
           }
});
}
</script>