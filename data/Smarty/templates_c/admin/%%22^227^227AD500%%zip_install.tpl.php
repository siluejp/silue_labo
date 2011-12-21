<?php /* Smarty version 2.6.26, created on 2011-09-26 14:52:30
         compiled from basis/zip_install.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'basis/zip_install.tpl', 24, false),array('modifier', 'strlen', 'basis/zip_install.tpl', 24, false),array('modifier', 'count', 'basis/zip_install.tpl', 24, false),array('modifier', 'h', 'basis/zip_install.tpl', 31, false),array('modifier', 'default', 'basis/zip_install.tpl', 54, false),)), $this); ?>
<?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) == 0 || count(((is_array($_tmp=$this->_tpl_vars['arrErr'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) >= 1): ?>
    <style type="text/css">

    </style>
    <form name="form1" id="form1" method="get" action="?" onsubmit="return false;">
        <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
        <input type="hidden" name="mode" value="">
        <p>保存されている郵便番号CSVの更新日時: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_csv_datetime'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
        <p>郵便番号CSVには <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_line'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 行のデータがあります。</p>
        <p>郵便番号DBには <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_count_mtb_zip'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 行のデータがあります。</p>
        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_count_mtb_zip'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 0): ?>
            <p class="attention">登録を行なってください。</p>
        <?php elseif (((is_array($_tmp=$this->_tpl_vars['tpl_line'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) <> ((is_array($_tmp=$this->_tpl_vars['tpl_count_mtb_zip'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <p class="attention">行数に差異があります。登録に異常がある恐れがあります。</p>
        <?php endif; ?>

        <div class="basis-zip-item info">
            <p>通常は、[自動登録] を利用してください。<br />
                ただし、タイムアウトしてしまう環境では、タイムアウトした後に [手動登録] を正常に完了するまで繰り返してください。</p>
        </div>

        <div class="basis-zip-item">
            <h2>自動登録</h2>
            <p>下の [削除] <?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_skip_update_csv'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>[郵便番号CSV更新] <?php endif; ?>[DB手動登録] を順に実行します。ただし、タイムアウトした場合、DBは元の状態に戻ります。</p>
            <p><a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('auto', '', ''); return false;"><span class="btn-next">自動登録</span></a></p>
        </div>

        <div class="basis-zip-item">
            <h2>DB手動登録</h2>
            <p>指定した行数から郵便番号を登録します。タイムアウトした場合、直前まで登録されます。</p>
            <p><a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('manual', '', ''); return false;"><span class="btn-next">手動登録</span></a>　開始行: <input type="text" name="startRowNum" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['startRowNum'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['tpl_count_mtb_zip']+1)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : smarty_modifier_default($_tmp, ((is_array($_tmp=$this->_tpl_vars['tpl_count_mtb_zip']+1)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="8"><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['startRowNum'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span></p>
        </div>

        <div class="basis-zip-item">
            <h2>郵便番号CSV更新</h2>
            <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_skip_update_csv'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                ご利用頂けません。
                <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_zip_download_url_empty'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <p class="attention">※ パラメーター ZIP_DOWNLOAD_URL が未設定です。</p>
                <?php endif; ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_zip_function_not_exists'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <p class="attention">※ PHP 拡張モジュール「zip」が無効です。</p>
                <?php endif; ?>
            <?php else: ?>
                <p>日本郵便の WEB サイトから、郵便番号CSVを取得します。</p>
                <p><a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('update_csv', '', ''); return false;"><span class="btn-next">更新</span></a><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['startRowNum'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span></p>
            <?php endif; ?>
        </div>

        <div class="basis-zip-item end">
            <h2>削除</h2>
            <p>全ての郵便番号を削除します。再登録するまで、住所自動入力は機能しなくなります。</p>
            <p><a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('delete', '', ''); return false;"><span class="btn-next">削除</span></a></p>
        </div>
    </form>
<?php else: ?>
    <iframe src="?mode=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&amp;exec=yes&amp;startRowNum=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['startRowNum'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" name="progress" height="200" width="750" frameborder="0"></iframe>
<?php endif; ?>