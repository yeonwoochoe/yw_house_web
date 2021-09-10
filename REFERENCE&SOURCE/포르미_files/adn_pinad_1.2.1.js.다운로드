function fnc_adn_jQuery_info(callbackFunc) {
    var adn_jquery_url = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js';
    var adn_jQuery_chk_cnt = 0;
    var adn_status_jquery = false;
    var load_script_status = false;
    var load_script_start = false;
    if (!window.jQuery) {
        var adn_jquery_yet = setInterval(function() {
            if (window.jQuery) {
                clearInterval(adn_jquery_yet);
                callbackFunc()
            }
            if(adn_jQuery_chk_cnt<10) adn_jQuery_chk_cnt++;
            else{
            	
            	if(load_script_status==false && load_script_start==false)
            	{
            		load_script_start = true;
	            	var c=document.createElement("script");
								c.type="text/javascript";
								c.charset='UTF-8';
								c.defer=true;
								if(c.readyState){
									c.onreadystatechange=function(){
										if(c.readyState=="loaded" || c.readyState=="complete"){
											c.onreadystatechange=null;
											load_script_status = true;
										}
									}
								}else{
									c.onload=function(){
										load_script_status = true;
									}
								}
								c.src=adn_jquery_url;
								document.getElementsByTagName("head")[0].appendChild(c);
								c.onerror=function(){
									load_script_status = false;
								}
								
							}
            }
        }, 100)
    } else {
        callbackFunc()
    }
}

function fnc_adn_health_info(callbackFunc)
{
	var _adn_chk_todays = new Date();
	var _adn_chk_dd = _adn_chk_todays.getDate();
	var _adn_chk_mm =  (_adn_chk_todays.getMonth()+1);
	var _adn_chk_yyyy = _adn_chk_todays.getFullYear();
	var _adn_chk_hours = _adn_chk_todays.getHours();
	var _adn_chk_mins = _adn_chk_todays.getMinutes();

	
	var _adn_health_chk_min = parseInt(_adn_chk_mins)+10;
	if(parseInt(_adn_health_chk_min)>=60) {
		_adn_health_chk_min = _adn_health_chk_min-60;
		_adn_chk_hours = parseInt(_adn_chk_hours)+1;
	}
	if(parseInt(_adn_chk_hours)>23)
	{
		_adn_chk_hours = 0;
		_adn_chk_mm = parseInt(_adn_chk_mm)+1;
	}
	if(parseInt(_adn_chk_dd)<10) _adn_chk_dd='0'+_adn_chk_dd;
	if(parseInt(_adn_chk_mm)<10) _adn_chk_mm='0'+_adn_chk_mm;	
	
	if(parseInt(_adn_chk_hours)<10) _adn_chk_hours='0'+_adn_chk_hours;
	
	if(parseInt(_adn_chk_mins)<10) _adn_chk_mins='0'+_adn_chk_mins;
	
	if(parseInt(_adn_health_chk_min)<10) _adn_health_chk_min='0'+_adn_health_chk_min;
	
	_adn_chk_full_date = _adn_chk_yyyy+_adn_chk_mm+_adn_chk_dd+_adn_chk_hours+_adn_chk_mins;
	_adn_health_chk_full_date = _adn_chk_yyyy+_adn_chk_mm+_adn_chk_dd+_adn_chk_hours+_adn_health_chk_min;
	
	var adn_health_val = localStorage.getItem('adn_health_chk_time');
	if (typeof(adn_health_val) != "undefined" && adn_health_val != null) 
	{
		if(parseInt(_adn_chk_full_date) < parseInt(adn_health_val)) return null;
	}
	
	if (window.ActiveXObject) {
		try { 
			var xhr = new ActiveXObject("Msxml2.XMLHTTP"); 
		} catch(e) { 
			try { 
				var xhr = new ActiveXObject("Microsoft.XMLHTTP"); 
			} catch(e1) { 
				var xhr = null; 
			} 
		}
	} else if (window.XMLHttpRequest) { 
		var xhr = new XMLHttpRequest(); 
	} else {
		var xhr = null;
	}
	

	

	try{
			
		if(adn_health_flag!="loading" && adn_health_flag!="ok"){
			if (typeof xhr  !== "null") {
				xhr.open('GET', 'https://kn.acrosspf.com/adn_health_jsonp_chk.ad?g=tags&t='+Math.floor(Math.random()*99999999999));
				xhr.timeout = 10000;
				
				xhr.onload = function () {
					
					if(xhr.readyState == 4){
						if(xhr.status == 200){
							adn_health_flag = "ok";
							localStorage.removeItem('adn_health_chk_time');
				  		callbackFunc();	
				  	}
				  }
				};
				xhr.onerror = function() {
					adn_health_flag = "error";
					localStorage.setItem('adn_health_chk_time', _adn_health_chk_full_date);
				  xhr.abort();
				};
				xhr.ontimeout = function (e) {
					adn_health_flag = "timeout";
					localStorage.setItem('adn_health_chk_time', _adn_health_chk_full_date);
				  xhr.abort();
				};
				adn_health_flag = "loading";
				xhr.send(null);
			}
		}
		else if(adn_health_flag=="ok"){
			localStorage.removeItem('adn_health_chk_time');
  		callbackFunc();	
		}
		else if(adn_health_flag=="loading"){
        var adn_health_yet = setInterval(function() {
            if (adn_health_flag=="ok") {
                clearInterval(adn_health_yet);
                callbackFunc()
            }
        }, 100)
    }
			
	}catch(e){}
}

