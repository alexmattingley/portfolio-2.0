(function($){

  window.myPortfolio = {};

  var portfolioObject = window.myPortfolio; 
  
  var $window = $(window);

  portfolioObject.init = function(){
    portfolioObject.removeLoad();
    portfolioObject.setElements();
    portfolioObject.heroHeight();
    portfolioObject.projectFadeIn();
    portfolioObject.setVertRows();
    portfolioObject.vertScroll();
    portfolioObject.even_column();
    portfolioObject.addContact();
    portfolioObject.slowScroll();
    portfolioObject.hugeNav();
    portfolioObject.scrolldown();
  };

  portfolioObject.setElements = function(){
    portfolioObject.elems             = {};
    portfolioObject.elems.href        = window.location.pathname;
    portfolioObject.elems.previousUrl = document.referrer;
  };


  /***********************
  Method Name: ;
  Params: None
  Purpose: Create type effect in hero banner.
  Globals: blinking_cursor, type_boolean, end_typing, current_string_index. targe_dom, output_string, min_interval, max_interval
  returns: None
  ***********************/

portfolioObject.removeLoad = function(){
  $('.loading-screen').slideToggle('slow', portfolioObject.typeEffect());
};

  /***********************
  Method Name: typeEffect();
  Params: None
  Purpose: Create type effect in hero banner.
  Globals: blinking_cursor, type_boolean, end_typing, current_string_index. targe_dom, output_string, min_interval, max_interval
  returns: None
  ***********************/

  var blinking_cursor = "<span id='cursor'>|</span>";
  var type_boolean = false;
  var end_typing = false;
  var current_string_index;
  var target_dom;
  var output_string;
  var min_interval;
  var max_interval;

  portfolioObject.typeEffect = function(){
    if(type_boolean === false && end_typing === false){
      current_string_index = 0;
      target_dom = $('.home-page-hero h1');
      output_string = "hello.";
      min_interval = 200;
      max_interval = 300;
      setTimeout(function(){
        typeEffectHelper();
      }, 1500);
      type_boolean = true;
    }else if(type_boolean === true && end_typing === false){
      current_string_index = 0;
      target_dom = $('.home-page-hero p');
      output_string = "My name is Alex Mattingley and I develop websites and applications.";
      min_interval = 30;
      max_interval = 100;
      typeEffectHelper();
      type_boolean = true;
      end_typing = true;
    }else if (end_typing === true) {
      heroButtonFadeIn();
    }

    function typeEffectHelper() {
      var interval_delta = max_interval - min_interval;
      if(current_string_index <  output_string.length){
        target_dom.html(target_dom.html()+output_string[current_string_index++] + blinking_cursor);
        var random_time = Math.floor(Math.random()*interval_delta+ min_interval);
        setTimeout(function(){
          typeEffectHelper();
        }, random_time);
        setTimeout(function(){
          $('#cursor').remove();
        }, random_time);
      }else{
        current_string_index = 0;
        portfolioObject.typeEffect();
      }
    }

    function heroButtonFadeIn() {
      $('.hero-text a').slideToggle(500);
    }
  };
  // portfolioObject.cursorAnimation = function(){ //this is not being used right now.
  //   $('#cursor').animate({
  //     opacity: 0
  //   }, 'slow', 'swing').animate({
  //     opacity: 1
  //   }, 'slow', 'swing');
  // };

  /****END TYPE EFFECT BLOCK*****/

  /***********************
  Method Name: projectFadeIn();
  Params: None
  Purpose: fade in text on hover over project
  Globals: None
  returns: None
  ***********************/

  portfolioObject.projectFadeIn = function(){
    $('.indiv-project').on('mouseenter', function(){
      $(this).find('p').fadeIn(2000);
    });
  };

  /***********************
  Method Name: setVertRows();
  Params: None
  Purpose: Set vertical scroll row number and height
  Globals: None
  returns: None
  ***********************/

  var row_number;
  var indiv_projects = $('.work-block ul li');

  portfolioObject.setVertRows = function(){

    //Set the height for the rows
    var project_row_height = indiv_projects.outerHeight(true);
    $('.work-block ul.list-unstyled').css('height', project_row_height);

    //variables for the click of the down arrow
    var project_number = indiv_projects.length;
    row_number = project_number;
    if(window.innerWidth > 992){
      row_number = project_number / 3;
    }else {
      row_number = project_number;
    }
  };

  var project_load_click = 0;

  portfolioObject.vertScroll = function(){
    //action that occurs on the click of the work block down arrow
    $('body').on('click', '.work-block h5', function(){
      project_load_click = ++project_load_click;
      if (project_load_click < row_number) {
        indiv_projects.animate({top: '-=100%'}, 1000);
      }else {
        indiv_projects.animate({top: '0%'}, 1000);
        project_load_click = 0;
      }
    });
  };

  /***********************
    Method Name: even_column();
    Params: None
    Purpose: Creates equal height columns when neccesary.
    Globals: None
    returns: None
    ***********************/

  portfolioObject.even_column = function(){
    var columns = $('.even-col li'); //creates an object with many different values
    var column_height_array = [];
    if(window.innerWidth > 768){
      for(var i = 0; i < columns.length; i++){
        column_height_array[i] = columns[i].clientHeight;
      }
      //This is the fallback in case none of the proceeding elements are higher than the first element in the array
      var highest_column = column_height_array[0];
      for(j = 0; j < column_height_array.length; j++){
        if(highest_column <= column_height_array[j]){
          highest_column = column_height_array[j];
        }
      }
      columns.height(highest_column);
    }
  };

  /***********************
    Method Name: find_auto_height;
    Params: None
    Purpose: Resets block heights when the browser gets resized
    Globals: None
    returns: None
    ***********************/

  portfolioObject.find_auto_height = function(){
    var total_col_height = [];
    var columns = $('.even-col li');
    var column_icon = $('.even-col li i');
    var column_h4 = $('.even-col li h4');
    var column_p = $('.even-col li p');
    var column_h4_margins = parseInt(column_h4.css('marginTop')) + parseInt(column_h4.css('marginBottom'));
    var column_p_margins = parseInt(column_p.css('marginTop')) + parseInt(column_p.css('marginBottom'));
    var column_padding = parseInt(columns.css('paddingTop')) + parseInt(columns.css('paddingBottom'));
    for(var i =0; i < columns.length; i++){
      total_col_height[i] = column_icon[i].clientHeight + column_h4[i].clientHeight + column_p[i].clientHeight + column_h4_margins + column_p_margins + column_padding; 
    }
    var highest_column = total_col_height[0];
      for(j = 0; j < total_col_height.length; j++){
        if(highest_column <= total_col_height[j]){
          highest_column = total_col_height[j];
        }
      }
    columns.height(highest_column);
  };




  /***********************
    Method Name: addContact();
    Params: None
    Purpose: Adds contact information to prevent scraping
    Globals: None
    returns: None
    ***********************/

  portfolioObject.addContact = function(){
    var email_add = $('.email_add');
    var e_icon = '<span class="glyphicon glyphicon-envelope"></span>';
    var e_name = ' alexmattingley';
    var server_name = '@gmail.com';
    var phe_class = $('.p_Num');
    var phe_icon = '<span class="glyphicon glyphicon-phone-alt"></span>';
    var pNum = ' (949) 280-6557';
    email_add.html(e_icon + e_name + server_name);
    phe_class.html(phe_icon + pNum);
  };
 

  /**************************
  Method Name: heroHeight()
  Purpose: this is here to fix the 100vh bug in mobile safari.
          basically mobile safari has a bottom status bar that isn't included in the 100vh calculation
          this results in the 100vh being more like 100vh + 70px. the function below fixes that.
  Globals: None
  Returns: None
  Params: None
  **************************/

  portfolioObject.heroHeight = function(){

    if (!$('.hero-banner').length) { return; }

    function mobileHeaderHeight() {
      var hero = $('.hero-banner');
      var windowHeight = window.innerHeight;

      if ($('body').width() < 769) {
        hero.css('min-height', windowHeight + 'px');
      } else {
        hero.css('min-height', '');
      }
    }

    mobileHeaderHeight();

    $(window).on('resize', mobileHeaderHeight);


  };

  /***************************
  FunctionName: slowScroll()
  purpose: slowscrolls for hyperlink jumps
  globals: N/a
  returns: false
  ****************************/ 

  portfolioObject.slowScroll = function(){

    $('a[href*=\\#]:not([href=\\#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });

  };

  /***********************
  Method Name: scrolldown;
  Params: None
  Purpose: On project pages, it will scroll down to the beginning of the block which talks about the project.
  Globals: None
  returns: None
  ***********************/

  portfolioObject.scrolldown = function(){
    if(document.getElementById('project-section')){
      $('html, body').animate({
          scrollTop: $("#project-section").offset().top
      }, 1000);
    }
  };

  /***************************
  FunctionName: hugeNav();
  purpose: huge navigation trigger
  globals: N/a
  returns: false
  ****************************/ 


  portfolioObject.hugeNav = function(){
    $('.nav-trigger').click(function(){
      $('.header-nav').toggleClass('active');
      $('nav').toggleClass('active');
    });
    $('#menu-main-nav a').click(function(){
      $('.header-nav').removeClass('active');
      $('nav').removeClass('active');
    });
  };


$(window).resize(function() {
  
  portfolioObject.setVertRows();
  portfolioObject.find_auto_height();
});


$window.load(function(){

});

$(document).ready(function(){

  portfolioObject.init();

});//close document ready


})(window.jQuery);
