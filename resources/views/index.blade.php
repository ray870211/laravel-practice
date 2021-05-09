@extends('layouts.app')

@section('cotent')
<main>
  <section>
    <!-- 首頁標語 -->
    <div class="pb-row">
      <div class="col-phone-100">
        <div class="index-cover">
          <div class="index-container">
            <h1 class="_title">進度條線上課程範例</h1>
            <div>
              <a href="https://progressbar.tw/users/sign_in" target="_pb">
                <button type="button" class="btn btn_light">
                  登入
                </button>
              </a>
              <a href="https://progressbar.tw/users/sign_up" target="_pb">
                <button type="button" class="btn btn_dark">
                  註冊
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <!-- cards -->
    <div class="pb-container">
      <div class="pb-row">
        <div class="col-phone-100 col-tablet-50">
          <div class="card">
            <div class="_image">
              <div class="ratio_3_2">
                <img class="ratio_content" src="/imgs/large-card1.jpg">
              </div>
            </div>
            <div class="_content">
              <a class="_link" href="https://progressbar.tw/courses/3" target="_pb">
                <h4 class="_title">
                  快速開發，從頭教起的Ruby on Rails後端之旅
                </h4>
              </a>
              <p class="_detail">
                Ruby on
                rails是一個適合快速開發網站的後端程式架構，Airbnb、Github、Twitter等大型新創公司都是靠它起家。它也長年佔據高年薪程式語言的前面名次。本課程從頭教起，讓你了解快速開發可以為你省下多少的人生！
              </p>
            </div>
            <div class="_action">
              <div class="_action_content">
                <a class="_link" href="https://progressbar.tw/courses/3" target="_pb">
                  <button class="btn" type="button">
                    閱讀更多
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-phone-100 col-tablet-50">
          <div class="card">
            <div class="_image">
              <div class="ratio_3_2">
                <img class="ratio_content" src="/imgs/large-card2.jpg">
              </div>
            </div>
            <div class="_content">
              <a class="_link" href="https://progressbar.tw/courses/1" target="_pb">
                <h4 class="_title">
                  行動第一! 使用Bootstrap建立響應式網站!
                </h4>
              </a>
              <p class="_detail">
                羨慕別人也有響應式的網站嗎？你知道一般人超過60%以上的上網時間都是在手機上嗎? 利用Bootstrap
                可以讓您快速的完成響應式的網站。本課程更進一步的教您如何客製化Bootstrap，讓您的網站不會永遠像是樣品!
              </p>
            </div>
            <div class="_action">
              <div class="_action_content">
                <a class="_link" href="https://progressbar.tw/courses/1" target="_pb">
                  <button class="btn" type="button">
                    閱讀更多
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <!-- video player -->
    <div class="pb-container">
      <div class="pb-row">
        <div class="col-phone-100 col-tablet-67">
          <div class="video-player">
            <div class="ratio_16_9">
              <iframe id="video_player" class="ratio_content" src="https://www.youtube.com/embed/-TDjWe5xZ0w"
                frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-phone-100 col-tablet-33">
          <div class="video-list-container mdl-shadow--2dp">
            <div class="ratio_8_9">
              <ul class="ratio_content video-list">
                <li class="_video" data-video="Enw2PhRe3Bg">
                    JavaScript ES6 與 React 課程介紹
                </li>
                <li class="_video" data-video="HJwt0fnadUg">
                    [WordPress] 接案最方便的網站課程介紹
                </li>
                <li class="_video" data-video="RUZ7gCo7gws">
                    Linux雲端伺服器，用AWS暸解Apache與Nginx
                </li>
                <li class="_video" data-video="IVWkKn_8GiQ">
                    [Ruby On Rails] 新創公司最愛的後台網站框架課程介紹
                </li>
                <li class="_video" data-video="XN031PuViqI">
                  [Bootstrap 3] 安裝與開始使用Bootstrap 3
                </li>
                <li class="_video" data-video="-TDjWe5xZ0w">
                  [Git][免費空間] 將靜態網頁放上Github Page(也就是現在的網站)
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="remove_padding">
    <!-- image links -->
    <div class="pb-container">
      <div class="pb-row">
        <div class="col-phone-100 col-tablet-50 col-desktop-25">
          <a href="https://progressbar.tw">
            <div class="ratio_3_2">
              <img class="ratio_content" src="/imgs/small-card1.jpg">
            </div>
          </a>
        </div>
        <div class="col-phone-100 col-tablet-50 col-desktop-25">
          <a href="https://progressbar.tw">
            <div class="ratio_3_2">
              <img class="ratio_content" src="/imgs/small-card2.jpg">
            </div>
          </a>
        </div>
        <div class="col-phone-100 col-tablet-50 col-desktop-25 hidden-on-phone">
          <a href="https://progressbar.tw">
            <div class="ratio_3_2">
              <img class="ratio_content" src="/imgs/small-card3.jpg">
            </div>
          </a>
        </div>
        <div class="col-phone-100 col-tablet-50 col-desktop-25 hidden-on-phone">
          <a href="https://progressbar.tw">
            <div class="ratio_3_2">
              <img class="ratio_content" src="/imgs/small-card4.jpg">
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@section('inline_js')
  @parent
  <script>
    $(function () {
      /* video player init*/
      $("._video").click(function () {
        var video = $(this).data("video");
        var url = "https://www.youtube.com/embed/" + video;
        $("#video_player").attr('src', url);
      })

      /* nav init*/
      $(".nav-button").click(function () {
        $(".nav-list").slideToggle(400);
      })
    })
  </script>
@endsection