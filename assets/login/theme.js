(function ($) {
  'use strict';

  window.theme = {
    color: {
      primary: '#d21006',
      info: '#7258ff',
      success: '#5bc146',
      warning: '#ffd14d',
      danger: '#fe4d62'
    },
    setting: {
      stickyHeader: true,
      stickyAside: true,
      foldedAside: true,
      hideAside: false,
      bg: '',
      header: 'bg-white',
      aside: 'bg-white'
    }
  };

  // ie
  if (!!navigator.userAgent.match(/MSIE/i) || !!navigator.userAgent.match(/Trident.*rv:11\./)) {
    $('body').addClass('ie');
  }

  // iOs, Android, Blackberry, Opera Mini, and Windows mobile devices
  var ua = window['navigator']['userAgent'] || window['navigator']['vendor'] || window['opera'];
  if ((/iPhone|iPod|iPad|Silk|Android|BlackBerry|Opera Mini|IEMobile/).test(ua)) {
    $('body').addClass('touch');
  }

  // fix z-index on ios safari
  if ((/iPhone|iPod|iPad/).test(ua)) {
    $(document, '.modal, .aside').on('shown.bs.modal', function (e) {
      var backDrop = $('.modal-backdrop');
      $(e.target).after($(backDrop));
    });
  }

  //resize
  $(window).on('resize', function () {
    var $w = $(window).width(),
      $lg = 1200,
      $md = 991,
      $sm = 768;
    if ($w > $lg) {
      $('.aside-lg').modal('hide');
    }
    if ($w > $md) {
      $('#aside').modal('hide');
      $('.aside-md, .aside-sm').modal('hide');
    }
    if ($w > $sm) {
      $('.aside-sm').modal('hide');
    }
  });

  // toggleClass
  $(document).on('click', '[data-toggle-class]', function (e) {
    var $self = $(this);
    var attr = $self.attr('data-toggle-class');
    var target = $self.attr('data-toggle-class-target') || $self.attr('data-target');
    var closest = $self.attr('data-target-closest');
    var classes = (attr && attr.split(',')) || '',
      targets = (target && target.split(',')) || Array($self),
      key = 0;
    $.each(classes, function (index, value) {
      var target = closest ? $self.closest(targets[(targets.length == 1 ? 0 : key)]) : $(targets[(targets.length == 1 ? 0 : key)]),
        current = target.attr('data-class'),
        _class = classes[index];
      (current != _class) && target.removeClass(target.attr('data-class'));
      target.toggleClass(classes[index]);
      target.attr('data-class', _class);
      key++;
    });
    $self.toggleClass('active');
    $self.attr('href') == "#" ? e.preventDefault() : '';
  });

  var init = function () {

    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

    // init the plugin
    $(document).find('[data-plugin]').plugin();

    // active nav item
    var url = window.location.pathname.split('/');
    if (url.length > 0) url = url[url.length - 1];
    $('[data-nav] li.active').removeClass('active');
    $('[data-nav] a').filter(function () {
      return url == $(this).attr('href') && $(this).attr('href') !== '#';
    }).parents('li').addClass('active');

  }

  init();

  $(document).on('pjaxEnd', function () {
    init();
  });

  var namespace = theme.color.primary + '-setting';

  if (!store(namespace)) {
    store(namespace, theme.setting);
  } else {
    theme.setting = store(namespace);
  }

  var v = window.location.search.substring(1).split('&');

  for (var i = 0; i < v.length; i++) {
    var n = v[i].split('=');
    theme.setting[n[0]] = (n[1] == "true" || n[1] == "false") ? (n[1] == "true") : n[1];
    store(namespace, theme.setting);
  }

  $(document).on('click.setting', '.setting input', function (e) {
    var $this = $(this),
      $attr = $this.attr('name');
    theme.setting[$attr] = $this.is(':checkbox') ? $this.prop('checked') : $(this).val();
    store(namespace, theme.setting);
    setTheme(theme.setting);
  });

  setTheme();

  // set theme
  function setTheme() {
    var that = $('.setting');
    // bg
    $('body').removeClass($('body').attr('data-class')).addClass(theme.setting.bg).attr('data-class', theme.setting.bg);
    // header
    $('#header').removeClass($('#header').attr('data-class')).addClass(theme.setting.header).attr('data-class', theme.setting.header);
    // aside
    $('#aside').removeClass($('#aside').attr('data-class')).addClass('folded').attr('data-class', 'folded');
    // folded
    theme.setting.foldedAside ? $('#aside').addClass('folded') : $('#aside').addClass('folded');
    theme.setting.hideAside ? $('#aside').addClass('hide') : $('#aside').removeClass('hide');
    // sticky header
    theme.setting.stickyHeader ? $('.page-header').addClass('sticky') : $('.page-header').addClass('sticky');
    // sticky aside
    theme.setting.stickyAside ? $('.page-sidenav').addClass('sticky') : $('.page-sidenav').addClass('sticky');

    that.find('input[name="foldedAside"]').prop('checked', theme.setting.foldedAside);
    that.find('input[name="hideAside"]').prop('checked', theme.setting.hideAside);
    that.find('input[name="stickyHeader"]').prop('checked', theme.setting.stickyHeader);
    that.find('input[name="stickyAside"]').prop('checked', theme.setting.stickyAside);

    that.find('input[name="bg"][value="' + theme.setting.bg + '"]').prop('checked', true);
  }

  // save setting to localstorage
  function store(namespace, data) {
    try {
      if (arguments.length > 1) {
        return localStorage.setItem(namespace, JSON.stringify(data));
      } else {
        var store = localStorage.getItem(namespace);
        return (store && JSON.parse(store)) || false;
      }
    } catch (err) {

    }
  }

  window.hexToRGB = function (hex, alpha) {
    var r = parseInt(hex.slice(1, 3), 16),
      g = parseInt(hex.slice(3, 5), 16),
      b = parseInt(hex.slice(5, 7), 16);
    return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
  };

  $('input[name="stickyAside"]').prop('checked', 'checked');

})(jQuery);

