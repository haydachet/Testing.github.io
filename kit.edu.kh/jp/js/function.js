$(function() {
	var appID = 'KITinstitute'; // Facebookのアカウント名
	var accessToken = '1616798271714058|6RO516LgyiyQt1Ml7CfyHT9PLzo'; //Facebookのアクセストークン
	
	$(document).ready(function() {
		getFacebookFeed();
		if(document.getElementById('qa')) {
			getQAlist(false);
		}
		if(document.getElementById('constructed')) {
			getPricelist();
		}
	});
	$(window).load(function() {
		$('body').addClass('loaded');
		setupSlide();
		adjustContentHeight();
		setFrameHeight();
	});
	$(window).resize(function() {
		adjustContentHeight();
		setFrameHeight();
	});
    $(window).scroll(function() {
		if($(window).scrollTop() == 0) {
			$('.inview').removeClass('inview');
		}
		else {
		}
    });
	function setupSlide() {
		if(document.getElementById('slider')) {
		$(".slide-cell:nth-child(n+2)").css('display', 'block');
		$('#slider').flickity({
			cellAlign:'center',
			contain:true,
			wrapAround: true,
			pageDots: false,
			autoPlay: false,
			pauseAutoPlayOnHover: false
		});
		}
		if(document.getElementById('mainslider')) {
		$(".main-slide-cell:nth-child(n+2)").css('display', 'block');
		$('#mainslider').flickity({
			cellAlign:'center',
			contain:true,
			wrapAround: true,
			pageDots: false,
			autoPlay: false,
			pauseAutoPlayOnHover: false
		});
		}
	}
	
	/*smooth scroll*/
	$('a[href^="#"]').click(function(){
	  var speed = 400; 
	  var href= jQuery(this).attr("href");
	  var target = jQuery(href == "#" || href == "" ? 'html' : href);
	  var position = target.offset().top;
	  $("html, body").animate({scrollTop:position}, speed, 'swing');
	  $('#global_navi').removeClass('open');
	  $('.btn_open').removeClass('open');
	  return false;
   });
   
   $('.btn_open').click(function(e) {
		$(this).toggleClass('open');
		var target;
		var targetIDs= $(this).data('target');
		var targetID = targetIDs.split(',');

		for (var i=0; i<targetID.length; i++) {
			target = document.getElementById(targetID[i]);
			$(target).toggleClass('open');
		}
		
		var targetIDs_close= $(this).data('close');
		if(targetIDs_close) {
			var targetID_close = targetIDs_close.split(',');
			for (i=0; i<targetID_close.length; i++) {
				target = document.getElementById(targetID_close[i]);
				$(target).removeClass('open');
			}
		}
		
		e.stopPropagation();
	});
	$('.btn_close').click(function(e) {
		var target;
		var targetIDs= $(this).data('target');
		var targetID = targetIDs.split(',');
		for (var i=0; i<targetID.length; i++) {
			target = document.getElementById(targetID[i]);
			$(target).removeClass('open');
		}
		e.stopPropagation();
	});
	$('.tobble_open_contents').click(function(e) {
		e.stopPropagation();
	});
	$(document).click(function() {
		var menus = document.getElementsByClassName('btn_open');
		var target, targetIDs, targetID;
		for(var j = 0; j < menus.length; j++) {
			$(menus[j]).removeClass('open');
			targetIDs = $(menus[j]).data('target');
			if(targetIDs) {
				targetID = targetIDs.split(',');
				for (var i=0; i<targetID.length; i++) {
					target = document.getElementById(targetID[i]);
					$(target).removeClass('open');
				}
			}
		}
	});
	
	function setFrameHeight() {
		var frame, $frames = $('.form-frame');
		var innerHeight;
		for(var i=0; i< $frames.length; i++) {
			$frame = $frames.get(i);
			console.log($frame);
			innerHeight = $frame.contentWindow.document.body.scrollHeight + 50;
			$($frame).attr('height', innerHeight + 'px');
		}
	}

	function getFacebookFeed() {
        $.ajax({
            type: "GET",
            url: "https://graph.facebook.com/"+appID+"/feed?fields=permalink_url,message,story,full_picture,created_time&locale=ja_JP,id&access_token="+accessToken,
            dataType: "json",
            success: function(json) {
                json = json.data;
                var Feed = "<ul>\n";
                for (var i = 0; i < 3; i++) {
                    var text = json[i].message;
                    var img = json[i].full_picture;
                    var story = json[i].story;
                    var link = json[i].permalink_url;
					
                    if (!story) {
                        Feed += '<li><a href="' + link + '" target="_blank"><div class="conts-img"><img src="'+img+'"></div>' + '<p class="text-overflow">' + limitTextLength(text) + '</p></a></li>\n';
                    } else {
                        Feed += '<li><a href="' + link + '" target="_blank"><div class="conts-img"><img src="'+img+'"></div>' + '<p class="text-overflow">' + limitTextLength(text) + '</p></a></li>\n';
                    }
                }
                Feed += '</ul>\n';
                $("#facebook-output").append(Feed);
            }
        });
    }
    function limitTextLength(longtext){
	 var beforeText = String(longtext);
      var cutFigure = '30'; // カットする文字数
      var afterTxt = ' …'; // 文字カット後に表示するテキスト

      var textLength = beforeText.length;
      var textTrim = beforeText.substr(0,(cutFigure));
 
          if(cutFigure < textLength) {
              afterTxt = textTrim + afterTxt;
          } else if(cutFigure >= textLength) {
              afterTxt = textTrim;
          }
      return afterTxt;
    }


	function adjustContentHeight() {
		if(isHome()) {
			$('.post-banner .banner').tile();
			$('.main-banner .banner').tile();
			$('.flow-online li').tile();
			$('.list-ppt h2').tile();
			$('.list-tel .conts-tel').tile();
			$('.contact-head .column-max2 > *').tile();
		}
	}
	function isHome() {
		var ret = ($('body').attr('id')=='home') ? true : false;
		return ret;
	}
	
	$('#select-qa').change(function(){
		getQAlist(true);
	});
	function getQAlist(selectKind) {
	    $.getJSON("https://script.google.com/macros/s/AKfycbx09yQM6dYS1bkhH9oufzVnDPmFVjPRQP0w9QU01IFNFi47Hvum/exec", function(data) {
			var qaid = -1;
			var qakind = '';
			//URLから表示対象のQAのNoを取得
			if(!selectKind) {
				var pair=location.search.substring(1).split('&');
				for(var i=0;pair[i];i++) {
					var kv = pair[i].split('=');// kvはkey-value
					if(kv[0] == 'qaid') {
						qaid = kv[1];
						console.log('qaid: '+qaid);
					}
					else if(kv[0] == 'qakind') {
						qakind = kv[1];
						console.log('qakind: '+decodeURIComponent(qakind));
					}
				}
			}
			if(qakind !== '') {
				$('#select-qa').val(decodeURIComponent(qakind));
			}

			var kind = String('種類');
			var no = String('No.');
			var question = String('よくある質問');
			var answer = String('回答');
			var targetkind, target= $("#qa");
			var len = data.length;
			
			//URLでQAのNoが指定されていたら、そのカテゴリの質問一覧を表示
			if(qaid >= 0) {
				var newLine = data.filter(function(item, index){
				  if (item[no] == qaid) {
					  return true;
				  }
				});
				$('#select-qa').val(newLine[0][kind]);
			}
			targetkind =  $('#select-qa').val();
			
			target.empty();
			target.append('<dl class="list-qa">');
			for(var i = 0; i < len; i++) {
				if(data[i][kind] == targetkind) {
				  var questiondata = data[i][question];
				  questiondata = questiondata.replace(/\r?\n/g, '<br>');
				  var answerdata = data[i][answer];
				  answerdata = answerdata.replace(/\r?\n/g, '<br>');
				  if((question!=='') && (answer !=='')) {
					target.children('dl').append($('<dt id="qa'+data[i][no]+'">').html(questiondata)).append($("<dd>").html(answerdata)).trigger('create');
				  }
				}
			}
			
			
			qakind = $('#select-qa').val();
			if(qaid >= 0 ) {
			  var target = $("#qa"+qaid);
			  var position = target.offset().top - $('header').outerHeight(false);
			  $("html, body").animate({scrollTop:position}, 400, 'swing');
			  window.history.replaceState(null,null, '?qaid='+qaid+'&qakind='+targetkind);
			  return false;
			}
			else {
			  window.history.replaceState(null,null, '?qakind='+targetkind);
			}
    	});
	}
	
	$('#select-realestate').change(function(){
		getPricelist(true);
	});
	function getPricelist(selectkind) {
	    $.getJSON("https://script.google.com/macros/s/AKfycbyxJtrP_KzA1xuK1xcBrjV-lK1LSZGmZMNhbc6nPLRcPQBkwbs/exec", function(data) {
	
			if(!selectkind) {
				var rakind = '';
				//URLから表示対象の不動産の種別を取得
				var pair=location.search.substring(1).split('&');
				for(var i=0;pair[i];i++) {
					var kv = pair[i].split('=');// kvはkey-value
					if(kv[0] == 'rakind') {
						rakind = kv[1];
					}
				}
				if(rakind !== '') {
					$('#select-realestate').val(decodeURIComponent(rakind));
				}
			}
			var target,new_elem;
			var targetkind = $('#select-realestate').val();
			var constructed = $("#constructed"); //建築済み一覧
			var contract = $("#contract");//建築前一覧
			var kind = String('不動産種別');
			var beforeFlag = String('建築開始前フラグ');
			var unittxt, txt;
			var cnt_constructed = 0, cnt_contract = 0;
			
			
				var len = data.length;
				
				if(len > 0) {
					
				var jsonitems = Object.keys(data[0]); 
		
				var head = '<tr>';
				for(var j= 0; j < jsonitems.length; j++) {
					if(jsonitems[j]!==beforeFlag) {
						txt = jsonitems[j];
						txt = txt.replace(/\r?\n/g, '<br>');
						head += '<th>'+txt+'</th>';
					}
				}
				head += '</tr>';
				
				
				$('.nodata-txt').remove();
				constructed.removeClass('nodata');
				constructed.removeClass('nodata');
				
				constructed.empty();
				contract.empty();
				constructed.append('<table class="table-std">');
				contract.append('<table class="table-std">');
				
				$(head).appendTo(constructed.children('table'));
				$(head).appendTo(contract.children('table'));
				
				for(var i = 0; i < len; i++) {
					//建築前フラグをチェック
					if(data[i][beforeFlag] == 1) {
						target= contract;
					}
					else {
						target=constructed;
					}
					
					//不動産種別をチェック
					if(data[i][kind]==targetkind) {
						if( target == contract) { cnt_contract++; }
						if( target == constructed) { cnt_constructed++; }
						
						
						new_elem = $('<tr></tr>').appendTo(target.children('table'));
						for(var j= 0; j < jsonitems.length; j++) {
							if(jsonitems[j]!==beforeFlag) {
                txt = data[i][jsonitems[j]];
                
								//学生寮リースバック利回り　か　リゾートリースバック利回り　なら単位(%)を追加
								if((jsonitems[j] =="学生寮リースバック利回り") || (jsonitems[j]=="リゾートリースバック利回り")) {
								  txt = Math.floor(data[i][jsonitems[j]] * 10000) / 100 ;
                   txt = txt +'%';
                }
								txt = String(txt).replace(/\r?\n/g, '<br>');
								new_elem.append($("<td>").html(txt));
							}
						}
						target.children('table').append(new_elem).trigger('create');
					}
				}
				
				if(cnt_constructed == 0) {
					constructed.addClass('nodata');
					constructed.after('<p class="nodata-txt">現在、該当する物件はありません</p>').trigger('create');
				}
				if(cnt_contract==0) {
					contract.addClass('nodata');
					contract.after('<p class="nodata-txt">現在、該当する物件はありません</p>').trigger('create');
				}
				
			}
			rakind = $('#select-realestate').val();
			window.history.replaceState(null,null, '?rakind='+rakind);
    	});
		
		
		
		getPricelistImg();//セレクトボックス下の画像を設定
		return false;
	}
	function getPricelistImg() {
		var targetkind = $('#select-realestate').val();
		var img, imghtml;
		
		//セレクトボックスのvalが[Type R]と[Type R2]の場合の画像
		if((targetkind == "Type R") || (targetkind == "Type R2")) {
			img = "./img/orchidehill_site.jpg";
		}
		//セレクトボックスのvalがそれ以外の場合の画像
		else { 
			img = "./img/jasminehill_site.jpg";
		}
		
		imghtml = '<img src="'+img+'">';
		$('#ra-map').empty();
		$('#ra-map').append(imghtml).trigger('create');
		
	}
});