<?php /* Smarty version 2.6.26, created on 2011-10-11 20:10:38
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/recommend.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/recommend.tpl', 23, false),array('modifier', 'sfNoImageMainList', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/recommend.tpl', 30, false),array('modifier', 'h', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/recommend.tpl', 30, false),array('modifier', 'u', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/recommend.tpl', 32, false),array('modifier', 'nl2br', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/recommend.tpl', 33, false),array('modifier', 'sfCalcIncTax', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/recommend.tpl', 36, false),array('modifier', 'number_format', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/recommend.tpl', 36, false),array('modifier', 'count', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/recommend.tpl', 41, false),)), $this); ?>
<!-- ▼おすすめ商品 -->
<?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrBestProducts'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
<section id="recomend_area" class="mainImageInit">
<h2>おすすめ商品</h2>
<ul>
<?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['step'] = ((int)2) == 0 ? 1 : (int)2;
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['start'] = $this->_sections['cnt']['step'] > 0 ? 0 : $this->_sections['cnt']['loop']-1;
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = min(ceil(($this->_sections['cnt']['step'] > 0 ? $this->_sections['cnt']['loop'] - $this->_sections['cnt']['start'] : $this->_sections['cnt']['start']+1)/abs($this->_sections['cnt']['step'])), $this->_sections['cnt']['max']);
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
        <li id="mainImage<?php echo ((is_array($_tmp=$this->_sections['cnt']['index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
            <div class="recomendblock clearfix">
              <img src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
resize_image.php?image=<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_sections['cnt']['index']]['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&amp;width=80&amp;height=80" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_sections['cnt']['index']]['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
              <div class="productContents">
                <h3><a rel="external" href="<?php echo ((is_array($_tmp=@P_DETAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_sections['cnt']['index']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('u', true, $_tmp) : smarty_modifier_u($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_sections['cnt']['index']]['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a></h3>
                  <p class="mini comment"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_sections['cnt']['index']]['comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
                    <?php $this->assign('price01', ($this->_tpl_vars['arrBestProducts'][$this->_sections['cnt']['index']]['price01_min'])); ?>
                    <?php $this->assign('price02', ($this->_tpl_vars['arrBestProducts'][$this->_sections['cnt']['index']]['price02_min'])); ?>
                  <p class="sale_price"><span class="mini"><!--<span class="mini">-->販売価格(税込):<!--</span>--></span><span class="price"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['price02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfCalcIncTax', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Helper_DB_Ex::sfCalcIncTax($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 円</span></p> 
              </div>
            </div>
        </li>
        <?php $this->assign('cnt2', ($this->_sections['cnt']['iteration']*$this->_sections['cnt']['step']-1)); ?>
        <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_tpl_vars['cnt2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp)) > 0): ?>
          <li id="mainImage<?php echo ((is_array($_tmp=$this->_tpl_vars['cnt2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
              <div class="recomendblock clearfix">
                <img src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
resize_image.php?image=<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_tpl_vars['cnt2']]['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&amp;width=80&amp;height=80" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_tpl_vars['cnt2']]['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                <div class="productContents">
                  <h3><a rel="external" href="<?php echo ((is_array($_tmp=@P_DETAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_tpl_vars['cnt2']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('u', true, $_tmp) : smarty_modifier_u($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_tpl_vars['cnt2']]['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a></h3>
                    <p class="mini comment"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrBestProducts'][$this->_tpl_vars['cnt2']]['comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
                      <?php $this->assign('price01', ($this->_tpl_vars['arrBestProducts'][$this->_tpl_vars['cnt2']]['price01_min'])); ?>
                      <?php $this->assign('price02', ($this->_tpl_vars['arrBestProducts'][$this->_tpl_vars['cnt2']]['price02_min'])); ?>
                    <p class="sale_price"><span class="mini"><!--<span class="mini">-->販売価格(税込):</span><!--</span>--><span class="price"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['price02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfCalcIncTax', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Helper_DB_Ex::sfCalcIncTax($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 円</span></p> 
                </div>
              </div>
          </li>
        <?php endif; ?>
    <?php endfor; endif; ?>
</ul>    
</section>
<?php endif; ?>
<!-- ▲おすすめ商品 -->

<script type="application/javascript"> 
<!--//
$(function(){
    $('#recomend_area ul li').flickSlide({target:'#recomend_area>ul', duration:5000});
});
//-->
</script>