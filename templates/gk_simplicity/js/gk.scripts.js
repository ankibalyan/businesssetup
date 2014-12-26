/**
 * jQuery Cookie plugin
 *
 * Copyright (c) 2010 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */
jQuery.noConflict();
jQuery.cookie = function (key, value, options) {
  // key and at least value given, set cookie...
  if (arguments.length > 1 && String(value) !== '[object Object]') {
    options = jQuery.extend({
    }, options);
    if (value === null || value === undefined) {
      options.expires = - 1;
    }
    if (typeof options.expires === 'number') {
      var days = options.expires,
      t = options.expires = new Date();
      t.setDate(t.getDate() + days);
    }
    value = String(value);
    return (document.cookie = [
      encodeURIComponent(key),
      '=',
      options.raw ? value : encodeURIComponent(value),
      options.expires ? '; expires=' + options.expires.toUTCString()  : '',
      // use expires attribute, max-age is not supported by IE
      options.path ? '; path=' + options.path : '',
      options.domain ? '; domain=' + options.domain : '',
      options.secure ? '; secure' : ''
    ].join(''));
  }
  // key and possibly options given, get cookie...

  options = value || {
  };
  var result,
  decode = options.raw ? function (s) {
    return s;
  }
   : decodeURIComponent;
  return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1])  : null;
};
//
var page_loaded = false;
// animations
var elementsToAnimate = [
];
//
var headerHeight = ''
jQuery(document).ready(function () {
  // registration form1 parameters
  var formId = jQuery('.arc_section .arc_section_main form').attr('id');
  var serviceId = jQuery('#serviceId').val();
  var result = 0;
  var contCount = 0;
  //validation initials
  var namevalidate = new RegExp(/^[a-zA-Z "!?.-]+$/);
  var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
  // Testimonial Sliders parameters
  var width = 780;
  var speed = 2000;
  var pause = 4000;
  var currentSlide = 1;
  var Slider = jQuery('#slider');
  var Slides = Slider.find('.slides');
  var Slide = Slides.find('.slide');
  var Interval;
  // Testimonial Sliders parameters ends
  function startSlider() {
    Interval = setInterval(function () {
      Slides.animate({
        'margin-left': '-=' + width,
      }, speed, function () {
        currentSlide++;
        if (currentSlide === Slide.length)
        {
          currentSlide = 1;
          Slides.css('margin-left', '10');
        }
      });
    }, pause);
  }
  function stopSlider() {
    clearInterval(Interval);
  }
  //Slider.on('mouseenter',stopSlider).on('mouseleave',startSlider());

  startSlider();
  function center(Id) {
    win_width = jQuery(window).width();
    win_height = jQuery(window).height();
    ob_width = jQuery(Id).width();
    ob_height = jQuery(Id).height();
    jQuery(Id).css({
      top: (win_height / 2) - (ob_height / 2),
      left: (win_width / 2) - (ob_width / 2)
    });
  }
  // var Idp = '#login_light'; 
  // center(Idp);
  //See more in pvt ltd

  jQuery('.rmtxt').hide();
  jQuery('#seemor').click(function () {
    jQuery('.rmtxt').toggle();
  });
  //TO bring Popup 
  jQuery('#bsvideo').click(function () {
    jQuery('#fade').show();
    jQuery('#video_light').slideDown();
    jQuery('#video_light').html('<iframe src="//www.youtube.com/embed/h_V1IN5FJDk?rel=0&autoplay=1" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:98%;width:98%;" height="98%" width="98%" allowfullscreen></iframe>');
    jQuery('#video_close').css('display', 'block');
    jQuery('#video_close').show();
    jQuery('body').css({
      overflow: 'hidden'
    });
  });
  jQuery('#video_close').click(function () {
    jQuery('#video_close').hide();
    jQuery('#fade').hide();
    jQuery('#video_light').slideUp();
    jQuery('body').css({
      overflow: 'visible'
    });
  });
  jQuery('#close1').click(function () {
    jQuery('#close1').hide();
    jQuery('#fade').hide();
    jQuery('#light1').slideUp();
    jQuery('body').css({
      overflow: 'visible'
    });
  });
  jQuery('.popupClose').click(function () {
    jQuery('#close').hide();
    jQuery('#close1').hide();
    jQuery('#fade').hide();
    jQuery('#light').slideUp();
    jQuery('#light1').slideUp();
    jQuery('body').css({
      overflow: 'visible'
    });
  });
  jQuery('#popu').click(function () {
    jQuery('#fade').show();
    jQuery('#light').slideDown();
    jQuery('#popuclose').show();
  });
  jQuery('#fade').click(function () {
    jQuery('#popuclose').hide();
    jQuery('#fade').hide();
    jQuery('#light').slideUp();
  });
  jQuery('#popuclose').click(function () {
    jQuery('#popuclose').hide();
    jQuery('#fade').hide();
    jQuery('#light').slideUp();
  });
  jQuery('#login_close').click(function () {
    jQuery('#login_close').hide();
    jQuery('#login_fade').hide();
    jQuery('#login_light').slideUp();
  });
  jQuery('#login_fade').click(function () {
    jQuery('#login_close').hide();
    jQuery('#login_fade').hide();
    jQuery('#login_light').slideUp();
  });
  //tool tip and pop over
  jQuery('[data-toggle="tooltip"]').tooltip({
    'placement': 'top'
  });
  // jQuery('[data-toggle="popover"]').popover({trigger: 'hover','placement': 'top'});
  // //$('.arc_section').popover();
  jQuery('#numdirectors').on('focus', function (event) {
    prevtotDir = jQuery(this).val();
  }).change(function function_name(argument) {
    totDirs = jQuery(this).val();
    // dsf1 = jQuery('#DSF1').attr('data-base');
    // dsf5 = jQuery('#DSF5').attr('data-base');
    // dsf10 = jQuery('#DSF10').attr('data-base');
    // dsf25 = jQuery('#DSF25').attr('data-base');
    if (totDirs == 2) {
      dsf1 = 3000;
      din = 1000;
      dsf2 = 2000;
      din = 1000;
      dsf3 = 3000;
      din = 1000;
      dsf4 = 2000;
      din = 1000;
    } 
    else if (totDirs == 3) {
      dsf1 = 4500;
      din = 1500;
      dsf2 = 3000;
      din = 1500;
      dsf3 = 4500;
      din = 1500;
      dsf4 = 3000;
      din = 1500;
    } 
    else if (totDirs == 4) {
      dsf1 = 6000;
      din = 2000;
      dsf2 = 4000;
      din = 2000;
      dsf3 = 6000;
      din = 2000;
      dsf4 = 4000;
      din = 2000;
    } 
    else if (totDirs == 5) {
      dsf1 = 7500;
      din = 2500;
      dsf2 = 5000;
      din = 2500;
      dsf3 = 7500;
      din = 2500;
      dsf4 = 5000;
      din = 2500;
    } 
    else if (totDirs == 6) {
      dsf1 = 9000;
      din = 3000;
      dsf2 = 6000;
      din = 3000;
      dsf3 = 9000;
      din = 3000;
      dsf4 = 6000;
      din = 3000;
    } 
    else if (totDirs == 7) {
      dsf1 = 10500;
      din = 3500;
      dsf2 = 7000;
      din = 3500;
      dsf3 = 10500;
      din = 3500;
      dsf4 = 7000;
      din = 3500;
    } 
    else if (totDirs == 8) {
      dsf1 = 12000;
      din = 4000;
      dsf2 = 8000;
      din = 4000;
      dsf3 = 12000;
      din = 4000;
      dsf4 = 8000;
      din = 4000;
    } 
    else {
      dsf1 = 3000;
      din = 500;
      dsf2 = 2000;
      din = 500;
      dsf3 = 1500;
      din = 500;
      dsf4 = 3000;
      din = 500;
    }
    // dsf1 = jQuery('#DSF1').html();
    // if(totDirs > prevtotDir)
    // {
    //   for(i = prevtotDir; i<= totDirs; i++){
    //     dsf1 = parseInt(dsf1,10) + parseInt(1500,10); 
    //   }  
    // }
    // else{
    //   for(i = prevtotDir; i>= totDirs; i--){
    //     dsf1 = parseInt(dsf1,10) - parseInt(1500,10); 
    //   }
    // }

    jQuery('.DSF').html(eval('dsf' + serviceId));
    jQuery('.DIN').html(din);
    var nthTd = jQuery('div.show_cont table.private_pt tbody tr td.add_val:nth-child(' + 2 + ')').not('table.private_pt tbody tr#pSum td');
    sum2 = sumOfCols(nthTd);
    var nthTd = jQuery('div.show_cont table.private_pt tbody tr td.add_val:nth-child(' + 3 + ')').not('table.private_pt tbody tr#pSum td');
    sum3 = sumOfCols(nthTd);
    var nthTd = jQuery('div.show_cont table.private_pt tbody tr td.add_val:nth-child(' + 4 + ')').not('table.private_pt tbody tr#pSum td');
    sum4 = sumOfCols(nthTd);
    var nthTd = jQuery('div.show_cont table.private_pt tbody tr td.add_val:nth-child(' + 5 + ')').not('table.private_pt tbody tr#pSum td');
    sum5 = sumOfCols(nthTd);
    jQuery('#PL_TOT1').html(sum2);
    jQuery('#PL_TOT5').html(sum3);
    jQuery('#PL_TOT10').html(sum4);
    jQuery('#PL_TOT25').html(sum5);
    jQuery('#sharecapital').trigger('focus');
  });
  jQuery('#sharecapital').on('focus', function function_name(argument) {
    share_cap_val = jQuery(this).val();
    dataInfo = jQuery('#sharecapital option:selected').attr('data-info');
    // gov_popup_con = jQuery('#companyregistrationpvtltd_gov1_pop' + share_cap_val).html();
    jQuery('table.private_pt tbody tr td:nth-child(n)').css({
      background: '#fff',
      color: '#000'
    });
    //alert("data coloumn:"+dataInfo);
    var nthTd = jQuery('div.show_cont table.private_pt tbody tr td.add_val:nth-child(' + dataInfo + '):not(table.private_pt tbody tr#pSum td)');
    //console.log("nthtd is "+nthTd + "and data coloun is "+ dataInfo);
    sum = sumOfCols(nthTd);
    //alert("sum calculated");
    jQuery('#companyregistrationpvtltd_gov1').html(sum);
    jQuery('#companyregistrationpvtltd_gov').trigger('click');
    nthTd.css({
      background: '#398aff',
      color: '#fff'
    });
  });
  jQuery('#sharecapital').change(function (event) {
    share_cap_val = jQuery(this).val();
    dataInfo = jQuery('#sharecapital option:selected').attr('data-info');
    var nthTd = jQuery('div.show_cont table.private_pt tbody tr td.add_val:nth-child(' + 2 + ')').not('table.private_pt tbody tr#pSum td');
    sum2 = sumOfCols(nthTd);
    var nthTd = jQuery('div.show_cont table.private_pt tbody tr td.add_val:nth-child(' + 3 + ')').not('table.private_pt tbody tr#pSum td');
    sum3 = sumOfCols(nthTd);
    var nthTd = jQuery('div.show_cont table.private_pt tbody tr td.add_val:nth-child(' + 4 + ')').not('table.private_pt tbody tr#pSum td');
    sum4 = sumOfCols(nthTd);
    var nthTd = jQuery('div.show_cont table.private_pt tbody tr td.add_val:nth-child(' + 5 + ')').not('table.private_pt tbody tr#pSum td');
    sum5 = sumOfCols(nthTd);
    jQuery('#PL_TOT1').html(sum2);
    jQuery('#PL_TOT5').html(sum3);
    jQuery('#PL_TOT10').html(sum4);
    jQuery('#PL_TOT25').html(sum5);
    // gov_popup_con = jQuery('#companyregistrationpvtltd_gov1_pop' + share_cap_val).html();
    jQuery('table.private_pt tbody tr td:nth-child(n)').css({
      background: '#fff',
      color: '#000'
    });
    //alert("data coloumn:"+dataInfo);
    var nthTd = jQuery('div.show_cont table.private_pt tbody tr td.add_val:nth-child(' + dataInfo + '):not(table.private_pt tbody tr#pSum td)');
    //console.log("nthtd is "+nthTd + "and data coloun is "+ dataInfo);
    sum = sumOfCols(nthTd);
    //alert("sum calculated");
    jQuery('#companyregistrationpvtltd_gov1').html(sum);
    nthTd.css({
      background: '#398aff',
      color: '#fff'
    });
    if (serviceId == 1 || serviceId == 3)
    {
      RegProfFee1 = 3500;
      RegProfFee5 = 4500;
      RegProfFee10 = 5500;
      RegProfFee15 = 6500;
    } 
    else if (serviceId == 2)
    {
      RegProfFee0 = 2000;
      RegProfFee1 = 2500;
      RegProfFee6 = 3000;
      RegProfFee10 = 3500;
    } 
    else if (serviceId == 4)
    {
      RegProfFee5 = 20000;
      RegProfFee10 = 25000;
      RegProfFee15 = 30000;
      RegProfFee20 = 35000;
    }
    if (share_cap_val)
    {
      jQuery('#companyregistrationpvtltd_price1').html(eval('RegProfFee' + share_cap_val));
      jQuery('#companyregistrationpvtltd_gov').trigger('click');
    }
    // else if (share_cap_val == 5)
    // {
    //   jQuery('#companyregistrationpvtltd_price1').html('4500');
    //   jQuery('#companyregistrationpvtltd_gov').trigger('click');
    // } 
    // else if (share_cap_val == 10)
    // {
    //   jQuery('#companyregistrationpvtltd_price1').html('5500');
    //   jQuery('#companyregistrationpvtltd_gov').trigger('click');
    // } 
    // else if (share_cap_val == 25)
    // {
    //   jQuery('#companyregistrationpvtltd_price1').html('6500');
    //   jQuery('#companyregistrationpvtltd_gov').trigger('click');
    // }

  });
  jQuery('#companyregistrationpvtltd_gov1').click(function (event) {
    event.preventDefault();
    dyndata = jQuery('.show_cont').html();
    //console.log(dyndata);
    jQuery('.sf_popup').html(dyndata);
    center('.sf_light');
    sf_popup('show');
  });
  jQuery('.sf_close').click(function (event) {
    sf_popup('close');
    jQuery('.sf_popup').html('');
  });
  jQuery('.sf_fade').click(function (event) {
    sf_popup('close');
    jQuery('.sf_popup').html('');
  });
  function sumOfCols(selector) {
    sum = 0;
    jQuery.each(selector, function (number) {
      //alert(number+" - "+ jQuery(this).html())
      //console.log(number+" - "+ jQuery(this).html());
      if ((jQuery(this).html()) != '' && (jQuery(this).html()) != null) {
        sum += parseInt(jQuery(this).html(), 10);
        //alert(sum);
      }
    });
    return sum;
  }
  function sf_popup(state) {
    fade = jQuery('.sf_fade');
    light = jQuery('.sf_light');
    close = jQuery('.sf_close');
    data = jQuery('.sf_popup');
    option = jQuery('.sf_message');
    if (state == 'close')
    {
      fade.hide();
      light.slideUp();
      close.hide();
      data.hide();
      option.hide();
    } 
    else {
      fade.show();
      light.slideDown();
      close.show();
      data.show();
      option.show();
    }
  }
  jQuery('#slist').change(function () {
    var state = jQuery('#slist').val();
    if (state == 0) {
      errFlag = 1;
      jQuery(this).addClass('error');
    } 
    else {
      jQuery(this).removeClass('error');
    }
  });
  jQuery('#idproof').change(function () {
    var idproof = jQuery('#idproof').val();
    if (idproof == 0) {
      errFlag = 1;
      jQuery(this).addClass('error');
    } else {
      errFlag = 0;
      jQuery(this).removeClass('error');
    }
  });
  jQuery('#addressproof').change(function () {
    var addressproof = jQuery('#addressproof').val();
    if (addressproof == 0) {
      jQuery(this).addClass('error');
      errFlag = 1;
    } else {
      errFlag = 0;
      jQuery(this).removeClass('error');
    }
  });
  // jQuery('#contact').focus(function () {
  //   jQuery('#contact').keydown(function (e) {
  //     // Allow: backspace, delete, tab, escape, enter and .
  //     if (jQuery.inArray(e.keyCode, [
  //       46,
  //       8,
  //       9,
  //       27,
  //       13,
  //       110,
  //       190
  //     ]) !== - 1 ||
  //     // Allow: Ctrl+A
  //     (e.keyCode == 65 && e.ctrlKey === true) ||
  //     // Allow: home, end, left, right
  //     (e.keyCode >= 35 && e.keyCode <= 39)) {
  //       // let it happen, don't do anything
  //       console.log('valid keys');
  //       return ;
  //     }
  //     // Ensure that it is a number and stop the keypress
  //     if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
  //       console.log('invalid ');
  //       e.preventDefault();
  //     }
  //   });
  // });
  jQuery('#jform_password2').parent().after('<small class=\'passworderror\' style=\'display:block; height:30px; margin-left:220px;\'>* Minimum characters required is 4</small>');
  function fileuploadsubmit() {
    jQuery('#directordetails_files').submit(function () {
      jQuery.ajax({
        url: 'index.php?option=com_fileupload&view=file',
        type: 'POST',
        data: {
          param1: 'value1'
        },
      }).done(function (result) {
        console.log('success' + result);
      }).fail(function () {
        console.log('error');
      }).always(function () {
        console.log('complete');
      });
    });
  }
  jQuery('.charsonly').blur(function (event) {
    validateChars(jQuery(this).attr('id'));
  });
  jQuery('.phone').blur(function (event) {
    validatePhone(jQuery(this).attr('id'));
  });
  jQuery('.validatemail').blur(function (index) {
    validatemail(jQuery(this).attr('id'));
  });
  jQuery('.address').blur(function (index) {
    validataddress(jQuery(this).attr('id'));  
  });
  
  jQuery('.validatenumber').blur(function (index) {
    validateNumber(jQuery(this).attr('id'));
  });
  jQuery('.required').blur(function (index) {
    validateRequired(jQuery(this).attr('id'));
  });
  jQuery('.required').change(function (index) {
    validateRequired(jQuery(this).attr('id'));
  });
  // jQuery('.filevalidate').change(function (index) {
  //   validateFile(jQuery(this).attr('id'));
  // });
  function validateChars(id) {
    var charsonly = jQuery('#' + id).val();
    if (charsonly == '')
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Please enter the value.').css('display', 'block');
      return errFlag = 1;
    } 
    else if (!namevalidate.test(charsonly))
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Only characters are allowed.').css('display', 'block');
      return errFlag = 1;
    } 
    else
    {
      jQuery('#' + id).removeClass('error');
      jQuery('#' + id).next('span.error_field').html('').css('display', 'none');
      return errFlag = 0;
    }
  }
  function validataddress(id) {
    var charsonly = jQuery('#' + id).val();
    if (charsonly == '')
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Please enter the value.').css('display', 'block');
      return errFlag = 1;
    } 
    else
    {
      jQuery('#' + id).removeClass('error');
      jQuery('#' + id).next('span.error_field').html('').css('display', 'none');
      return errFlag = 0;
    }
  }
  function validateRequired(id) {
    var charsonly = jQuery('#' + id).val();
    if (charsonly == '')
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Please enter the value.').css('display', 'block');
      return errFlag = 1;
    } 
    else
    {
      jQuery('#' + id).removeClass('error');
      jQuery('#' + id).next('span.error_field').html('').css('display', 'none');
      return errFlag = 0;
    }
  }
  function validatePhone(id) {
    var phone = jQuery('#' + id).val();
    if (phone == '')
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Please enter the value.').css('display', 'block');
      return errFlag = 1;
    } 
    else if (namevalidate.test(phone))
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Only numbers are allowed.').css('display', 'block');
      return errFlag = 1;
    } 
    else if (phone.length < 8 || phone.length > 10)
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Phone no should be in betweent 8 - 10 digits.').css('display', 'block');
      return errFlag = 1;
    } 
    else
    {
      jQuery('#' + id).removeClass('error');
      jQuery('#' + id).next('span.error_field').html('').css('display', 'none');
      return errFlag = 0;
    }
  }
  function validatemail(id) {
    var mailid = jQuery('#' + id).val();
    var valid = emailReg.test(mailid);
    if (mailid == '')
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Please enter the value.').css('display', 'block');
      return errFlag = 1;
    } 
    else if (!valid) {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Please enter a valid email id').css('display', 'block');
      return errFlag = 1;
    } 
    else {
      jQuery('#' + id).removeClass('error');
      jQuery('#' + id).next('span.error_field').css('display', 'none');
      return errFlag = 0;
    }
  }
  function validateNumber(id) {
    var num = jQuery('#' + id).val();
    if (num == '')
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Please enter the value.').css('display', 'block');
      return errFlag = 1;
    }
    if (num == '0' || num == 0)
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('This value can not be zero (0).').css('display', 'block');
      return errFlag = 1;
    } 
    else if (namevalidate.test(num))
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Only numbers are allowed.').css('display', 'block');
      return errFlag = 1;
    } 
    else
    {
      jQuery('#' + id).removeClass('error');
      jQuery('#' + id).next('span.error_field').html('').css('display', 'none');
      return errFlag = 0;
    }
  }
  function validateFile(id2) {
    var num = jQuery('#' + id2).val();
    //alert(id2);
    id = id2.slice(0,-1);
    if (num == '')
    {
      jQuery('#' + id).addClass('error');
      jQuery('#' + id).next('span.error_field').html('Please Upload the required File.').css('display', 'block');
      return errFlag = 1;
    } 
    else
    {
      jQuery('#' + id).removeClass('error');
      jQuery('#' + id).next('span.error_field').html('').css('display', 'none');
      return errFlag = 0;
    }
  }
    jQuery('.validatenumber').focus(function (index) {
    var id = jQuery(this).attr('id');
    jQuery('#' + id).keyup(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if (jQuery.inArray(e.keyCode, [
        46,
        8,
        9,
        27,
        13,
        110,
        190
      ]) !== - 1 ||
      // Allow: Ctrl+A
      (e.keyCode == 65 && e.ctrlKey === true) ||
      // Allow: home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        return ;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
      }
    });
  });

  jQuery('#myform').submit(function () {
    errFlag = 0;
    if (validatemail('mailid') == 1)
    {
      errFlag = 1;
    }
    if (validateChars('firstname') == 1)
    {
      errFlag = 1;
    }
    if (validateChars('lastname') == 1)
    {
      errFlag = 1;
    }
    if (validatePhone('contact') == 1)
    {
      errFlag = 1;
    }
    if (validataddress('address') == 1)
    {
      errFlag = 1;
    }
    if (errFlag == 1)
    {
      return false;
    } 
    else
    {
      return true;
    }
  });

  jQuery('#sfMessageForm').submit(function (event) {
    errFlag = 0;
    if (validateRequired('subject') == 1)
    {
      errFlag = 1;
    }
    if (validateRequired('message') == 1)
    {
      errFlag = 1;
    }
    if (errFlag == 1)
    {
      return false;
    } 
    else
    {
      return true;
    }
  });

    jQuery('#sfReplyForm').submit(function (event) {
    errFlag = 0;
    if (validateRequired('message') == 1)
    {
      errFlag = 1;
    }
    if (errFlag == 1)
    {
      return false;
    } 
    else
    {
      return true;
    }
  });
  jQuery('#eventForm').submit(function (event) {
    errFlag = 0;
    if (validateRequired('eventDate') == 1)
    {
      errFlag = 1;
    }
    if (validateRequired('eventTitle') == 1)
    {
      errFlag = 1;
    }
    if (validateRequired('eventDesc') == 1)
    {
      errFlag = 1;
    }
    if (errFlag == 1)
    {
      return false;
    } 
    else
    {
      return true;
    }
  });
  jQuery('#advicecontact').submit(function () {
    errFlag = 0;
    console.log('start validate');
    if (validatemail('emailId') == 1)
    {
      errFlag = 1;
    }
    if (validateChars('custname') == 1)
    {
      errFlag = 1;
    }
    if (validatePhone('phoneno') == 1)
    {
      errFlag = 1;
    }
    if (errFlag == 1)
    {
      return false;
    } 
    else
    {
      var mailid = jQuery('#emailId').val();
      var custname = jQuery('#custname').val();
      var phoneno = jQuery('#phoneno').val();
      result = 0;
      jQuery.ajax({
        url: '../../index.php/component/fileupload/fileform',
        async: false,
        data: {
          mailid: mailid,
          custname: custname,
          phoneno: phoneno
        },
        success: function (data) {
          result = data;
          console.log(result);
        }
      });
      if (result == '1' || result == 1)
      {
        jQuery('#messagedisplay').html('\t* * *\tSent Successfully\t* * *\t');
      }
      if (result == '2' || result == 2)
      {
        jQuery('#messagedisplay').html(' Request is already sent.');
      }
    }
  });
  jQuery('#member-profile').submit(function(event) {
        event.preventDefault();
        return false;
  });
  jQuery('#directorMail').change(function () {
    errFlag = 0;
    var mailid = jQuery(this).val();
    var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    var valid = emailReg.test(mailid);
    if (!valid) {
      console.log('invalid email');
      jQuery(this).addClass('error');
    } else {
      console.log('valid email');
      jQuery(this).removeClass('error');
    }
  });
  jQuery('#promotersshare').change(function () {
    jQuery('#promotersshare').keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if (jQuery.inArray(e.keyCode, [
        46,
        8,
        9,
        27,
        13,
        110,
        190
      ]) !== - 1 ||
      // Allow: Ctrl+A
      (e.keyCode == 65 && e.ctrlKey === true) ||
      // Allow: home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        console.log('valid keys');
        return;
      }
      // Ensure that it is a number and stop the keypress

      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        console.log('invalid ');
        e.preventDefault();
      }
    });
  });
  errFlag = 0;
  if (jQuery('#totalDir')) {
    var totalDir = jQuery('#totalDir').val();
    jQuery('.cdnpclas').click(function () {
      var i = jQuery(this).attr('data-value');
      if (jQuery('#cdnp' + i).attr('checked')) {
        jQuery('#dnp' + i).ready(function () {
          jQuery('#dnp' + i).css({
            display: 'none'
          });
          jQuery('#dirshare' + i).addClass('validatefield validatenumber');
          jQuery('#dirdnp' + i + ' :input').prop('disabled', false);
          jQuery('#promotersname' + i).removeClass('validatefield charsonly').next('span.error_field').css('display', 'none');
          jQuery('#promotersmail' + i).removeClass('validatefield validatemail').next('span.error_field').css('display', 'none');
          jQuery('#promotersshare' + i).removeClass('validatefield validatenumber').next('span.error_field').css('display', 'none').val('');
        });
      } else {
        jQuery('#dnp' + i).css({
          display: ''
        });
        jQuery('#dirshare' + i).removeClass('validatefield validatenumber error');
        jQuery('#dirdnp' + i + ' :input').prop('disabled', true);
        jQuery('#promotersname' + i).addClass('validatefield charsonly').removeClass('error');
        jQuery('#promotersmail' + i).addClass('validatefield validatemail').removeClass('error');
        jQuery('#promotersshare' + i).addClass('validatefield validatenumber').removeClass('error');
        jQuery('#dirshare' + i).val('');
        jQuery('#dirshare' + i).next('span.error_field').css('display', 'none');
      }
    });

      var i = jQuery('.cdnpclas').attr('data-value');
      if (jQuery('#cdnp' + i).attr('checked')) {
        jQuery('#dnp' + i).ready(function () {
          jQuery('#dnp' + i).css({
            display: 'none'
          });
          jQuery('#dirshare' + i).addClass('validatefield validatenumber');
          jQuery('#dirdnp' + i + ' :input').prop('disabled', false);
          jQuery('#promotersname' + i).removeClass('validatefield charsonly').next('span.error_field').css('display', 'none');
          jQuery('#promotersmail' + i).removeClass('validatefield validatemail').next('span.error_field').css('display', 'none');
          jQuery('#promotersshare' + i).removeClass('validatefield validatenumber').next('span.error_field').css('display', 'none').val('');
        });
      } else {
        jQuery('#dnp' + i).css({
          display: ''
        });
        jQuery('#dirshare' + i).removeClass('validatefield validatenumber error');
        jQuery('#dirdnp' + i + ' :input').prop('disabled', true);
        jQuery('#promotersname' + i).addClass('validatefield charsonly').removeClass('error');
        jQuery('#promotersmail' + i).addClass('validatefield validatemail').removeClass('error');
        jQuery('#promotersshare' + i).addClass('validatefield validatenumber').removeClass('error');
        jQuery('#dirshare' + i).val('');
        jQuery('#dirshare' + i).next('span.error_field').css('display', 'none');
      }
  }
  // jQuery('.validatefield').blur(function (index) {
  //   if (jQuery(this).val() == '')
  //   {
  //     jQuery(this).addClass('error');
  //     var id = jQuery(this).attr('id');
  //     var lastChar = id.substr(id.length - 1);
  //     jQuery('#litab' + lastChar).addClass('error');
  //   jQuery('#'+id).next('span.error_field').css('display', 'block');
  //   } 
  //   else
  //   {
  //     jQuery(this).removeClass('error');
  //     var id = jQuery(this).attr('id');
  //     var lastChar = id.substr(id.length - 1);
  //     jQuery('#litab' + lastChar).removeClass('error');
  //    jQuery('#'+id).next('span.error_field').css('display', 'none');
  //   }
  // });

  function validateform() {
    errFlag = 0;
    errArray = [
    ];
    erTab = [
    ];
    jQuery('.validatefield').each(function (index, value) {
      if (jQuery(value).val() == '')
      {
        jQuery(value).addClass('error');
        id = jQuery(value).attr('id');
        lastChar = id.substr(id.length - 1);
        //console.log('id return' + lastChar);
        jQuery('#litab' + lastChar).addClass('error');
        jQuery('#' + id).next('span.error_field').css('display', 'block');
        errArray.push(lastChar);
        errFlag = 1;
      } 
      else
      {
        jQuery(value).removeClass('error');
        id = jQuery(value).attr('id');
        lastChar = id.substr(id.length - 1);
        // console.log('id return' + lastChar);
        jQuery('#' + id).next('span.error_field').css('display', 'none');
        jQuery('#litab' + lastChar).removeClass('error');
      }
    });
    jQuery('.charsonly').each(function (index, value) {
      id = jQuery(value).attr('id');
      if (validateChars(id) == 1)
      {
        lastChar = id.substr(id.length - 1);
        jQuery('#litab' + lastChar).addClass('error');
        errArray.push(lastChar);
        errFlag = 1;
      }
    });
    jQuery('.phone').each(function (index, value) {
      id = jQuery(value).attr('id');
      if (validatePhone(id) == 1)
      {
        lastChar = id.substr(id.length - 1);
        jQuery('#litab' + lastChar).addClass('error');
        errArray.push(lastChar);
        errFlag = 1;
      }
    });
    jQuery('.validatemail').each(function (index, value) {
      id = jQuery(value).attr('id');
      if (validatemail(id) == 1)
      {
        lastChar = id.substr(id.length - 1);
        jQuery('#litab' + lastChar).addClass('error');
        errArray.push(lastChar);
        errFlag = 1;
      }
      email = jQuery(this).val();
      ele = index;
      jQuery('.validatemail').each(function (index, val) {
        email2 = jQuery(this).val();
        if (email == email2 && ele != index)
        {
          errFlag = 1;
          console.log('Email id of all directors should be diffrent');
          jQuery('.display_all_errors').html('Email id of all directors should be diffrent');
          return false;
        }
      });
    });
    jQuery('.validatenumber').each(function (index, value) {
      id = jQuery(value).attr('id');
      if (validateNumber(id) == 1)
      {
        lastChar = id.substr(id.length - 1);
        jQuery('#litab' + lastChar).addClass('error');
        errArray.push(lastChar);
        errFlag = 1;
      }
    });
    // jQuery('.filevalue').each(function (index, value) {
    //   id = jQuery(value).attr('id');
    //   if(validateFile(id)==1)
    //   {
    //     lastChar = id.substr(id.length - 1);
    //     jQuery('#litab' + lastChar).addClass('error');
    //     errArray.push(lastChar);
    //     errFlag = 1;
    //   }
    // });
    var shareval = 0;
    for (i = 1; i <= totalDir; i++)
    {
      if (jQuery('#cdnp' + i).attr('checked'))
      {
        console.log(id + ' = ' + 'dirshare' + i);
        var dirshare = jQuery('#dirshare' + i).val();
        console.log(' check Prev' + shareval);
        shareval = parseInt(shareval, 10) + parseInt(dirshare, 10);
        console.log(' check After' + shareval);
      } 
      else
      {
        console.log(id + ' = ' + 'promotersshare' + i);
        var promotersshare = jQuery('#promotersshare' + i).val();
        console.log(' Uncheck Prev' + shareval);
        shareval = parseInt(shareval, 10) + parseInt(promotersshare, 10);
        console.log(' Uncheck After' + shareval);
      }
    }
    erTab = jQuery.unique(errArray);
    console.log('Total Share is :' + shareval);
    //console.log(erTab);
    allfill = 1;
    if (erTab.length > 0)
    {
      for (i = 0; i < erTab.length; i++)
      {
        jQuery('#litab' + erTab[i]).addClass('error');
      }
      jQuery('.display_all_errors').html('Details of all the directors are need to be field first.').addClass('error_field').css('display', 'block');
      errFlag = 1;
      allfill = 0;
    }
    if (shareval != 100 && allfill == 1)
    {
      errFlag = 1;
      jQuery('.display_all_errors').html('The percent of shareholding is :' + shareval + ', Please Make it to 100').addClass('error_field').css('display', 'block');
    }
    return errFlag;
  }
  jQuery('#directordetails').submit(function () {
    errFlag = 0;
    jQuery('.validatefield').each(function (index, value) {
      if (validateform() == 1)
      {
        errFlag = 1;
        return false;
      }
    });
    if (errFlag == 1)
    {
      return false;
    } 
    else
    {
      jQuery('.listtabs').removeClass('error');
      return true;
    }
    //   if (jQuery(value).val() == '')
    //   {
    //     errFlag = 1;
    //     jQuery(value).addClass('error');
    //     id = jQuery(value).attr('id');
    //     lastChar = id.substr(id.length - 1);
    //     console.log('id return' + id);
    //     jQuery('#litab' + lastChar).addClass('error');
    //     jQuery('#'+id).next('span.error_field').css('display', 'block');
    //   } 
    //   else
    //   {
    //     jQuery(value).removeClass('error');
    //     id = jQuery(value).attr('id');
    //     lastChar = id.substr(id.length - 1);
    //     console.log('id return' + lastChar);
    //     jQuery('#litab' + lastChar).removeClass('error');
    //     jQuery('#'+id).next('span.error_field').css('display', 'none');
    //   }
    // if(validatemail('mailid') ==1)
    // {
    //   errFlag = 1;
    // }
    // if(validateChars('firstname') == 1)
    // {
    //   errFlag = 1;
    // }
    // if(validateChars('lastname') == 1)
    // {
    //   errFlag = 1;
    // }
    // if(validatePhone('contact') == 1)
    // {
    //   errFlag = 1;
    // }
    //   var id,
    //   lastChar, shareval=0 ,
    //   errFlag = 0;
    // jQuery(".display_all_errors").html("");

  });
  jQuery('#s2').click(function () {
    var statelist = jQuery('#statelist').val();
    var numdirectors = jQuery('#numdirectors').val();
    var sharecapital = jQuery('#sharecapital').val();
    if (statelist == 0) {
      jQuery(this).after('<span class="error">Please Select State</span>');
      return false;
    } 
    else {
      jQuery(this).next('span.error').html('');
    }
    if (numdirectors == 0) {
      jQuery(this).after('<span class="error">Please select no of directors</span>');
      return false;
    } 
    else {
      jQuery(this).next('span.error').html('');
    }
    if (sharecapital == '') {
      jQuery(this).after('<span class="error">Please select Share capital</span>');
      return false;
    } 
    else {
      jQuery(this).next('span.error').html('');
    }
    //document.getElementById("fs").style.display = "none";
    //document.getElementById("spt").style.display = "block";

  });
  jQuery('#companyregistrationpvtltd').click(function () {
    v1 = document.getElementById('companyregistrationpvtltd_gov1').innerHTML;
    v2 = document.getElementById('companyregistrationpvtltd_price1').innerHTML;
    jQuery('#companyregistrationpvtltd_gov').val(v1);
    jQuery('#companyregistrationpvtltd_price').val(v2);
  });
  jQuery('.pLogin #login-form').submit(function (event) {
    event.preventDefault();
    var input;
    loginData = jQuery('#login-form').serializeArray();
    myurl = jQuery('#login-form').attr('action');
    console.log(loginData);
    jQuery.ajax({
      async: false,
      url: myurl,
      type: 'POST',
      data: loginData,
    }).done(function (response) {
      var source = jQuery('<div>' + response + '</div>');
      jQuery('.popup_notify').html(source.find('#system-message-container #system-message div div').html());
    });
    jQuery('#login_close').trigger('click');
    jQuery('#' + formId).submit();
    //}
  });
  jQuery('.pRegistration #member-registration').submit(function (event) {
    event.preventDefault();
    var input;
    regform = jQuery('#member-registration').serializeArray();
    serviceRegForm = jQuery('#' + formId).serializeArray();
    RegData = jQuery.merge(regform, serviceRegForm);
    myurl = jQuery('#member-registration').attr('action');
    console.log(RegData);
    jQuery.ajax({
      async: false,
      url: myurl,
      type: 'POST',
      data: RegData,
    }).done(function (response) {
      var source = jQuery('<div>' + response + '</div>');
      jQuery('.popup_notify').html(source.find('#system-message-container #system-message div div').html());
    });
  });
  jQuery('#' + formId).submit(function (event) {
    event.preventDefault();
    var statelist = jQuery('#statelist').val();
    var numdirectors = jQuery('#numdirectors').val();
    var sharecapital = jQuery('#sharecapital').val();
    if (statelist == 0) {
      jQuery('#statelist').next('.error_field').css('display', 'block').html('Please Select State');
      return false;
    }
    if (numdirectors == 0) {
      jQuery('#numdirectors').next('.error_field').css('display', 'block').html('Please select no of directors');
      return false;
    }
    if (sharecapital == '') {
      jQuery('#sharecapital').next('.error_field').css('display', 'block').html('Please select Share capital');
      return false;
    }
    v22 = document.getElementById('govt').innerHTML;
    v21 = document.getElementById('pubt').innerHTML;
    jQuery('#total_gov').val(v22);
    jQuery('#total_price').val(v21);
    v1 = document.getElementById('companyregistrationpvtltd_gov1').innerHTML;
    v2 = document.getElementById('companyregistrationpvtltd_price1').innerHTML;
    jQuery('#companyregistrationpvtltd_gov').val(v1);
    jQuery('#companyregistrationpvtltd_price').val(v2);
    result = 0;
    jQuery.ajax({
      async: false,
      url: '../../index.php/component/fileupload/fileuploadsform?check=nbdq363gdybqw6iedgquygd6uuqwd',
    }).done(function (data) {
      console.log('data: ' + data);
      result = data;
    });
    console.log('result chk ' + result);
    if (result == '0' || result == 0) {
      jQuery('#login_fade').show();
      jQuery('#login_light').slideDown('slow');
      jQuery('#login_close').show();
      jQuery('#login_popup').show();
      return false;
    } 
    else {
      serviceRegForm = jQuery('#' + formId).serializeArray();
      myurl = jQuery('#' + formId).attr('action');
      console.log(serviceRegForm);
      jQuery.ajax({
        async: false,
        url: myurl,
        type: 'POST',
        data: serviceRegForm,
      }).done(function (response) {
        var source = jQuery('<div>' + response + '</div>');
        response = source.find('#fileStatus').html();
        redirect = source.find('#redirectUrl').html();
        redirect += '&params=2';
        if (response >= 1 || response >= '1')
        {

          window.location.href = redirect;
        } 
        else
        {
          alert('Please Retry');
        }
      });
    }
  });
  //  alert("sumit");
  //  /* Act on the event */
  //      console.log("go buddy");
  // });
  // if (contCount != 1 )
  // {
  //   result = 0;
  //   jQuery.ajax({
  //     url: '../../index.php/component/fileupload/files',
  //     async: false,
  //     data: {
  //       registerdetails: 1,
  //       serviceId: formId,
  //       statelist: statelist,
  //       numdirectors: numdirectors,
  //       sharecapital: sharecapital
  //     },
  //     success: function (data) {
  //       result = data;
  //     }
  //   });
  //   if (result == '1' || result == 1)
  //   {
  //     return true;
  //   } 
  //   else
  //   {
  //     jQuery('#fade').show();
  //     jQuery('#light').show();
  //     jQuery('#popuclose').show();
  //     jQuery('#popcon').html(result);
  //     return false;
  //   }
  // } 
  // else
  // {
  //   return true;
  // }
  // jQuery('.popupContinue').click(function (event) {
  //     event.preventDefault();
  //     contCount = 1;
  //     jQuery('#'+formId).submit();
  // });
  function showMsg(hasCurrentJob, sender) {
    if (hasCurrentJob == 'True') {
      alert('The current clients has a job in progress. No changes can be saved until current job completes');
      if (sender != null) {
        sender.preventDefault();
      }
      return false;
    }
  }
  jQuery('#cbs1').click(function () {
    // document.getElementById("fs").style.display = "block";
    // document.getElementById("spt").style.display = "none";
  });
  // jQuery('#cdnp').change(function () {
  //   if (jQuery('#cdnp').attr('checked'))
  //   {
  //     document.getElementById('dnp').style.display = 'none';
  //     jQuery('#promotersname').attr('required', false);
  //     jQuery('#promotersmail').attr('required', false);
  //     jQuery('#promotersshare').attr('required', false);
  //   } 
  //   else
  //   {
  //     document.getElementById('dnp').style.display = 'block';
  //     jQuery('#promotersname').attr('required', 'true');
  //     jQuery('#promotersmail').attr('required', 'true');
  //     jQuery('#promotersshare').attr('required', 'true');
  //   }
  // });
  function price_cal() {
    var nthTd = jQuery('table#sptable .govval');
    //console.log("nthtd is "+nthTd + "and data coloun is "+ dataInfo);
    sumGovt = sumOfCols(nthTd);
    console.log('Govet Sum is ' + sumGovt);
    var nthTd = jQuery('table#sptable .prival');
    //console.log("nthtd is "+nthTd + "and data coloun is "+ dataInfo);
    sumPrice = sumOfCols(nthTd);
    console.log('Price Sum is ' + sumPrice);
    document.getElementById('govt').innerHTML = sumGovt;
    document.getElementById('pubt').innerHTML = sumPrice;
    ttl = parseInt(sumGovt) + parseInt(sumPrice);
    document.getElementById('pc_tot').innerHTML = ttl;
  }
  jQuery('#companyregistrationpvtltd_gov').click(function (event) {
    event.preventDefault();
    price_cal();
  });
  jQuery('#ptltt1').click(function () {
    if (jQuery('#ptltt1').attr('checked'))
    {
      jQuery('#ptl1t1').addClass('govval');
      jQuery('#ptlt1').addClass('prival');
      v1 = jQuery('#ptl1t1').html();
      v2 = jQuery('#ptlt1').html();
      jQuery('#ptl1t1_price').val(v1);
      jQuery('#ptlt1_gov').val(v2);
      price_cal();
    } 
    else
    {
      jQuery('#ptl1t1').removeClass('govval');
      jQuery('#ptlt1').removeClass('prival');
      jQuery('#ptl1t1_price').val(0);
      jQuery('#ptlt1_gov').val(0);
      price_cal();
    }
  });
  jQuery('#ptltt3').click(function () {
    if (jQuery('#ptltt3').attr('checked'))
    {
      jQuery('#ptl1t3').addClass('govval');
      jQuery('#ptlt3').addClass('prival');
      v1 = jQuery('#ptlt3').html();
      v2 = jQuery('#ptl1t3').html();
      jQuery('#ptl1t3_price').val(v1);
      jQuery('#ptlt3_gov').val(v2);
      price_cal();
    } 
    else
    {
      jQuery('#ptl1t3').removeClass('govval');
      jQuery('#ptlt3').removeClass('prival');
      jQuery('#ptl1t3_price').val(0);
      jQuery('#ptlt3_gov').val(0);
      price_cal();
    }
  });
  jQuery('#ptltt4').click(function () {
    if (jQuery('#ptltt4').attr('checked'))
    {
      jQuery('#ptlt4').addClass('prival');
      v1 = jQuery('#ptlt4').html();
      jQuery('#ptl1t4_price').val(v1);
      price_cal();
    } 
    else
    {
      jQuery('#ptlt4').removeClass('prival');
      jQuery('#ptl1t4_price').val(0);
      price_cal();
    }
  });
  jQuery('#ptltt5').click(function () {
    if (jQuery('#ptltt5').attr('checked'))
    {
      jQuery('#ptlt5').addClass('prival');
      v1 = jQuery('#ptlt5').html();
      jQuery('#ptl1t5_price').val(v1);
      price_cal();
    } 
    else
    {
      jQuery('#ptlt5').removeClass('prival');
      jQuery('#ptl1t5_price').val(0);
      price_cal();
    }
  });
  //
  page_loaded = true;
  headerHeight = jQuery('#gkHeader').outerHeight();
  // smooth anchor scrolling
  //new SmoothScroll(); 
  // style area
  if (jQuery('#gkStyleArea')) {
    jQuery('#gkStyleArea').find('a').each(function (i, element) {
      jQuery(element).click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        changeStyle(i + 1);
      });
    });
  }
  // font-size switcher

  if (jQuery('#gkTools') && jQuery('#gkMainbody')) {
    var current_fs = 100;
    jQuery('#gkMainbody').css('font-size', current_fs + '%');
    jQuery('#gkToolsInc').click(function (e) {
      e.stopPropagation();
      e.preventDefault();
      if (current_fs < 150) {
        jQuery('#gkMainbody').animate({
          'font-size': (current_fs + 10) + '%'
        }, 200);
        current_fs += 10;
      }
    });
    jQuery('#gkToolsReset').click(function (e) {
      e.stopPropagation();
      e.preventDefault();
      jQuery('#gkMainbody').animate({
        'font-size': '100%'
      }, 200);
      current_fs = 100;
    });
    jQuery('#gkToolsDec').click(function (e) {
      e.stopPropagation();
      e.preventDefault();
      if (current_fs > 70) {
        jQuery('#gkMainbody').animate({
          'font-size': (current_fs - 10) + '%'
        }, 200);
        current_fs -= 10;
      }
    });
  }
  // K2 font-size switcher fix

  if (jQuery('#fontIncrease') && jQuery('.itemIntroText')) {
    jQuery('#fontIncrease').click(function () {
      jQuery('.itemIntroText').attr('class', 'itemIntroText largerFontSize');
    });
    jQuery('#fontDecrease').click(function () {
      jQuery('.itemIntroText').attr('class', 'itemIntroText smallerFontSize');
    });
  }
  if (jQuery('#system-message-container a.close')) {
    jQuery('#system-message-container').find('a.close').each(function (i, element) {
      jQuery('#system-message-container').css({
        'display': 'block'
      });
      jQuery(element).click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        jQuery(element).parents().eq(2).fadeOut();
        (function () {
          jQuery(element).parents().eq(2).css({
            'display': 'none'
          });
        }).delay(500);
      });
    });
  }
  // create the list of elements to animate

  jQuery('.gkHorizontalSlideRightColumn').each(function (i, element) {
    elementsToAnimate.push(['animation',
    element,
    jQuery(element).offset().top]);
  });
  jQuery('.layered').each(function (i, element) {
    elementsToAnimate.push(['animation',
    element,
    jQuery(element).offset().top]);
  });
  jQuery('.gkPriceTableAnimated').each(function (i, element) {
    elementsToAnimate.push(['queue_anim',
    element,
    jQuery(element).offset().top]);
  });
});
//
jQuery(window).scroll(function () {
  // menu animation
  if (page_loaded && jQuery('body').hasClass('imageBg')) {
    // if menu is not displayed now
    if (jQuery(window).scrollTop() > headerHeight && !jQuery('#gkMenuWrap').hasClass('active')) {
      //document.id('gkHeaderNav').inject(document.id('gkMenuWrap'), 'inside');
      jQuery('#gkMenuWrap').append(jQuery('#gkHeaderNav'));
      jQuery('#gkHeader').attr('class', 'gkNoMenu');
      // hide
      jQuery('#gkMenuWrap').attr('class', 'active');
    }
    //

    if (jQuery(window).scrollTop() <= headerHeight && jQuery('#gkMenuWrap').hasClass('active')) {
      jQuery('#gkHeader').first('div').css('display', 'block');
      jQuery('#gkHeader').first('div').prepend(jQuery('#gkHeaderNav'));
      jQuery('#gkHeader').attr('class', '');
      jQuery('#gkMenuWrap').attr('class', '');
    }
  }
  // animate all right sliders

  if (elementsToAnimate.length > 0) {
    // get the necessary values and positions
    var currentPosition = jQuery(window).scrollTop();
    var windowHeight = jQuery(window).outerHeight();
    // iterate throught the elements to animate
    if (elementsToAnimate.length) {
      for (var i = 0; i < elementsToAnimate.length; i++) {
        if (elementsToAnimate[i][2] < currentPosition + (windowHeight / 2)) {
          // create a handle to the element
          var element = elementsToAnimate[i][1];
          // check the animation type
          if (elementsToAnimate[i][0] == 'animation') {
            //console.log('(XXX)' + elementsToAnimate[i][2]);
            gkAddClass(element, 'loaded', false);
            // clean the array element
            elementsToAnimate[i] = null;
          }
          // if there is a queue animation
           else if (elementsToAnimate[i][0] == 'queue_anim') {
            //console.log('(XXX)' + elementsToAnimate[i][2]);
            jQuery(element).find('dl').each(function (j, item) {
              gkAddClass(item, 'loaded', j);
            });
            // clean the array element
            elementsToAnimate[i] = null;
          }
        }
      }
      // clean the array

      elementsToAnimate = elementsToAnimate.clean();
    }
  }
});
//
function gkAddClass(element, cssclass, i) {
  var delay = jQuery(element).attr('data-delay');
  if (!delay) {
    delay = (i !== false) ? i * 150 : 0;
  }
  setTimeout(function () {
    jQuery(element).addClass(cssclass);
  }, delay);
}
//

