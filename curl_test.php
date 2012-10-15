<?php
$aid = $_GET['aid'];
$sid = $_GET['sid'];
$vc = $_GET['vc'];

$header[]="User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.1.6) Gecko/20091201 Firefox/3.5.6";
$header[]="Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
$header[]="Accept-Language: zh-cn,zh;q=0.5";
$header[]="Accept-Charset: GB2312,utf-8;q=0.7,*;q=0.7";
$header[]="Keep-Alive: 300";
$header[]="Connection: keep-alive";
$header[]="Cookie: SessionID=".$sid;

$request = 'comment=very good&login_name=xinlangwangyou&login_pass=&check='.$vc.'&comment_anonyous=anonyous&need_refresh=false&article_id='.$aid.'&uid=&fromtype=commentadd&anonymity=true';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://control.blog.sina.com.cn/admin/comment/comment_post.php?version=7&domain=1');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
$ret = curl_exec($ch);
curl_close($ch);
echo $ret;

$num = preg_match('/"code".*?"(.*?)"/is', $ret, $result);
if ($num==1){
	echo $result[1];
}else{
	echo 'error';
}


















?>