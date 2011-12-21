<?php /* Smarty version 2.6.26, created on 2011-10-04 20:00:27
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/navi_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/navi_header.tpl', 25, false),array('modifier', 'sfTrimURL', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/navi_header.tpl', 33, false),array('modifier', 'h', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/navi_header.tpl', 33, false),array('modifier', 'number_format', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/navi_header.tpl', 35, false),array('modifier', 'default', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/navi_header.tpl', 35, false),)), $this); ?>

<nav class="header_navi">
<ul>
 <li class="mypage"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/header/btn_header_mypage.png" onclick="fnShowPopupmyPage(this)" width="30" height="20" alt="マイページ" /></li>
 <li class="cart"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/header/btn_header_cart.png" onclick="fnShowPopupCart(this)" width="30" height="20" alt="カート" /></li>
</ul>
</nav>
<!--!!空ボックス -->
<div class="popup_mypage">
    <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
        <p><span class="mini">ようこそ</span><br />
        <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfTrimURL', true, $_tmp) : SC_Utils_Ex::sfTrimURL($_tmp)); ?>
/mypage/login.php" rel="external"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
さん</a></p>
        <?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
            <p>所持ポイント<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_user_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
pt</p>
        <?php endif; ?>
    <?php else: ?>
        <p>ようこそ<br />
        ゲストさん</p>
        <p><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfTrimURL', true, $_tmp) : SC_Utils_Ex::sfTrimURL($_tmp)); ?>
/mypage/login.php" rel="external">ログイン</a></p>
    <?php endif; ?>
</div>

<div class="popup_cart">
<?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrCartList'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
    <h2><a rel="external" href="<?php echo ((is_array($_tmp=((is_array($_tmp=@CART_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
">カートの中</a></h2>
    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrCartList'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key']):
?>
        <div class="product_type">
            <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrCartList'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 1): ?>
            <p><span class="product_type">[<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key']['productTypeName'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
]</span></p>
            <?php endif; ?>
            <p><span class="mini">商品数:</span><span class="quantity"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</span>点<br />
                <span class="mini">合計:</span><span class="money"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key']['totalInctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</span>円(税込)</p>
            <hr class="dashed" />
            <?php if (((is_array($_tmp=$this->_tpl_vars['freeRule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0 && ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key']['productTypeId'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)) != ((is_array($_tmp=@PRODUCT_TYPE_DOWNLOAD)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['key']['delivFree'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                    <p class="attention free_money_area">あと<span class="free_money"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key']['delivFree'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</span>円で送料無料</p>
                <?php else: ?>
                    <p class="attention free_money_area">現在、送料無料です</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; endif; unset($_from); ?>
<?php else: ?>
   ※ 現在カート内に商品はございません。
<?php endif; ?>
</div>


<script>
var stateMyPage = 0;
var stateCart = 0;
function fnShowPopupmyPage(el) {
    $("div.popup_mypage").css("left", $(el).offset().left - $("div.popup_mypage").width() + 15);
    $("div.popup_mypage").toggle();
    //表示状態の更新
    if (stateMyPage == 0) {
        stateMyPage = 1;
    } else {
        stateMyPage = 0;
    }
    
    //カート情報の非表示化
    if (stateCart == 1) {
        $("div.popup_cart").hide();
        stateCart = 0;
    }
}

function fnShowPopupCart(el) {
    $("div.popup_cart").css("left", $(el).offset().left - $("div.popup_cart").width() + 15);
    $("div.popup_cart").toggle();
    //表示状態の更新
    if (stateCart == 0) {
        stateCart = 1;
    } else {
        stateCart = 0;
    }
    
    //カート情報の非表示化
    if (stateMyPage == 1) {
        $("div.popup_mypage").hide();
        stateMyPage = 0;
    }
}

</script>