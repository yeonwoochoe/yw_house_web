/**
 * 움직이는 배너 Jquery Plug-in
 * @author  cafe24
 */

(function($){

    $.fn.floatBanner = function(options) {
        options = $.extend({}, $.fn.floatBanner.defaults , options);

        return this.each(function() {
            var aPosition = $(this).position();
            var jbOffset = $(this).offset();
            var node = this;

            $(window).scroll(function() {
                var _top = $(document).scrollTop();
                _top = (aPosition.top < _top) ? _top : aPosition.top;

                setTimeout(function () {
                    var newinit = $(document).scrollTop();

                    if ( newinit > jbOffset.top ) {
                        _top -= jbOffset.top;
                        var container_height = $("#wrap").height();
                        var quick_height = $(node).height();
                        var cul = container_height - quick_height;
                        if(_top > cul){
                            _top = cul;
                        }
                    }else {
                        _top = 0;
                    }

                    $(node).stop().animate({top: _top}, options.animate);
                }, options.delay);
            });
        });
    };

    $.fn.floatBanner.defaults = {
        'animate'  : 500,
        'delay'    : 500
    };

})(jQuery);

/**
 * 문서 구동후 시작
 */
$(document).ready(function(){
    $('#banner:visible, #quick:visible').floatBanner();

    //placeholder
    $(".ePlaceholder input, .ePlaceholder textarea").each(function(i){
        var placeholderName = $(this).parents().attr('title');
        $(this).attr("placeholder", placeholderName);
    });
    /* placeholder ie8, ie9 */
    $.fn.extend({
        placeholder : function() {
            //IE 8 버전에는 hasPlaceholderSupport() 값이 false를 리턴
           if (hasPlaceholderSupport() === true) {
                return this;
            }
            //hasPlaceholderSupport() 값이 false 일 경우 아래 코드를 실행
            return this.each(function(){
                var findThis = $(this);
                var sPlaceholder = findThis.attr('placeholder');
                if ( ! sPlaceholder) {
                   return;
                }
                findThis.wrap('<label class="ePlaceholder" />');
                var sDisplayPlaceHolder = $(this).val() ? ' style="display:none;"' : '';
                findThis.before('<span' + sDisplayPlaceHolder + '>' + sPlaceholder + '</span>');
                this.onpropertychange = function(e){
                    e = event || e;
                    if (e.propertyName == 'value') {
                        $(this).trigger('focusout');
                    }
                };
                //공통 class
                var agent = navigator.userAgent.toLowerCase();
                if (agent.indexOf("msie") != -1) {
                    $(".ePlaceholder").css({"position":"relative"});
                    $(".ePlaceholder span").css({"position":"absolute", "padding":"0 4px", "color":"#878787"});
                    $(".ePlaceholder label").css({"padding":"0"});
                }
            });
        }
    });

    $(':input[placeholder]').placeholder(); //placeholder() 함수를 호출

    //클릭하면 placeholder 숨김
    $('body').delegate('.ePlaceholder span', 'click', function(){
        $(this).hide();
    });

    //input창 포커스 인 일때 placeholder 숨김
    $('body').delegate('.ePlaceholder :input', 'focusin', function(){
        $(this).prev('span').hide();
    });

    //input창 포커스 아웃 일때 value 가 true 이면 숨김, false 이면 보여짐
    $('body').delegate('.ePlaceholder :input', 'focusout', function(){
        if (this.value) {
            $(this).prev('span').hide();
        } else {
            $(this).prev('span').show();
        }
    });

    //input에 placeholder가 지원이 되면 true를 안되면 false를 리턴값으로 던져줌
    function hasPlaceholderSupport() {
        if ('placeholder' in document.createElement('input')) {
            return true;
        } else {
            return false;
        }
    }
});

/**
 *  썸네일 이미지 엑박일경우 기본값 설정
 */
$(window).load(function() {
    $("img.thumb,img.ThumbImage,img.BigImage").each(function($i,$item){
        var $img = new Image();
        $img.onerror = function () {
                $item.src="//img.echosting.cafe24.com/thumb/img_product_big.gif";
        }
        $img.src = this.src;
    });
});
//window popup script
function winPop(url) {
    window.open(url, "popup", "width=300,height=300,left=10,top=10,resizable=no,scrollbars=no");
}
/**
 * document.location.href split
 * return array Param
 */
function getQueryString(sKey)
{
    var sQueryString = document.location.search.substring(1);
    var aParam       = {};

    if (sQueryString) {
        var aFields = sQueryString.split("&");
        var aField  = [];
        for (var i=0; i<aFields.length; i++) {
            aField = aFields[i].split('=');
            aParam[aField[0]] = aField[1];
        }
    }

    aParam.page = aParam.page ? aParam.page : 1;
    return sKey ? aParam[sKey] : aParam;
};

$(document).ready(function(){
    // tab
    $.eTab = function(ul){
        $(ul).find('a').click(function(){
            var _li = $(this).parent('li').addClass('selected').siblings().removeClass('selected'),
                _target = $(this).attr('href'),
                _siblings = '.' + $(_target).attr('class');
            $(_target).show().siblings(_siblings).hide();
            return false
        });
    }
    if ( window.call_eTab ) {
        call_eTab();
    };
    $(".load_btn").click(function(){
		var load_file = $(this).attr('load_file');
        $(".load_pn").load(load_file);
		return false
    });
});










	 	 


 



