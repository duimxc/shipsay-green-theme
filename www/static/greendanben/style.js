/*
    * 阅读页设置按钮 逆水行舟 2019-8-25
*/
$(document).mousedown(function(e){
    var t = $(e.target).prop("tagName");
     if(t != 'I' && t != 'BUTTON' && $('.text_set').css("box-shadow") != ''){
         $('#text_control').fadeOut();
         $('.text_set').css("box-shadow","");
     }
})

function cog(){
    if ($('#text_control').css("display") == 'none'){
        $('.text_set').css("box-shadow","0 0 10px #ddd");
    }else{
        $('.text_set').css("box-shadow","");
    }
    $('#text_control').toggle('normal');

}
/*
    * 日间夜间转换 逆水行舟 2019-7-7
*/
if (readCookies('isnight') == 1){
    $('*').css({'background':'#111','color':'#939393'});
    $('.section_style').css('border-top','1px solid #939393');
    $('.search_input, .read_nav a').css('border','none');
}else{
    $('body').css('background','#e7e1d4');
}
function isnight(){
    if (readCookies('isnight') == 1){
        $('*').css({'background':'','color':''});
        $('.section_style, .read_nav a').css('border','');
        $('.search_input').css('border','1px solid #e6e6e6');
        $('body').css('background','#e7e1d4');
        setCookies('isnight','0');
    }else{
        $('*').css({'background':'#111','color':'#939393'});
        $('.section_style').css('border-top','1px solid #939393');
        $('.search_input, .read_nav a').css('border','none');
        setCookies('isnight','1');
    }
}
/*
    * 精简模式 去掉顶部底部显示 逆水行舟 2019-6-26
*/
let oNav = document.getElementsByClassName('navigation')[0];
let oHead = document.getElementsByTagName('header')[0];
let oFoot = document.getElementById('footer');
let oThis = document.getElementById('ismini');
// oHead.style.backgroundColor = '#e7e1d4';
if (readCookies('ismini') == 1){
            oThis.className = oThis.className.replace('min','pl');
            oNav.style.display='none';
            oHead.style.display='none';
            oFoot.style.display='none';
            $('.read_nav').css('margin-bottom','10px');
}
function ismini() {
  //如果图标为 plus + 号,说明为极简状态
  if (oThis.className.indexOf('pl') > -1){
      oThis.className = oThis.className.replace('pl','min');
      oHead.style.display='block';
      oFoot.style.display='block';
      $('.read_nav').css('margin-bottom','');
      if (document.body.clientWidth > 767){ //不隐藏导航
          oNav.style.display='block';
      }
      setCookies('ismini','0')
  }else{
      oThis.className = oThis.className.replace('min','pl');
      oNav.style.display='none';
      oHead.style.display='none';
      oFoot.style.display='none';
      $('.read_nav').css('margin-bottom','10px');
      setCookies('ismini','1')
  }
}

/*
    * 阅读字体大小缩放 逆水行舟 2019-6-10
*/
let oArticle = document.getElementById('article'); 
oArticle.style.fontSize = readCookies('fontSize'); //从cookie读取字体大小

function changeSize(str){
    let pre_size = window.getComputedStyle(oArticle).fontSize; //获得字体大小(带px)
    let current_size = parseInt(pre_size); //去掉px 只留数字
    switch (str){
        case 'min' :
            current_size >= 12 ? after_size = current_size - 2 : after_size = current_size; //最小10px
            break;
        case 'plus':
            current_size <= 38 ? after_size = current_size + 2 : after_size = current_size; //最大40px
            break;
        case 'normal':
        default:
           after_size = 18;//标准18px
           break;
    }
    oArticle.style.fontSize = after_size + 'px';//设置大小
    setCookies('fontSize',after_size+'px');//写入cookies
}