if(typeof adn_health_flag=="undefined") var adn_health_flag = "";

var _adn_pinad_hours = "24";
var d = new Date();
var now_hours = d.getHours();
var is_pinad_status = true;
var _adn_pinad_r = document.referrer;
var _adn_pinad_h = document.location.pathname;
var _adn_pinad_effect = 0;
var _adn_pinad_auto_close_rate = "";
var _adn_pinad_close_rate = "";
var _adn_pinad_poz_x = "";
var _adn_pinad_poz_y = "";
var _adn_pinad_title_slide = "";
var _adn_pinad_title_slideIndex = 0;
var _adn_pinad_timer = "";
var _adn_pinad_search_keyword = "";

function closing_pinad() {
	if(_adn_pinad_effect==0) $("#adn_pinad_wrap").fadeOut(0);
	else  $("#adn_pinad_wrap").fadeOut('slow');
  $("#adn_pinad_wrap").css({"display":"none"});                	
	if (_adn_pinad_hours != "0") {
		fn_adn_pinad_setCookie("adnPinAd", "1", _adn_pinad_hours)
	}
}

function js_adn_pinad_today() {
    $("#adn_pinad_wrap").hide();
    if (document.getElementById('pinad_today').checked) {
        fn_adn_pinad_setCookie("adnPinAd", "9", 24 - parseInt(now_hours))
    } else {
         if (_adn_pinad_hours != "0") {
            fn_adn_panel_setCookie("adnPinAd", "1", _adn_pinad_hours)
         }
    }
}

function fn_adn_pinad_getCookie(a) {
    var b = a + "=";
    var x = 0;
    while (x <= document.cookie.length) {
        var y = (x + b.length);
        if (document.cookie.substring(x, y) == b) {
            if ((endOfCookie = document.cookie.indexOf(";", y)) == -1) {
                endOfCookie = document.cookie.length
            }
            return unescape(document.cookie.substring(y, endOfCookie))
        }
        x = document.cookie.indexOf(" ", x) + 1;
        if (x == 0) {
            break
        }
    }
    return ""
}

function fn_adn_pinad_setCookie(a, b, c) {
    var d = new Date();
    d.setTime(d.getTime() + (1000 * 60 * 60 * c));
    document.cookie = a + "=" + b + ";path=/;expires=" + d.toGMTString() + ";"
}


function adn_pinad_frm_send(c, d) {
    var a = document.createElement("iframe");
    a.frameBorder = "0";
    a.scrolling = "no";
    a.width = "0px";
    a.height = "0px";
    a.setAttribute("src", d);
    document.getElementById(c).appendChild(a)
}


function adn_pinad_objectValues(obj) {
    var res = [];
    for (var i in obj) {
        if (obj.hasOwnProperty(i)) {
            res.push(obj[i])
        }
    }
    return res
}