jQuery(window).ready(function () {
  //
  var menuwrap = new jQuery('<div />', {
    'id': 'gkMenuWrap'
  });
  //
  jQuery('body').append(menuwrap);
  //
  if (!jQuery('body').hasClass('imageBg')) {
    jQuery('#gkMenuWrap').append(jQuery('#gkHeaderNav'));
    jQuery('#gkHeader').attr('class', 'gkNoMenu');
    jQuery('#gkHeader > div').first().css('display', 'none');
    jQuery('#gkMenuWrap').attr('class', 'active');
  }
  //
  // some touch devices hacks
  //
  // hack modal boxes ;)

  jQuery('a.modal').each(function (i, link) {
    // register start event
    var lasttouch = [
    ];
    // here
    jQuery(link).bind('touchstart', function (e) {
      lasttouch = [
        link,
        new Date().getTime()
      ];
    });
    // and then
    jQuery(link).bind('touchend', function (e) {
      // compare if the touch was short ;)
      if (lasttouch[0] == link && Math.abs(lasttouch[1] - new Date().getTime()) < 500) {
        window.location = jQuery(link).attr('href');
      }
    });
  });
});
// Function to change styles
function changeStyle(style) {
  var file1 = $GK_TMPL_URL + '/css/style' + style + '.css';
  var file2 = $GK_TMPL_URL + '/css/typography/typography.style' + style + '.css';
  var file3 = $GK_TMPL_URL + '/css/typography/typography.iconset.style' + style + '.css';
  jQuery('head').append('<link rel="stylesheet" href="' + file1 + '" type="text/css" />');
  jQuery('head').append('<link rel="stylesheet" href="' + file2 + '" type="text/css" />');
  jQuery('head').append('<link rel="stylesheet" href="' + file3 + '" type="text/css" />');
  jQuery.cookie('gk_simplicity_j30_style', style, {
    expires: 365,
    path: '/'
  });
}
jQuery(window).load(function () {
  if (elementsToAnimate.length > 0) {
    // get the necessary values and positions
    var currentPosition = jQuery(window).scrollTop();
    var windowHeight = jQuery(window).outerHeight();
    // iterate throught the elements to animate
    if (elementsToAnimate.length) {
      for (var i = 0; i < elementsToAnimate.length; i++) {
        if (elementsToAnimate[i][2] < currentPosition + (windowHeight / 2)) {
          // create a handle to the element
          var element = elementsToAnimate[i][1];
          // check the animation type
          if (elementsToAnimate[i][0] == 'animation') {
            //console.log('(XXX)' + elementsToAnimate[i][2]);
            gkAddClass(element, 'loaded', false);
            // clean the array element
            elementsToAnimate[i] = null;
          }
          // if there is a queue animation
           else if (elementsToAnimate[i][0] == 'queue_anim') {
            //console.log('(XXX)' + elementsToAnimate[i][2]);
            jQuery(element).find('dl').each(function (j, item) {
              gkAddClass(item, 'loaded', j);
            });
            // clean the array element
            elementsToAnimate[i] = null;
          }
        }
      }
      // clean the array

      elementsToAnimate = elementsToAnimate.clean();
    }
  }
});
//Function for services tab
jQuery(document).ready(function () {
  jQuery('.tabb-links li a').on('click', function (e) {
    var currentAttrValue = jQuery(this).attr('href');
    // Show/Hide Tabs
    jQuery('.tabb-content ' + currentAttrValue).show().siblings().hide();
    // Change/remove current tab to active
    jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
    return false;
  });
});
