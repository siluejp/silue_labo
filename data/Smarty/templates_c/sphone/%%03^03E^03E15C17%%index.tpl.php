<?php /* Smarty version 2.6.26, created on 2011-12-12 12:25:34
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/entry/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/entry/index.tpl', 24, false),array('modifier', 'h', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/entry/index.tpl', 24, false),)), $this); ?>
<!--▼CONTENTS-->
<section id="undercolumn">
       <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>
          <div class="intro">
            <p><span class="attention">※</span>は必須入力項目です。<br />
            入力後、一番下の「上記のお届け先に送る」ボタンを<br/>
            クリックしてください。<br/><br/>※ご注文の際の注意点<br/>
            ・携帯電話のアドレスの方は<br/>
            wat-fbshop@select-wat.com<br/>
            からの受信設定を解除していただけるようお願いします。<br/>
            ・PCアドレスの方は送信メールが迷惑メールフォルダに<br/>
            送られる可能性がございますのでご確認いただきますようお願いします。<br/>
            </p>
          </div>

      <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <input type="hidden" name="mode" value="confirm" />

         <dl class="form_entry">
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@SMARTPHONE_TEMPLATE_REALDIR)."frontparts/form_personal_input.tpl", 'smarty_include_vars' => array('flgFields' => 3,'emailMobile' => false,'prefix' => "")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         </dl>

         <div class="btn_area">
          <p><input type="submit" value="確認ページへ" class="btn data-role-none" alt="確認ページへ" name="confirm" id="confirm" /></p>
         </div>
        </form>
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