$(document).ready(function () {

  $("#feed-form-0 .share-feed, #feed-form-0 .post-trigger, #feed-form-0 .toolbar").click(function (e) {
    e.preventDefault();
    $("#feed-form-1, .post-overlay").fadeToggle(100);
    $("#feed-form-0").hide();
    $("#feed-form-00").hide();
    $("#orig_toolbar").hide();
  });

  $(document).click(function (e) {
    if (!$(e.target).is("#feed-form-1, #feed-form-1 *, #feed-form-0, #feed-form-0 *")) {
      $("#feed-form-1, .post-overlay").hide();
      $("#feed-form-0").fadeIn(100);
      $("#feed-form-00").show();
      $("#orig_toolbar").fadeIn(100);
    }
  });

  $(".sort-view .nav-link").click(function (e) {
    e.preventDefault();
    $('.sort-view .nav-link.active').not(this).removeClass('active');
    $(this).addClass('active');

    if ($('.month-sort.active').length) {
      $('#fullcalendar').fadeIn();
    } else {
      $('#fullcalendar').hide();
    }

    if ($('.all-sort.active').length) {
      $('.events-timeline').fadeIn();
    } else {
      $('.events-timeline').hide();
    }

  });

  $('.to-do input[type="checkbox"]').click(function (e) {
    if ($(this).prop('checked')) {
      $(this).closest('.list-item').find('.item-author').addClass('task-complete');
    } else {
      $(this).closest('.list-item').find('.item-author').removeClass('task-complete');
    }
  });

  var readURL = function (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('.profile-img').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  };


  $(".image-upload").on('change', function () {
    readURL(this);
  });

  $(".upload-icon, .card .image-profile:after").on('click', function () {
    $(".image-upload").click();
  });

  $(".select-role").click(function (e) {
    e.preventDefault();
    $('.select-role.active').not(this).removeClass('active');
    $(this).addClass('active');
  });

  $('.profile-more').on('click', function () {
    $(this).parent().find('.bar').toggleClass('animate');
    var mobileNav = $(this).parent().find('.profile-nav');
    mobileNav.toggleClass('profile-hide profile-show');
  });
  $('#feed-form-0').on('click', function () {
    $("#user-status textarea").trigger("focus");
    console.log("clicked");
  });

  $('#user-status textarea').on('input', function () {
    $(this).trigger('change');
    var status_text = $(this).val();
    console.log(status_text)
    $('#user-status .form-control[readonly]').val(status_text);
  });



  $('.investors-categories a').on('click', function (e) {

    $('html, body').animate({
      scrollTop: $(".user-table input.search").offset().top - 80
    }, 400);

    e.preventDefault();

    var getCategory = $(this).find('.item-author').text();
    console.log(getCategory);

    $(".user-table input.search").val(getCategory);
    $(".user-table input.search").trigger(jQuery.Event('keydown', {
      keycode: 40
    }));

  });




  $(".invite .close-icon, .startup-entry button").click(function() {
    $(".modal-backdrop, .modal")
      .removeClass("show")
      .hide();
  });
});
