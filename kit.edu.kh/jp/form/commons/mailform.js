<!--
	//mailform include javascript ver5.0
	var mailformObj = new Object();
	mailformObj = "";
	function sendMail(obj){
		var caution = "";
		var errorflag = 0;
		var must = obj.elements["must_id"].defaultValue;
		var error_element_number = new Array();
		var email_address = "";
		for(i=0;i<obj.length;i++){
			var elementType = obj.elements[i].type;
			var errortext = obj.elements[i].name.replace(must,"");
			var must_flag = obj.elements[i].name.indexOf(must,0);
			if(errortext == "email"){
				email_address = obj.elements[i].value;
				if(must_flag > -1){
					chkMail = obj.elements[i].value;
					check = /.+@.+\..+/;
					if (!chkMail.match(check)){
						obj.elements[i].style.backgroundColor='#FFEEEE';
						obj.elements[i].style.color='#FF0000';
						obj.elements[i].style.borderColor='#FF0000';
						error_element_number.push(i);
						caution = caution + "メールアドレスが正しくありません。\n";
						errorflag = 2;
					}
					else{
						obj.elements[i].style.backgroundColor='#FFFFFF';
						obj.elements[i].style.borderColor='#999999';
						obj.elements[i].style.color='#000000';
					}
				}
				else if(obj.elements[i].value != ""){
					chkMail = obj.elements[i].value;
					check = /.+@.+\..+/;
					if (!chkMail.match(check)){
						obj.elements[i].style.backgroundColor='#FFEEEE';
						obj.elements[i].style.color='#FF0000';
						obj.elements[i].style.borderColor='#FF0000';
						error_element_number.push(i);
						caution = caution + "メールアドレスが正しくありません。\n";
						errorflag = 2;
					}
					else{
						obj.elements[i].style.backgroundColor='#FFFFFF';
						obj.elements[i].style.borderColor='#999999';
						obj.elements[i].style.color='#000000';
					}
				}
			}
			else if(errortext == "confirm_email"){
				if(email_address != ""){
					if(email_address != obj.elements[i].value){
						obj.elements[i].style.backgroundColor='#FFEEEE';
						obj.elements[i].style.color='#FF0000';
						obj.elements[i].style.borderColor='#FF0000';
						error_element_number.push(i);
						caution = caution + "確認用メールアドレスとメールアドレスが一致しません。\n";
						errorflag = 3;
					}
					else{
						obj.elements[i].style.backgroundColor='#FFFFFF';
						obj.elements[i].style.borderColor='#999999';
						obj.elements[i].style.color='#000000';
					}
				}
			}
			else if(must_flag > -1){
				if(elementType == "text" || elementType == "textarea"){
					if(obj.elements[i].value == "" || obj.elements[i].value == obj.elements[i].defaultValue){
						obj.elements[i].style.backgroundColor='#FFEEEE';
						obj.elements[i].style.borderColor='#FF0000';
						error_element_number.push(i);
						caution = caution + errortext +"が未入力です。\n";
						errorflag = 1;
					}
					else{
						obj.elements[i].style.backgroundColor='#FFFFFF';
						obj.elements[i].style.borderColor='#999999';
					}
				}
				else if(elementType == "checkbox"){
					if(obj.elements[i].checked == false){
						error_element_number.push(i);
						caution = caution + errortext +"がチェックされていません。\n";
						errorflag = 1;
					}
				}
				else if(elementType == "select-multiple" || elementType == "select-one"){
					if(obj.elements[i].selectedIndex > -1){
						var selectCnt = obj.elements[i].selectedIndex;
						if(obj.elements[i].options[selectCnt].value == ""){
							error_element_number.push(i);
							caution = caution + errortext +"が選択されていません。\n";
							errorflag = 1;
						}
					}
					else{
						error_element_number.push(i);
						caution = caution + errortext +"が選択されていません。\n";
						errorflag = 1;
					}
				}
			}
		}
		
		if(errorflag == 0){
			if(mailformObj != ""){
				for(i=0;i<obj.length ;i++){
					obj.elements[i].name = obj.elements[i].name.replace(must,"");
					if(obj.elements[i].type == "submit"){
						obj.elements[i].disabled = true;
					}
				}
				obj.submit();
			}
			else {
				selectedHidden(obj);
				openDashboard();
				var confirmMSG = "";
				for(i=0;i<obj.length ;i++){
					var elementsName = obj.elements[i].name.replace(must,"");
					if(obj.elements[i].value != ""){
						var printval = tagEscape(obj.elements[i].value);
						if((obj.elements[i].type == "text" || obj.elements[i].type == "textarea")&& elementsName != "confirm_email"){
							confirmMSG += "<tr><th nowrap width='100'><p>" + elementsName + "</p></th><td>" + printval + "</td></tr>";
						}
						else if(obj.elements[i].type == "select-one"){
							confirmMSG += "<tr><th nowrap><p>" + elementsName + "</p></th><td>" + printval + "</td></tr>";
						}
						else if(obj.elements[i].type == "radio" && (obj.elements[i].checked)){
							confirmMSG += "<tr><th nowrap><p>" + elementsName + "</p></th><td>" + printval + "</td></tr>";
						}
						else if(obj.elements[i].type == "checkbox" && (obj.elements[i].checked)){
							confirmMSG += "<tr><th nowrap><p>" + elementsName + "</p></th><td>" + printval + "</td></tr>";
						}
					}
				}
				confirmMSG = "<h2><img src='images/confirm.gif'></h2><table class='infield' style='width: 480px;'>" + confirmMSG + "</table><div class='buttons'><input type='image' value='上記内容で送信する' src='images/send.gif' onclick='sending();'> <input type='image' value='キャンセル' src='images/cancel.gif' onclick='sendCancel()'></div>"
				var ua = navigator.userAgent;
				var nWidth, nHeight;
				var nHit = ua.indexOf("MSIE");
				var bIE = (nHit >=  0);
				var bVer6 = (bIE && ua.substr(nHit+5, 1) == "6");
				var bStd = (document.compatMode && document.compatMode=="CSS1Compat");
				if (bIE) {
					if (bVer6 && bStd) {
						nWidth = document.documentElement.clientWidth;
						nHeight = document.documentElement.clientHeight;
					} else {
						nWidth = document.body.clientWidth;
						nHeight = document.body.clientHeight;
					}
				} else {
					nWidth = window.innerWidth;
					nHeight = window.innerHeight;
				}
				leftp = (nWidth - 640) / 2;
				if(document.all){
					document.all("confirmBody").innerHTML = confirmMSG;
					document.all("confirmBody").style.top = document.body.scrollTop + "px";
					document.all("confirmBody").style.left = leftp + "px";
					document.all("confirmBody").style.width = "640px";
				}
				else if(document.getElementById){
					document.getElementById("confirmBody").innerHTML = confirmMSG;
					document.getElementById("confirmBody").style.top = window.pageYOffset + "px";
					document.getElementById("confirmBody").style.left = leftp + "px";
					document.getElementById("confirmBody").style.width = "640px";
				}
				mailformObj = obj;
				return false;
			}
		}
		else{
			caution = "申し訳ございません。以下の点を再度ご確認ください。\n"+caution;
			alert(caution);
			obj.elements[error_element_number[0]].focus();
			return false;
		}
	}
	function tagEscape(getval){
		var befor = new Array("<",">");
		var after = new Array("&lt;","&gt;");
		for(ei=0;ei<befor.length;ei++){
			var temp = new Array();
			temp = getval.split(befor[ei]);
			getval = temp.join(after[ei]);
		}
		return getval;
	}
	function sending(){
		sendMail(mailformObj);
	}
	function sendCancel(){
		mailformObj = "";
		closeDashboard();
	}
	function debug(){
		alert(document.cookie);
	}
	
	var conservationKey = "(resume)";
	function keepField(formId){
		var setValue = "";
		var obj = document.forms[formId];
		var elementsList = new Array();
		for(i=0;i<obj.length;i++){
			if(obj.elements[i].type == "checkbox" || obj.elements[i].type == "radio"){
				if(obj.elements[i].checked){
					setValue += "1" + "&";
				}
				else{
					setValue += "0" + "&";
				}
			}
			else if(obj.elements[i].type == "text" || obj.elements[i].type == "textarea"){
				setValue += escape(obj.elements[i].value) + "&";
			}
			else if(obj.elements[i].type == "select-multiple"){
				var selected_multiple = new Array();
				for(multiplect=0;multiplect<obj.elements[i].length;multiplect++){
					if(obj.elements[i].options[multiplect].selected){
						selected_multiple.push(multiplect);
					}
				}
				setValue += selected_multiple.join(",") + "&";
			}
			else if(obj.elements[i].type == "select-one"){
				setValue += obj.elements[i].selectedIndex + "&";
			}
		}
		setValue = "mailform=" + conservationKey + setValue + conservationKey + ";expires=";
		document.cookie = setValue;
	}
	
	var postcode_formname = "";
	var postcode_elementname = "";
	function checkPostcode(getFormname,getPostcode,getElementname){
		data = document.forms[getFormname].elements[getPostcode].value;
		data = data.replace("-", "");
		postcode_formname = getFormname;
		postcode_elementname = getElementname;
		if(data.length > 6){
			window.open("commons/postcode/index.html?"+data,"postcodewindow","width=320,height=240,scrollbars=no,location=no");
		}
		else{
			alert("7桁の郵便番号を入力して下さい");
		}
	}
	function setPostcode(getAddress){
		document.forms[postcode_formname].elements[postcode_elementname].value = getAddress;
	}
	
	function openDashboard(){
		var ua = navigator.userAgent;
		var nWidth, nHeight;
		var nHit = ua.indexOf("MSIE");
		var bIE = (nHit >=  0);
		var bVer6 = (bIE && ua.substr(nHit+5, 1) == "6");
		var bStd = (document.compatMode && document.compatMode=="CSS1Compat");
		if (bIE) {
			if (bVer6 && bStd) {
				nWidth = document.documentElement.clientWidth;
				nHeight = document.documentElement.clientHeight;
			} else {
				nWidth = document.body.clientWidth;
				nHeight = document.body.clientHeight;
			}
		} else {
			nWidth = window.innerWidth;
			nHeight = window.innerHeight;
		}
		if(document.all){
			document.all("confirmWindow").style.visibility = "inherit";
			document.all("confirmWindow").style.width = nWidth + "px";
			document.all("confirmWindow").style.height = nHeight + "px";
			document.all("confirmBody").style.visibility = "inherit";
		}
		else if(document.getElementById){
			document.getElementById("confirmWindow").style.visibility = "inherit";
			document.getElementById("confirmWindow").style.width = nWidth + "px";
			document.getElementById("confirmWindow").style.height = nHeight + "px";
			document.getElementById("confirmBody").style.visibility = "inherit";
		}
		fadeOpacity('confirmWindow',1,0.8);
	}
	function closeDashboard(){
		fadeOpacity('confirmWindow',-1);
		if(document.all){
			document.all("confirmBody").style.visibility = "hidden";
			document.all("confirmBody").style.width = "1px";
		}
		else if(document.getElementById){
			document.getElementById("confirmBody").style.visibility = "hidden";
			document.getElementById("confirmBody").style.width = "1px";
		}
		selectedVisible()
	}
	function scrollCloseDashboard(){
		if(adflag != 1){
			closeDashboard();
			adflag=1;
		}
	}
	function fadeOpacity(layName,swt,stopOpacity){
		if(!window.fadeOpacity[layName])
			fadeOpacity[layName] =0 
		if(!arguments[1]) swt = -1
		if(swt==-1) var f = "9876543210"
		else if(swt==1) var f = "0123456789"
		else var f = "9876543210"
		if(!arguments[2] && swt==-1)		 stopOpacity = 0
		else if(!arguments[2] && swt==1) stopOpacity = 10
		if( fadeOpacity[layName] < f.length-1 ){
			var opa = f.charAt(fadeOpacity[layName])/10
			if( opa == stopOpacity ){
				setOpacity(layName,stopOpacity)
				fadeOpacity[layName] = 0
				return
			}
			setOpacity(layName,opa)
			fadeOpacity[layName]++
			setTimeout('fadeOpacity("'+layName+'","'+swt+'","'+stopOpacity+'")',10)
		} else {
			setOpacity(layName,stopOpacity)
			fadeOpacity[layName] = 0
			if(document.all){
				document.all(layName).style.visibility = "hidden";
				document.all(layName).style.width = "1px";
				document.all(layName).style.height = "1px";
			}
			else if(document.getElementById){
				document.getElementById(layName).style.visibility = "hidden";
				document.getElementById(layName).style.width = "1px";
				document.getElementById(layName).style.height = "1px";
			}
		}
	}
	function setOpacity(layName,arg) {
		var ua = navigator.userAgent
		
		if( document.layers ) {
			if(arg > 0) document.layers[layName].visibility='visible'
			else if(arg==0) document.layers[layName].visibility='hidden'
		}
		else if(navigator.appVersion.indexOf("Safari") > -1){
			document.getElementById(layName).style.opacity = arg
		}
		else if( ua.indexOf('Mac_PowerPC') !=-1 && document.all ) {
			if(arg > 0)		 document.all(layName).style.visibility='visible'
			else if(arg==0) document.all(layName).style.visibility='hidden'
		}
		else if(document.all) {
			document.all(layName).style.filter="alpha(opacity=0)"
			document.all(layName).filters.alpha.Opacity	= (arg * 100)
		}
		else if(ua.indexOf('Gecko')!=-1)
				document.getElementById(layName).style.MozOpacity = arg
		
	}
	function setBGCOLOR(layName,color){
		if(color=='')(!!window.opera)?color='white':color='transparent';
		if(document.getElementById)
			document.getElementById(layName).style.backgroundColor =color
		else if(document.all)
			document.all(layName).style.backgroundColor=color
		else if(document.layers){
			if(color=='transparent')color=null
				document.layers[layName].bgColor=color 
		}
	}
	function showLAYER(layName){
		if(document.getElementById)
			document.getElementById(layName).style.visibility='visible'
		else if(document.all) document.all(layName).style.visibility='visible'
		else if(document.layers) document.layers[layName].visibility='show'
	}
	var focusBackgroundColor = "";
	var focusBorderColor = "";
	function activefocus(obj){
		focusBackgroundColor = obj.style.backgroundColor;
		focusBorderColor = obj.style.borderColor;
		obj.style.backgroundColor = "#FFF5D6";
		obj.style.borderColor = "#FF9900";
	}
	function lostfocus(obj){
		obj.style.backgroundColor = focusBackgroundColor;
		obj.style.borderColor = focusBorderColor;
		formatCharset(obj);
	}
	function inputTyping(formNames,kanaElements,keyCode){
		var alphabet = new Array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		var kana = new Array("ア","イ","ウ","エ","オ","カ","キ","ク","ケ","コ","サ","シ","ス","セ","ソ",
							 "タ","チ","ツ","テ","ト","ナ","ニ","ヌ","ネ","ノ","ハ","ヒ","フ","ヘ","ホ",
							 "マ","ミ","ム","メ","モ","ヤ","ユ","ヨ","ラ","リ","ル","レ","ロ","ワ","ヲ",
							 "ン",
							 "ガ","ギ","グ","ゲ","ゴ","ザ","ジ","ズ","ゼ","ゾ","ダ","ヂ","ヅ","デ","ド",
							 "バ","ビ","ブ","ベ","ボ","パ","ピ","プ","ペ","ポ","ジャ","ジュ","ジョ",
							 "ッp","ッk","ッs","ッt","ッh","ッm","ッy","ッr","ッw","ッd","ッg","ッz","ッb",
							 "ャ","ュ","ョ","ァ","ィ","ゥ","ェ","ォ","チャ","チュ","チョ",
							 "シ","ー");
		var roma = new Array("a","i","u","e","o","ka","ki","ku","ke","ko","sa","si","su","se","so","ta",
							 "ti","tu","te","to","na","ni","nu","ne","no","ha","hi","hu","he","ho","ma",
							 "mi","mu","me","mo","ya","yu","yo","ra","ri","ru","re","ro","wa","wo","nn",
							 "ga","gi","gu","ge","go","za","zi","du","ze","zo","da","di","du","de","do",
							 "ba","bi","bu","be","bo","pa","pi","pu","pe","po","zya","zyu","zyo",
							 "pp","kk","ss","tt","hh","mm","yy","rr","ww","dd","gg","zz","bb",
							 "xya","xyu","xyo","xa","xi","xu","xe","xo","tya","tyu","tyo","shi","-");
		if(keyCode > 64 && keyCode < 91){
			window.document.forms[formNames].elements[kanaElements].value = window.document.forms[formNames].elements[kanaElements].value + alphabet[keyCode - 65];
			for(i=roma.length;i > -1;i--){
				window.document.forms[formNames].elements[kanaElements].value = window.document.forms[formNames].elements[kanaElements].value.replace(roma[i],kana[i]);
			}
		}
		else if(keyCode == 8){
			kanavalue = window.document.forms[formNames].elements[kanaElements].value;
			window.document.forms[formNames].elements[kanaElements].value = kanavalue.substring(0,kanavalue.length - 1);
		}
		else if(keyCode == 45){
			window.document.forms[formNames].elements[kanaElements].value = window.document.forms[formNames].elements[kanaElements].value + "-";
			for(i=roma.length;i > -1;i--){
				window.document.forms[formNames].elements[kanaElements].value = window.document.forms[formNames].elements[kanaElements].value.replace(roma[i],kana[i]);
			}
		}
		return false;
	}
	var hiddenObject = "";
	function selectedHidden(obj){
		hiddenObject = obj
		for(i=0;i<obj.length;i++){
			if(obj.elements[i].type == "select-multiple" || obj.elements[i].type == "select-one"){
				if(document.all){
					obj.elements[i].style.visibility = "hidden";
				}
				else if(document.getElementById){
					obj.elements[i].style.visibility = "hidden";
				}
			}
		}
	}
	function selectedVisible(){
		var obj = hiddenObject;
		for(i=0;i<obj.length;i++){
			if(obj.elements[i].type == "select-multiple" || obj.elements[i].type == "select-one"){
				if(document.all){
					obj.elements[i].style.visibility = "visible";
				}
				else if(document.getElementById){
					obj.elements[i].style.visibility = "visible";
				}
			}
		}
	}
	function timer(){
		document.forms["mailform"].elements["input_time"].value = parseInt(document.forms["mailform"].elements["input_time"].value) + 1;
	}
	//////////////////////////////////////////////
	// ajax getaddress
	//////////////////////////////////////////////
	var postcode_form_Id = "";
	var postcode_ELM = "";
	var feedback_govm = "";
	var feedback_city = "";
	var feedback_town = "";
	function postQuery(formId,postcodeELM,fb_govm,fb_city,fb_town){
		var obj = document.forms[formId];
		postcode_form_Id = formId;
		postcode_ELM = postcodeELM;
		feedback_govm = fb_govm;
		feedback_city = fb_city;
		feedback_town = fb_town;
		var border = new Array("-", "－", "ー", "―", "ｰ", "‐");
		for(var i = 0; i < border.length; i++){
			obj.elements[postcodeELM].value = obj.elements[postcodeELM].value.replace(border[i], "");
		}
		if(obj.elements[postcodeELM].value == "" || !(figureChecked(obj.elements[postcodeELM].value))){
			alert("郵便番号が間違っています。");
		}
		else{
			obj.elements[postcodeELM].value = figureChecked(obj.elements[postcodeELM].value);
			var query = obj.elements[postcodeELM].value;
			httpObj = createXMLHttpRequest();
			httpObj.onreadystatechange = getQuery;
			httpObj.open("GET","commons/getpostcode.cgi?"+encodeURI(query),true);
			httpObj.send(null);
		}
		return false;
	}
	function getQuery(){
		if ((httpObj.readyState == 4) && (httpObj.status == 200)) {
			var obj = document.forms[postcode_form_Id];
			var getAddress = decodeURI(httpObj.responseText);
			var getAddressGroup = new Array();
			getAddressGroup = getAddress.split(",");
			if(getAddressGroup.length == 3){
				//都道府県 getAddressGroup[0];
				//市区町村 getAddressGroup[1];
				//丁目番地 getAddressGroup[2];
				obj.elements[feedback_govm].value = getAddressGroup[0];
				obj.elements[feedback_city].value = getAddressGroup[1];
				obj.elements[feedback_town].value = getAddressGroup[2];
			}
		}
	}
	function formatCharset(obj){
		var befor = new Array("ｶﾞ","ｷﾞ","ｸﾞ","ｹﾞ","ｺﾞ","ｻﾞ","ｼﾞ","ｽﾞ","ｾﾞ","ｿﾞ","ﾀﾞ","ﾁﾞ",
			"ﾂﾞ","ﾃﾞ","ﾄﾞ","ﾊﾞ","ﾋﾞ","ﾌﾞ","ﾍﾞ","ﾎﾞ","ﾊﾟ","ﾋﾟ","ﾌﾟ","ﾍﾟ","ﾎﾟ","ｦ","ｧ",
			"ｨ","ｩ","ｪ","ｫ","ｬ","ｭ","ｮ","ｯ","ｰ","ｱ","ｲ","ｳ","ｴ","ｵ","ｶ","ｷ","ｸ","ｹ",
			"ｺ","ｻ","ｼ","ｽ","ｾ","ｿ","ﾀ","ﾁ","ﾂ","ﾃ","ﾄ","ﾅ","ﾆ","ﾇ","ﾈ","ﾉ","ﾊ","ﾋ",
			"ﾌ","ﾍ","ﾎ","ﾏ","ﾐ","ﾑ","ﾒ","ﾓ","ﾔ","ﾕ","ﾖ","ﾗ","ﾘ","ﾙ","ﾚ","ﾛ","ﾜ","ﾝ",
			'Ａ','Ｂ','Ｃ','Ｄ','Ｅ','Ｆ','Ｇ','Ｈ','Ｉ','Ｊ','Ｋ','Ｌ','Ｍ','Ｎ','Ｏ','Ｐ','Ｑ','Ｒ','Ｓ','Ｔ','Ｕ','Ｖ','Ｗ','Ｘ','Ｙ','Ｚ','ａ','ｂ','ｃ','ｄ','ｅ','ｆ','ｇ','ｈ','ｉ','ｊ','Ｋ','ｌ','ｍ','ｎ','ｏ','ｐ','ｑ','ｒ','ｓ','ｔ','ｕ','ｖ','ｗ','ｘ','ｙ','ｚ','＠','－','ー','０','１','２','３','４','５','６','７','８','９','．');
		var after = new Array("ガ","ギ","グ","ゲ","ゴ","ザ","ジ","ズ","ゼ","ゾ","ダ","ヂ",
			"ヅ","デ","ド","バ","ビ","ブ","ベ","ボ","パ","ピ","プ","ペ","ポ","ヲ","ァ",
			"ィ","ゥ","ェ","ォ","ャ","ュ","ョ","ッ","ー","ア","イ","ウ","エ","オ","カ",
			"キ","ク","ケ","コ","サ","シ","ス","セ","ソ","タ","チ","ツ","テ","ト","ナ",
			"ニ","ヌ","ネ","ノ","ハ","ヒ","フ","ヘ","ホ","マ","ミ","ム","メ","モ","ヤ",
			"ユ","ヨ","ラ","リ","ル","レ","ロ","ワ","ン",
			'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','@','-','-','0','1','2','3','4','5','6','7','8','9','.');
		for(i=0;i<befor.length;i++){
			var temp = new Array();
			temp = obj.value.split(befor[i]);
			obj.value = temp.join(after[i]);
		}
	}
	function figureChecked(figure){
		var single_char = new Array('0','1','2','3','4','5','6','7','8','9','-');
		var double_char = new Array('０','１','２','３','４','５','６','７','８','９','－');
		for(i=0;i<single_char.length;i++){
			var temp = new Array();
			temp = figure.split(double_char[i]);
			figure = temp.join(single_char[i]);
		}
		var figureMatch = figure.match(/[^0-9]/g);
		if(figureMatch){
			return false;
		}
		else{
			return figure;
		}
	}
	function createXMLHttp() {
		try {
			return new ActiveXObject ("Microsoft.XMLHTTP");
		}catch(e){
			try {
				return new XMLHttpRequest();
			}catch(e) {
				return null;
			}
		}
		return null;
	}
	function createXMLHttpRequest(){
		var XMLhttpObject = null;
		try{
			XMLhttpObject = new XMLHttpRequest();
		}
		catch(e){
			try{
				XMLhttpObject = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e){
				try{
					XMLhttpObject = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e){
					return null;
				}
			}
		}
		return XMLhttpObject;
	}
	//////////////////////////////////////////////
	function startupMailform(){
		var formId = 'mailform';
		var obj = document.forms[formId];
		var valueList = new Array();
		var selectedLinks = new Array();
		var elcount = 0;
		if(document.cookie && document.cookie.indexOf(conservationKey) > -1){
			valueList = document.cookie.split(conservationKey);
			valueList = valueList[1].split("&");
			for(i=0;i<obj.length;i++){
				if(obj.elements[i].type == "checkbox" || obj.elements[i].type == "radio"){
					if(valueList[elcount] == 1){
						obj.elements[i].checked = true;
					}
					else{
						obj.elements[i].checked = false;
					}
					elcount++;
				}
				else if(obj.elements[i].type == "text" || obj.elements[i].type == "textarea"){
					obj.elements[i].value = unescape(valueList[elcount]);
					elcount++;
				}
				else if(obj.elements[i].type == "select-multiple"){
					var selected_multiple = new Array();
					selected_multiple = valueList[elcount].split(",");
					for(multiplect=0;multiplect<selected_multiple.length;multiplect++){
						if(selected_multiple[multiplect] != ""){
							obj.elements[i].options[selected_multiple[multiplect]].selected = true;
						}
					}
					elcount++;
				}
				else if(obj.elements[i].type == "select-one"){
					obj.elements[i].options[valueList[elcount]].selected = true;
					elcount++;
				}
			}
		}
		timer_handle = setInterval("timer()",1000);
	}
	
	window.onload = function(){
		startupMailform();
	}
//-->