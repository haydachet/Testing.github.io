<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
  <link rel="stylesheet" href="formstyle.css" type="text/css" />
</head>
<body>
  <div id="wrapper">
  
   <div id="mailform">
         <!--↓このコードを入れておくと、div#maf_phase_confirm_inner内に確認画面用のHTMLが作成されます-->
         <!--↓確認画面をカスタマイズしたい場合はこれを入れてください。(CSSで調整するだけでよければ、このコードは不要です)-->
         <div id="mfp_phase_confirm">
          <div id="mfp_phase_confirm_inner"></div>
        </div>
        <!--↑確認画面ここまで-->
        
        <form id="mailformpro" action="mailformpro/mailformpro.cgi" method="POST">
          <dl>
            <dt class="mfp">お問い合わせの種類</dt>
            <dd class="mfp">
              <select name="お問い合わせの種類"  class=" wideM" >
              <option value="" selected="selected">- 選択して下さい -</option>
              <option value="見積もりを依頼したい">見積もりを依頼したい</option>
              <option value="過去の実績を教えてほしい">過去の実績を教えてほしい</option>
              <option value="制作を依頼したい">制作を依頼したい</option>
              <option value="採用について">採用について</option>
              <option value="その他">その他</option>
              </select>
            </dd>
     
            <dt class="mfp">お問い合わせ内容</dt>
            <dd class="mfp"><textarea name="お問い合わせ内容" rows="10" cols="60" class=" wideL"  placeholder="お問い合わせ内容をお書きください"></textarea></dd>
               
            <dt class="mfp must">お名前</dt>
            <dd class="mfp">
               <input type="text" name="お名前" data-kana="フリガナ" size="20" class=" wideM"  required="required" placeholder="（例）山田太郎" />
            </dd>
            <dt class="mfp must">フリガナ</dt>
            <dd class="mfp"><input type="text" name="フリガナ" size="20" class=" wideM"  data-charcheck="kana"  required="required" placeholder="（例）ヤマダタロウ"/></dd>
          
            <dt class="mfp">会社名</dt>
            <dd class="mfp">
              <input type="text" name="会社名" size="20" class=" wideM"  placeholder="（例）有限会社デザインスタジオ・エル" />
            </dd>
          
          
            <dt class="mfp">URL</dt>
            <dd class="mfp">
              <input type="text" name="URL" size="20" class=" wideM"  placeholder="（例）http://www.e-creators.net" />
            </dd>
            
            <input type="hidden" name="生年月日" data-join="生年+年 +生月+月 +生日+日 " value="" />
            <dt class="mfp">生年月日</dt>
            <dd class="mfp">
              <select name="生年">
                <?php
                  for($i=1900;$i<=2020;$i++){
                     echo "<option>$i</option>";
                  }
                  echo "</select>";
                ?>
              </select>年
              
              <select name="生月">
                <?php
                  for($i=1;$i<=12;$i++){
                     echo "<option>$i</option>";
                  }
                  echo "</select>";
                ?>
              </select>月
              
              <select name="生日">
                <?php
                  for($i=1;$i<=31;$i++){
                     echo "<option>$i</option>";
                  }
                  echo "</select>";
                ?>
              </select>日
            </dd>
            <dt class="mfp">性別</dt>
            <dd class="mfp">
              <ul class="horizontal_list">
                <li><label><input type="radio" name="性別" value="男" /> 男性</label></li>
                <li><label><input type="radio" name="性別" value="女" /> 女性</label></li>
                </ul>
                <div id="errormsg_性別" class="mfp_err"></div>
            </dd>
            <dt class="mfp">郵便番号</dt>
              <dd class="mfp">
              <input type="hidden" name="ご住所" data-unjoin="〒+郵便番号+\n+都道府県+市区町村+丁目番地" value="" />
              <input type="text" name="郵便番号" size="30" class=" wideSS" data-address="都道府県,市区町村,市区町村" autocomplete="off" />
            <dt class="mfp">ご住所</dt>
            <dd class="mfp">
              <ul class="address">
                <li><span>都道府県</span>
                    <select name="都道府県" class=" wideS">
                      <option value="" selected="selected">- 選択して下さい -</option>
                      <optgroup label="北海道・東北地方">
                        <option value="北海道">北海道</option>
                        <option value="青森県">青森県</option>
                        <option value="岩手県">岩手県</option>
                        <option value="秋田県">秋田県</option>
                        <option value="宮城県">宮城県</option>
                        <option value="山形県">山形県</option>
                        <option value="福島県">福島県</option>
                      </optgroup>
                      <optgroup label="関東地方">
                        <option value="栃木県">栃木県</option>
                        <option value="群馬県">群馬県</option>
                        <option value="茨城県">茨城県</option>
                        <option value="埼玉県">埼玉県</option>
                        <option value="東京都">東京都</option>
                        <option value="千葉県">千葉県</option>
                        <option value="神奈川県">神奈川県</option>
                      </optgroup>
                      <optgroup label="中部地方">
                        <option value="山梨県">山梨県</option>
                        <option value="長野県">長野県</option>
                        <option value="新潟県">新潟県</option>
                        <option value="富山県">富山県</option>
                        <option value="石川県">石川県</option>
                        <option value="福井県">福井県</option>
                        <option value="静岡県">静岡県</option>
                        <option value="岐阜県">岐阜県</option>
                        <option value="愛知県">愛知県</option>
                      </optgroup>
                      <optgroup label="近畿地方">
                        <option value="三重県">三重県</option>
                        <option value="滋賀県">滋賀県</option>
                        <option value="京都府">京都府</option>
                        <option value="大阪府">大阪府</option>
                        <option value="兵庫県">兵庫県</option>
                        <option value="奈良県">奈良県</option>
                        <option value="和歌山県">和歌山県</option>
                      </optgroup>
                      <optgroup label="四国地方">
                        <option value="徳島県">徳島県</option>
                        <option value="香川県">香川県</option>
                        <option value="愛媛県">愛媛県</option>
                        <option value="高知県">高知県</option>
                      </optgroup>
                      <optgroup label="中国地方">
                        <option value="鳥取県">鳥取県</option>
                        <option value="島根県">島根県</option>
                        <option value="岡山県">岡山県</option>
                        <option value="広島県">広島県</option>
                        <option value="山口県">山口県</option>
                      </optgroup>
                      <optgroup label="九州・沖縄地方">
                        <option value="福岡県">福岡県</option>
                        <option value="佐賀県">佐賀県</option>
                        <option value="長崎県">長崎県</option>
                        <option value="大分県">大分県</option>
                        <option value="熊本県">熊本県</option>
                        <option value="宮崎県">宮崎県</option>
                        <option value="鹿児島県">鹿児島県</option>
                        <option value="沖縄県">沖縄県</option>
                      </optgroup>
                    </select>
                  </li>
                  <li><span>市区町村</span> <input type="text" name="市区町村" size="50" class=" wideM" /></li>
                  <li><span>丁目番地</span> <input type="text" name="丁目番地" size="50" class=" wideM"  /></li>
                </ul>
              </dd>
              <dt class="mfp">電話番号</dt>
              <dd class="mfp"><input type="tel" data-type="tel" name="電話番号" size="16" class=" wideM" data-min="9" placeholder="半角英数"/></dd>

              <dt class="mfp must">メールアドレス</dt>
              <dd class="mfp"><input type="email" data-type="email" name="email" size="40" class=" wideM"  required="required" placeholder="半角英数"/></dd>
            
              <dt class="mfp must">メールアドレス(確認)</dt>
              <dd class="mfp"><input type="email" data-type="email" name="confirm_email" class=" wideM" data-post-disable="1" size="40" required /></dd>
              <dt class="mfp must">送信確認</dt>
              <dd class="mfp"><label><input type="checkbox" required data-exc="1" name="送信確認" value="送信チェック済み" /> 上記送信内容を確認したらチェックを入れてください</label></dd>
          </dl>
          <div class="mfp_buttons">
            <button type="submit">入力内容を確認する</button>
          </div>
        </form>
        <script type="text/javascript" id="mfpjs" src="mailformpro/mailformpro.cgi" charset="UTF-8"></script>
    </div>
  </div>
</body>
</html>