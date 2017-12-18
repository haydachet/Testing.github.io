## 2007-08-15 mailform pro Ver.1.0 config file

##スクリプトのURL
$config{"url"} = 'http://' . $ENV{'SERVER_NAME'} . $ENV{'SCRIPT_NAME'};

##リファラードメインチェック / ドメインチェックをしない場合 0
$config{"domain"} = $ENV{'HTTP_HOST'};

##全文英語のスパム候補を除外(0:除外 / 1:除外しない)
$config{"english_spam"} = 0;

##リンク系スパム候補を除外(0:除外 / 1:除外しない)
$config{"link_spam"} = 0;

##sendmailのパス
$config{"sendmail"} = '/usr/sbin/sendmail';

##フォームからの送信先
@mailto = ('hara@e-creators.net');

##フォームからの差出人
$config{"mailform"} = $mailto[0];

##サンクスページのURL
$config{"thanks_url"} = 'http://www.ultra-l.net/contact/thanks.php';

##件名につける通し番号用ファイル
$config{"serial_file"} = 'commons/conversion.serial';

##自動返信メールに通し番号を付けるかどうか(1:つける / 0:つけない)
$config{"return_subject_serial"} = 1;

##ログファイルのパス / ログファイルを作らない場合 NULL
$config{"log_file"} = 'commons/log.dat';

##ログファイルのパスワード / ログファイルを作らない場合 NULL
$config{"password"} = '0123';

##コンバージョンレート算出用ログファイル
$config{"conversion_file"} = 'commons/conversion.log';

##設置者に届くメールの件名
$config{"subject"} = 'デザインスタジオエルお問い合せフォームから';

##設置者に届くメールの本文整形 / 自動生成の場合 NULL / 特殊整形文字 <resbody>:送信内容一式 / <date>:日付 / <serial>:通し番号 / <input_time>:入力秒
$config{"posted_body"} = <<'__posted_body__';
<date>
お問い合せフォームより以下のメールを受付ました。
────────────────────────────────────
受付番号：<serial>
入力時間：<input_time> 秒
<resbody>
────────────────────────────────────

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
Web事業部特設サイト「ウルトラエル」
http://www.ultra-l.net/
---------------------------------
有限会社デザインスタジオ・エル
担当：原弘始

〒381-0037 長野県長野市西和田2-14-30
TEL:026-241-8777 FAX:026-241-5170
http://www.e-creators.net/
hara@e-creators.net
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
__posted_body__

##送信者に届く自動返信メールの件名
$config{"return_subject"} = 'お問い合せありがとうございました';

##送信者に届く自動返信メールの本文 / 特殊整形文字 <resbody>:送信内容一式 / <date>:日付 / <serial>:通し番号 / <time>:入力秒
$config{"return_body"} = <<'__return_body__';
<お名前> 様
────────────────────────────────────

デザインスタジオ・エルWeb事業部です。
この度はお問い合せ頂き誠にありがとうございました。
改めて担当者よりご連絡をさせていただきます。

─ご送信内容の確認───────────────────────────
受付番号：<serial>
<resbody>
────────────────────────────────────

このメールに心当たりの無い場合は、お手数ですが
下記連絡先までお問い合わせください。

この度はお問い合わせ重ねてお礼申し上げます。

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
Web事業部特設サイト「ウルトラエル」
http://www.ultra-l.net/
---------------------------------
有限会社デザインスタジオ・エル
担当：原弘始

〒381-0037 長野県長野市西和田2-14-30
TEL:026-241-8777 FAX:026-241-5170
http://www.e-creators.net/
hara@e-creators.net
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
__return_body__

##モード設定 (0:デバッグ / 1:通常)
$config{"mode"} = 1;

##エラーコードの初期設定
$error{"code"} = 0;

##以下、初期設定項目の自動設定

@mailformENV = ('date','input_time','conversion_count','pv','unique','conversion_rate');
@mailformENVname = ('POST DATE','INPUT TIME','CONVERSION','PAGE VIEW','UNIQUE USERS','CONVERSION RATE');

($sec,$min,$hour,$day,$mon,$year) = localtime(time);$mon++;$year += 1900;
$form{"date"} = sprintf("%04d-%02d-%02d %02d:%02d:%02d",$year,$mon,$day,$hour,$min,$sec);
$download_file_name = sprintf("%04d-%02d-%02d.csv",$year,$mon,$day,$hour,$min,$sec);