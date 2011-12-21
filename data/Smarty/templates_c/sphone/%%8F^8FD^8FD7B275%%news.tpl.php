<?php /* Smarty version 2.6.26, created on 2011-10-11 20:10:38
         compiled from /home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/news.tpl', 27, false),array('modifier', 'h', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/news.tpl', 30, false),array('modifier', 'date_format', '/home/geneks/www/eccube-2.11.2/html/../data/Smarty/templates/sphone/frontparts/bloc/news.tpl', 31, false),)), $this); ?>
<!-- ▼新着情報 -->

<section id="news_area">
<h2 class="title_block">新着情報</h2>
<ul class="newslist">
  <?php unset($this->_sections['data']);
$this->_sections['data']['name'] = 'data';
$this->_sections['data']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrNews'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['data']['max'] = (int)3;
$this->_sections['data']['show'] = true;
if ($this->_sections['data']['max'] < 0)
    $this->_sections['data']['max'] = $this->_sections['data']['loop'];
$this->_sections['data']['step'] = 1;
$this->_sections['data']['start'] = $this->_sections['data']['step'] > 0 ? 0 : $this->_sections['data']['loop']-1;
if ($this->_sections['data']['show']) {
    $this->_sections['data']['total'] = min(ceil(($this->_sections['data']['step'] > 0 ? $this->_sections['data']['loop'] - $this->_sections['data']['start'] : $this->_sections['data']['start']+1)/abs($this->_sections['data']['step'])), $this->_sections['data']['max']);
    if ($this->_sections['data']['total'] == 0)
        $this->_sections['data']['show'] = false;
} else
    $this->_sections['data']['total'] = 0;
if ($this->_sections['data']['show']):

            for ($this->_sections['data']['index'] = $this->_sections['data']['start'], $this->_sections['data']['iteration'] = 1;
                 $this->_sections['data']['iteration'] <= $this->_sections['data']['total'];
                 $this->_sections['data']['index'] += $this->_sections['data']['step'], $this->_sections['data']['iteration']++):
$this->_sections['data']['rownum'] = $this->_sections['data']['iteration'];
$this->_sections['data']['index_prev'] = $this->_sections['data']['index'] - $this->_sections['data']['step'];
$this->_sections['data']['index_next'] = $this->_sections['data']['index'] + $this->_sections['data']['step'];
$this->_sections['data']['first']      = ($this->_sections['data']['iteration'] == 1);
$this->_sections['data']['last']       = ($this->_sections['data']['iteration'] == $this->_sections['data']['total']);
?>
  <li>
    <a id="windowcolumn<?php echo ((is_array($_tmp=$this->_sections['data']['index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" href="javascript:getNewsDetail(<?php echo ((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
);">
    <span class="news_title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span></a><br />
    <span class="news_date"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_date_disp'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年 %m月 %d日") : smarty_modifier_date_format($_tmp, "%Y年 %m月 %d日")); ?>
</span>
  </li>
  <?php endfor; endif; ?>
</ul>

<?php if (((is_array($_tmp=$this->_tpl_vars['newsCount'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 3): ?>
<div class="btn_area">
<p><a href="javascript:;" class="btn_more" id="btn_more_news" onclick="getNews(3); return false;">もっとみる(＋3件)</a></p>
</div>
<?php endif; ?>
</section>
<!-- ▲新着情報 -->


<script>
var newsPageNo = 2;

function getNews(limit) {
    $.mobile.pageLoading();
    var i = limit;

    $.ajax({
               url: "<?php echo ((is_array($_tmp=@HTTP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
frontparts/bloc/news.php",
               type: "POST",
               data: "mode=getList&pageno="+newsPageNo+"&disp_number="+i,
               cache: false,
               dataType: "json",
               error: function(XMLHttpRequest, textStatus, errorThrown){
                   alert(textStatus);
                   $.mobile.pageLoading(true);
               },
               success: function(result){
                   if (result.error) {
                       alert(result.error);
                   } else {
                       for (var j = 0; j < i; j++) {
                           if (result[j] != null) {
                               var news = result[j];
                               var maxCnt = $("#news_area ul.newslist li").length - 1;
                               var newsEl = $("#news_area ul.newslist li").get(maxCnt);
                               newsEl = $(newsEl).clone(true).insertAfter(newsEl);
                               maxCnt++;

                               //件名をセット
                               $($("#news_area ul.newslist li a span.news_title").get(maxCnt)).text(news.news_title);

                               //リンクをセット
                               $($("#news_area ul.newslist li a").get(maxCnt)).attr("href", "javascript:getNewsDetail(" + news.news_id + ");");

                               //年月をセット
                               var newsDateDispArray = news.news_date_disp.split("-"); //ハイフンで年月日を分解
                               var newsDateDisp = newsDateDispArray[0] + "年 " + newsDateDispArray[1] + "月 " + newsDateDispArray[2] + "日";
                               $($("#news_area ul.newslist li span.news_date").get(maxCnt)).text(newsDateDisp);
                           }
                       }

                       //すべての新着情報を表示したか判定
                       var newsPageCount = result.news_page_count;
                       if (parseInt(newsPageCount) <= newsPageNo) {
                           $("#btn_more_news").hide();
                       }

                       newsPageNo++;
                   }
                   $.mobile.pageLoading(true);
               }
           });
}

var loadingState = 0;
function getNewsDetail(newsId) {
    if (loadingState == 0) {
        $.mobile.pageLoading();
        loadingState = 1;
        $.ajax({
                   url: "<?php echo ((is_array($_tmp=@HTTP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
frontparts/bloc/news.php",
                   type: "GET",
                   data: "mode=getDetail&news_id="+newsId,
                   cache: false,
                   async: false,
                   dataType: "json",
                   error: function(XMLHttpRequest, textStatus, errorThrown){
                       alert(textStatus);
                       $.mobile.pageLoading(true);
                       loadingState = 0;
                   },
                   success: function(result){
                       if (result.error) {
                           alert(result.error);
                           $.mobile.pageLoading(true);
                           loadingState = 0;
                       }
                       else if (result[0] != null) {
                           var news = result[0];
                           var maxCnt = 0;

                           //件名をセット
                           $($("#windowcolumn dl.view_detail dt a").get(maxCnt)).text(news.news_title);
                           if (news.news_url != null) {
                               $($("#windowcolumn dl.view_detail dt a").get(maxCnt)).attr("href", news.news_url);
                           } else {
                               $($("#windowcolumn dl.view_detail dt a").get(maxCnt)).attr("href", "javascript:;");
                           }

                           //年月をセット
                           //var newsDateDispArray = news.news_date_disp.split("-"); //ハイフンで年月日を分解
                           //var newsDateDisp = newsDateDispArray[0] + "年 " + newsDateDispArray[1] + "月 " + newsDateDispArray[2] + "日";
                           //$($("#windowcolumn dl.view_detail dt").get(maxCnt)).text(newsDateDisp);

                           //コメントをセット(iphone4の場合、innerHTMLの再描画が行われない為、タイマーで無理やり再描画させる)
                           setTimeout( function() {
                               $("#newsComment").html(news.news_comment.replace(/\n/g,"<br />"));
                           }, 10);

                           $.mobile.changePage('#windowcolumn', 'slideup');
                           //ダイアログが開き終わるまで待機
                           setTimeout( function() {
                                           loadingState = 0;
                                           $.mobile.pageLoading(true);
                                       }, 1000);
                       }
                   }
               });
    }
}
</script>