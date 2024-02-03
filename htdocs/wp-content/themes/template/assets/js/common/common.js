/* ページ内リンクの処理  */
$(function () {
  var w = $(window).width();
  var x = 767;
  var headerHight = 65; // ヘッダーの高さ（PC）
  if (w <= x) {
    // ページ表示時のブラウザ横幅が767px以下の場合
    var headerHight = 60; // ヘッダーの高さ（SP）
  }
  var timer = false;
  $(window).resize(function () {
    if (timer !== false) {
      clearTimeout(timer);
    }
    timer = setTimeout(function () {
      var w = $(window).width();
      var x = 767;
      if (w <= x) {
        // 767px以下
        var headerHight = 60; // ヘッダーの高さ（SP）
      } else {
        // 767px以上
        var headerHight = 65; // ヘッダーの高さ（PC）
      }
    }, 0);
  });

  // #で始まるアンカーをクリックした場合に処理
  $('a[href^="#"]').on('click', function () {
    // スクロールの速度
    var speed = 400; // ミリ秒
    // アンカーの値取得
    var href = $(this).attr("href");
    // 移動先を取得
    var target = $(href == "#" || href == "" ? 'html' : href);
    // 移動先を数値で取得
    var position = target.offset().top - headerHight;
    // スムーススクロール
    $('body,html').animate({ scrollTop: position }, speed, 'swing');
    return false;
  });
});


$(function () {
  // ヘッダー・ナビ スクロール処理
  var win = $(window);
  win.on('load scroll', function () {
    var value = $(this).scrollTop();
    if (value > 150) {
      $('.header').addClass('scroll');
      $('.nav').addClass('scroll');
    } else {
      $('.header').removeClass('scroll');
      $('.nav').removeClass('scroll');
    }
  });

  // ヘッダー 【記事を検索】処理
  $('.header_menu_search').on('click', function () {
    $(this).toggleClass('is-active');
    $('.header_searchBox').toggleClass('is-active');
  });
  $('.header_searchBox_close').on('click', function () {
    $('.header_searchBox').removeClass('is-active');
    $('.header_menu_search').removeClass('is-active');
  });

  // ナビ 表示中のページを判別し、class付与
  $('.nav ul li a').each(function () {
    var href = $(this).attr('href');
    if (location.href.match(href)) {
      $(this).addClass('current');
    } else {
      $(this).removeClass('current');
    }
  });

  // 【記事】カテゴリーリスト 表示中のページを判別し、class付与
  $('.blogBox_catList ul li a').each(function () {
    var href = $(this).attr('href');
    if (location.href.match(href)) {
      $(this).addClass('current');
    } else {
      $(this).removeClass('current');
    }
  });

  // フッターバナー追従
  var win = $(window);
  win.on('load scroll', function () {
    var value = $(this).scrollTop();
    if (value > 400) {
      $('.common_fixedBanner').addClass('is-scroll');
    } else {
      $('.common_fixedBanner').removeClass('is-scroll');
    }
  });
  $('.common_fixedBanner_close').on('click', function () {
    $('.common_fixedBanner').hide();
  });

  //pageトップへ
  $('#pageTop').on('click', function () {
    $('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
});