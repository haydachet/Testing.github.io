## フォームの送信先
push @mailto,'sample@sample.com';

## 自動返信メールの差出人名
$config{'fromname'} = 'キリロム工科大学';

## 自動返信メールの差出人メールアドレス
$config{'mailfrom'} = $mailto[0];

## 念のためBCC送信宛先 (解除する場合は下記1行をコメントアウト)
#$config{'bcc'} = $mailto[0];

## メールの差出人を固定 (0:無効 / 1:固定)
$config{'fixed'} = 0;

## 通し番号の書式
$config{'SerialFormat'} = '<date>%04d';

## 通し番号への加算値
$config{'SerialBoost'} = 0;

## サンクスページのURL(URLかsend.cgiから見た相対パス)
$config{'ThanksPage'} = '../../thanks.html?no=%s';

## 設置者に届くメールの件名
$config{'subject'} = 'キリロム工科大学お問い合せフォームから';

## 設置者に届くメールの本文整形
$_TEXT{'posted'} = <<'__posted_body__';
======================================================================
「キリロム工科大学」　お問い合わせフォームより送信されました。
======================================================================
+--------------------お問い合わせ内容-------------------------+

<_resbody_>

+-------------------------------------------------------------+
◇本件に関するお問い合わせ先
キリロム工科大学


---------------------------------------------------------------

__posted_body__

## ※※※！！！※※※！！！※※※！！！※※※！！！※※※！！！※※※
## 自動返信メールの件名 (有効にする場合は下記の行頭#を外してください。)
## ※※※！！！※※※！！！※※※！！！※※※！！！※※※！！！※※※

$config{"ReturnSubject"} = 'お問い合せありがとうございました';

## 自動返信メールの本文
$_TEXT{'responder'} = <<'__return_body__';

<_お名前_> 様

このたびは、キリロム工科大学Webサイトより
お問い合わせいただきましてありがとうございます。

お問い合わせいただい内容は次の通りです。
担当者より、あらためてご連絡させていただきますので
今しばらくお待ちください。

+--------------------お客様控え-------------------------------+

<_resbody_>

+-------------------------------------------------------------+
◇本件に関するお問い合わせ先
vキリロムネイチャーシティ

---------------------------------------------------------------

__return_body__



1;