(function($){
$.fn.extend({
    center: function() {
        this.each(function() {
            var
                $this = $(this),
                $w = $(window);
            $this.css({
                position: "absolute",
                top: ~~(($w.height() - $this.outerHeight()) / 2) + $w.scrollTop() + "px",
                left: ~~(($w.width() - $this.outerWidth()) / 2) + $w.scrollLeft() + "px"
            });
        });
        return this;
    }
});
$(function() {
    var $container = function(){/*
<div id="modalContainer">
    <iframe id="modalContent" scroll="0" scrolling="no" frameBorder="0"></iframe>
</div>');
*/}.toString().slice(14,-3);
    $('body')
    .append($('<div id="modalBackpanel"></div>'))
    .append($($container));
    function closeModal () {
        $('#modalContainer').hide();
        $('#modalBackpanel').hide();
    }
    $('#modalBackpanel').click(closeModal);
    zoom = function ($piProductNo, $piCategoryNo, $piDisplayGroup) {
        var $url = '/product/image_zoom.html?product_no=' + $piProductNo + '&cate_no=' + $piCategoryNo + '&display_group=' + $piDisplayGroup;
        $('#modalContent').attr('src', $url);
        $('#modalContent').bind("load",function(){
            $(".header .close",this.contentWindow.document.body).bind("click", closeModal);
        });
        $('#modalBackpanel').css({width:$("body").width(),height:$("body").height(),opacity:.4}).show();
        $('#modalContainer').center().show();
    }
});
})(jQuery);
$(document).ready(function(){
    //카테고리 보기
    $('#category_handle').mouseenter(function () {
        $('#category_all').addClass('active');
    });
    $('#gnb_wrap').mouseleave(function () {
        $('#category_all').removeClass('active');
    });

    //검색창 애니메이션
    $('#keyword').focusin(function () {
        $('#header .search_form').addClass('active');
    });
    $('#keyword').focusout(function () {
        $('#header .search_form').removeClass('active');
    });

    //GNB플로팅
    var $float = $('#gnb_wrap');
    var _fixHeight = $float.offset().top;
    $(document).scroll(function () {
        if ($(document).scrollTop() > _fixHeight) {
            $float.addClass('fixed');
        } else {
            $float.removeClass('fixed');
        }
    });

    //벌룬 애니메이션
    function bounce($target,sec,px) {
        if (!sec) var sec = 200;
        if (!px) var px = 6;
        $target.delay(1000)
            .animate({ top:'+='+px },sec).animate({ top:'-='+px },sec)
            .animate({ top:'+='+px },sec).animate({ top:'-='+px },sec, function () {
            bounce($target,sec,px);
        });
    }
    if ($('#bounce1').length>0)
    {
        bounce($('#bounce1'));
    }

    //윙 플로팅
    var $wing = $('#fixed_wing');
    var _wingHeight = $wing.offset().top - ( $(window).height()/2 ) + ( $('#fixed_wing').height()/2 );
    $(document).scroll(function () {
        if ($(document).scrollTop() > _wingHeight) {
            $wing.addClass('fixed');
        } else {
            $wing.removeClass('fixed');
        }
    });

    //윙 이동
    $('#fixed_wing a').click(function (e) {
        if ($(this).is('.top')) {
            $('html, body').animate({
                scrollTop:0
            }, 200);
            e.preventDefault();
        } else if ($(this).is('.bottom')) {
            $('html, body').animate({
                scrollTop:$(document).height()
            }, 200);
            e.preventDefault();
        }
    });

    //상품 할인률
    $('.product_list .product_item').each(function (e) {
        var _prc_custom = parseInt( $(this).find('.xprice').text() ) * 1000;
        var _prc = parseInt( $(this).find('.price strong').text() ) * 1000;
        var _per = Math.round( (_prc_custom - _prc) / (_prc_custom/100) );
        if (_per>0) {
            $(this).find('.dc em').text( _per );
        } else {
            $(this).find('.dc span').hide();
        }
    });

});

$(document).ready(function($) {

    //카운터
    var _counterAct = true;
    var _counterHeight = $('.area_main_04').offset().top - $(window).height();
    $(document).scroll(function () {
        if (_counterAct) {
            if ($(document).scrollTop() > _counterHeight) {
                _counterAct = false;
                $('.num_counter_anim').each(function() {
                    var $this = $(this);
                    var _max = $this.data('maxnum');
                    $({ countNum: $this.html() }).animate({ countNum: _max }, {
                        duration: 2000,
                        easing: 'linear',
                        step: function () {
                            $this.html( commaSeparateNumber(Math.floor(this.countNum)) );
                        },
                        complete: function () {
                            $this.html(commaSeparateNumber(_max));
                        }
                    });
                });
            }
        }
    });

});

function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
        val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    }
    return val;
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

$(document).ready(function() {
    //모바일 플로팅버튼
    $('#float_banner button.toggle').click(function (e) {
        $('#float_banner').toggleClass('closed');
        if ( $('#float_banner').is('.closed') ) {
            document.cookie = "mfloat=0; path=/";
        } else {
            document.cookie = "mfloat=1; path=/";
        }
        e.preventDefault();
    });
    var floatOX = getCookie('mfloat');
    if (floatOX=='0') {
        $('#float_banner').addClass('closed');
    } else {
        $('#float_banner').removeClass('closed');
    }
});