function fnc_pinad_getParameterByName(name, url) {
	if (!url) url = window.location.href;
	name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	results = regex.exec(url);
	if(!results) return null;
	if(!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function adn_pinad_carousel() {
  var i;
  var x = document.getElementsByClassName("adn_pinad_title_Slides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  _adn_pinad_title_slideIndex++;
  if (_adn_pinad_title_slideIndex > x.length) {_adn_pinad_title_slideIndex = 1} 
  x[_adn_pinad_title_slideIndex-1].style.display = "block"; 
  setTimeout(adn_pinad_carousel, 1500); 
}

function adn_pinad_getScrollXY() {
    var scrOfX = 0,
        scrOfY = 0;
    if (typeof(window.pageYOffset) == 'number') {
        scrOfY = window.pageYOffset;
        scrOfX = window.pageXOffset
    } else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
        scrOfY = document.body.scrollTop;
        scrOfX = document.body.scrollLeft
    } else if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
        scrOfY = document.documentElement.scrollTop;
        scrOfX = document.documentElement.scrollLeft
    }
    return {
        x: scrOfX,
        y: scrOfY
    }
}

		
fnc_adn_jQuery_info(function() {
	$("<link/>", { rel: "stylesheet",	type: "text/css",	charset: "utf-8",	href: "https://ff.adteip.net/css/across_adn_mainad.css"}).appendTo("head");
	fnc_adn_health_info(function() {
		try {
		    if (_adn_pinad_r.indexOf("naver.com") != -1) {
		        var q = fnc_pinad_getParameterByName("query", _adn_pinad_r);
		        if (q) {
		            
		            var _adn_pinad_k = function() {
		                try {
		                    if (q != '') {
		                        q = q.replace(/\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-/g, "");
		                        _adn_pinad_search_keyword = q;
		                        q = encodeURIComponent(q);
		                        if (q != '') {
		                            var u = 'https://kn.acrosspf.com/adn_k.ad?k=' + q;
		                            $.ajax({
		                                type: 'get',
		                                url: u,
		                                data: {
		                                    todo: "jsonp"
		                                },
		                                dataType: "jsonp",
		                                crossDomain: true,
		                                cache: false,
		                                success: function(d) {}
		                            })
		                        }
		                    }
		                } catch (e) {}
		            };
		            $(document).ready(_adn_pinad_k)
		        }
		    } else if (_adn_pinad_r.indexOf("daum.net") != -1) {
		        var q = fnc_pinad_getParameterByName("q", _adn_pinad_r);
		        if (q) {
		            
		            var _adn_pinad_k = function() {
		                try {
		                    if (q != '') {
		                        q = q.replace(/\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-/g, "");
		                        _adn_pinad_search_keyword = q;
		                        q = encodeURIComponent(q);
		                        if (q != '') {
		                            var u = 'https://kn.acrosspf.com/adn_k.ad?k=' + q;
		                            $.ajax({
		                                type: 'get',
		                                url: u,
		                                data: {
		                                    todo: "jsonp"
		                                },
		                                dataType: "jsonp",
		                                crossDomain: true,
		                                cache: false,
		                                success: function(d) {}
		                            })
		                        }
		                    }
		                } catch (e) {}
		            };
		            $(document).ready(_adn_pinad_k)
		        }
		    } else if (_adn_pinad_r.indexOf("nate.com") != -1) {
		        var q = fnc_pinad_getParameterByName("q", _adn_pinad_r);
		        if (q) {
		            
		            var _adn_pinad_k = function() {
		                try {
		                    if (q != '') {
		                        q = q.replace(/\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-/g, "");
		                        _adn_pinad_search_keyword = q;
		                        q = encodeURIComponent(q);
		                        if (q != '') {
		                            var u = 'https://kn.acrosspf.com/adn_k.ad?k=' + q;
		                            $.ajax({
		                                type: 'get',
		                                url: u,
		                                data: {
		                                    todo: "jsonp"
		                                },
		                                dataType: "jsonp",
		                                crossDomain: true,
		                                cache: false,
		                                success: function(d) {}
		                            })
		                        }
		                    }
		                } catch (e) {}
		            };
		            $(document).ready(_adn_pinad_k)
		        }
		    } else if (_adn_pinad_r.indexOf("google.co.kr") != -1) {
		        var q = fnc_pinad_getParameterByName("q", _adn_pinad_r);
		        if (q) {
		            var _adn_pinad_k = function() {
		                try {
		                    if (q != '') {
		                        q = q.replace(/\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-/g, "");
		                         _adn_pinad_search_keyword = q;
		                        q = encodeURIComponent(q);
		                        if (q != '') {
		                            var u = 'https://kn.acrosspf.com/adn_k.ad?k=' + q;
		                            $.ajax({
		                                type: 'get',
		                                url: u,
		                                data: {
		                                    todo: "jsonp"
		                                },
		                                dataType: "jsonp",
		                                crossDomain: true,
		                                cache: false,
		                                success: function(d) {}
		                            })
		                        }
		                    }
		                } catch (e) {}
		            };
		            $(document).ready(_adn_pinad_k)
		        }
		    } else if (_adn_pinad_r.indexOf("zum.com") != -1) {
		        var q = fnc_pinad_getParameterByName("query", _adn_pinad_r);
		        if (q) {
		            
		            var _adn_pinad_k = function() {
		                try {
		                    if (q != '') {
		                        q = q.replace(/\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-/g, "");
		                        _adn_pinad_search_keyword = q;
		                        q = encodeURIComponent(q);
		                        if (q != '') {
		                            var u = 'https://kn.acrosspf.com/adn_k.ad?k=' + q;
		                            $.ajax({
		                                type: 'get',
		                                url: u,
		                                data: {
		                                    todo: "jsonp"
		                                },
		                                dataType: "jsonp",
		                                crossDomain: true,
		                                cache: false,
		                                success: function(d) {}
		                            })
		                        }
		                    }
		                } catch (e) {}
		            };
		            $(document).ready(_adn_pinad_k)
		        }
		    }
		} catch (exception) {}
			
		if(/Mobi/.test(navigator.userAgent)==false)
		{
		    var a = fn_adn_pinad_getCookie("adnPinAd");
		    if (a == "") {
		   
					
					
					try {
					    var ui = adn_pinad_objectValues(adn_pinad_param)[0][0]["ui"];
					    var ci = adn_pinad_objectValues(adn_pinad_param)[0][0]["ci"];
					    var gi = adn_pinad_objectValues(adn_pinad_param)[0][0]["gi"];
					    var p_url = "https://kn.acrosspf.com/adn_mainpanel_jsonp_1.0.3.ad?u=" + ui + "&ci=" + ci + "&gi=" + gi  + "&k=" + encodeURIComponent(_adn_pinad_search_keyword) + "&ti=" + Math.floor(Math.random() * 99999999999)
					} catch (e) {}
					if (!document.getElementById("adn_pinad_wrap")) {
					    var _adn_tmp_div = document.createElement("DIV");
					    _adn_tmp_div.setAttribute("id", "adn_pinad_wrap");
					    document.getElementsByTagName("body")[0].appendChild(_adn_tmp_div)
					}
				  try {
				      $.ajax({
				          url: p_url,
				          dataType: 'jsonp',
				          success: function(data) {
				              if (data.status == "0") {
				                  $("#adn_pinad_wrap").hide();
				                  is_pinad_status = false
				              } else {
				                  is_pinad_status = true;
				                  _adn_pinad_close_rate = data.pinad_close_rate;
				                  _adn_pinad_auto_close_rate = data.pinad_auto_close_rate;
				                  _adn_pinad_effect = data.pinad_effect;
				                  _adn_pinad_poz_x = data.pinad_poz_x;
				                  _adn_pinad_poz_y = data.pinad_poz_y;
				                  _adn_pinad_title_slide = data.pinad_title_slide;
				                  
				                  $("#adn_pinad_wrap").css({"position":"absolute","display":"none", "z-index":"9999999"});
											    
				                  $("#adn_pinad_wrap").html(data.pinad_infos);
				                  if(_adn_pinad_auto_close_rate!="" && parseInt(_adn_pinad_auto_close_rate)>0)
				                  {
										        var adn_pinad_autoclosed_yet = setInterval(function() {
										        	
																if(_adn_pinad_effect==0) $("#adn_pinad_wrap").fadeOut(0);
																else  $("#adn_pinad_wrap").fadeOut('slow');
																$("#adn_pinad_wrap").css({"display":"none"});
																
										            clearInterval(adn_pinad_autoclosed_yet);
										        }, parseInt(_adn_pinad_auto_close_rate)*1000);
				                  }
													if(is_pinad_status==true)
													{
											      if(_adn_pinad_title_slide!=0)
											      {
															
															adn_pinad_carousel();
											      }
											      
											      $("#adn_pinad_wrap").fadeIn(0);
		
											         var body_widths = window.innerWidth || document.body.clientWidth         	
														var half_screen = parseInt(body_widths/2);
														var pos_left = parseInt(_adn_pinad_poz_x);
														
														var drag_posX = half_screen - pos_left;
														if(parseInt(drag_posX)<0) drag_posX = 0;
														//console.log("window.innerWidth:"+document.body.scrollWidth);
														//console.log("half_screen:"+half_screen);
														//console.log("pos_left:"+pos_left);
														//console.log("drag_posX:"+drag_posX);
														//console.log("drag_posY:"+_adn_pinad_poz_y);
														
														
														document.getElementById("adn_pinad_wrap").style.top = _adn_pinad_poz_y + "px";
														document.getElementById("adn_pinad_wrap").style.left = drag_posX + "px";
														
														if(_adn_pinad_effect==0)
														{
									            adn_pinad_balloon_Moving();
									            adn_pinad_balloon_over();
									          }
									          else if(_adn_pinad_effect==3)
									          {
																					          	
												    var adn_pinad_wrap_width = $(window).width();
												    var adn_pinad_wrap_height2 = $(window).height();
												    var adn_pinad_wrap_height = $(document).height();
												    
														var _adn_pinad_scroll_xy = adn_pinad_getScrollXY();
        												_adn_pinad_last_scroll_poz = _adn_pinad_scroll_xy;

										            $("#adn_pinad_wrap").css({
										                "top": _adn_pinad_poz_y + "px"
										            });
										            $('#adn_pinad_wrap').fadeIn(0);
										            clearInterval(_adn_pinad_timer);
										            _adn_pinad_timer = setInterval(function() {
										            	
										            	
										                var _adn_now_scroll_xy = adn_pinad_getScrollXY();
										                var _adn_pinad_float_poz = _adn_now_scroll_xy.y + 30;
										                if(parseInt(_adn_pinad_poz_y)<parseInt(_adn_pinad_float_poz))
										                {
											                $("#adn_pinad_wrap").animate({
											                    "top": _adn_pinad_float_poz + "px"
											                }, 150)
											              }
										            }, 200)

        												
        												
									          }
								            
											      imp_url = "https://kn.acrosspf.com/log/pinad_imp.ad?ui=" + ui + "&ci=" + ci + "&gi=" + gi + "&rnd=" + Math.floor(Math.random() * 99999999999);
											      var imp_id = "adn_pinad_imp_" + Math.floor(Math.random() * 99999999999);
											      var a = document.createElement("DIV");
											      a.setAttribute("id", imp_id);
											      a.setAttribute("style", "display:none;width:0px;height:0px;");
											      document.getElementById("adn_pinad_wrap").appendChild(a);
											      adn_pinad_frm_send(imp_id, imp_url);
													}
				           		}
				          },
				          error: function(xhr) {
				              $("#adn_pinad_wrap").hide();
				              is_pinad_status = false
				          }
				      })
				  } catch (e) {}
		        //풍선 움직임
		      function adn_pinad_balloon_Moving() {
		          $(".adn_cloud_motion")
		              .animate({ top: "10px" }, 800, "", function () {
		                  $(this)
		                      .animate({ top: "0px" }, 800, "", function () {
		                          //자기 호출
		                          adn_pinad_balloon_Moving();
		                      });
		              });
		      }
		      //mouse over 제어
		      function adn_pinad_balloon_over() {
		          $(".adn_cloud_motion").hover(function () {
		              $(this).stop();
		          }, function () {
		              //MouseOut 시 애니메이션 Stop
		              adn_pinad_balloon_Moving();
		          });
		      }               ;
		                  
				}
		}	

	});
	
});