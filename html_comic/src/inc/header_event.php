<?php include 'inc/ua.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="<?php echo $uametaValue; ?>" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="format-detection" content="telephone=no">
<title><?php echo $pageTitle;?> : 네이버 웹툰</title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $ualinkValue; ?>">
	<?php if($ualinkDefaultValue) echo '<link rel="stylesheet" type="text/css" href="css/'.$ualinkDefaultValue.'">';?>
<link rel="stylesheet" type="text/css" href="css/comment.css">
<link rel="stylesheet" type="text/css" href="css/mediaScreen.css">
<link charset="utf-8" rel="stylesheet" type="text/css" href="http://m.like.naver.com/css/likeIt.css">
<link type="text/css" rel="stylesheet" href="http://m.webtoon.like.naver.com/css/likeIt_COMIC.css?v=2014072418" charset="utf-8">
<link rel="stylesheet" type="text/css" href="http://m.webtoon.like.naver.com/css/likeItButton_COMIC.css">
<link id="naver-splugin-css" rel="stylesheet" type="text/css" href="http://spi.naver.net/css/20150416/spi_standard_m_20150416.css">
<script id="naver-splugin-sdk" type="text/javascript" charset="utf-8" src="http://spi.naver.com/js/release/ko_KR/splugin.m.js?20150702"></script>

<!-- 마크업확인용 스크립트 -->
<script type="text/javascript" src="http://jindo.dev.naver.com/docs/jindo-mobile/archive/latest/asset/jindo/latest/jindo.all.ns.js" charset="utf-8"></script>
<script type="text/javascript" src="http://jindo.dev.naver.com/docs/jindo-mobile/archive/latest/source/jindo.m.js" charset="utf-8"></script>
<script type="text/javascript" src="http://jindo.dev.naver.com/docs/jindo-mobile/archive/latest/source/jindo.m.Component.js" charset="utf-8"></script>
<script type="text/javascript" src="http://jindo.dev.naver.com/docs/jindo-mobile/archive/latest/source/jindo.m.UIComponent.js" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8" src="./js/jindo_mobile_component.js"></script>
<script type="text/javascript" charset="utf-8" src="./js/jindo.desktop.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="./js/behavior.js"></script>
<!-- // 마크업확인용 스크립트 끝 -->
</head>

<!-- [D] 이벤트의 경우 event 클래스 추가 -->
<body class="event <?php echo $uacssValue; ?>">
<div id="u_skip" class="u_skip">
	<a href="#ct">본문 바로가기</a>
</div>
<header>
	<!-- 로고 -->
	<h1 class="u_ts">
		<a href="#"><span>웹툰</span></a><a href="#"><span>웹소설</span></a>
	</h1>
	<!-- //로고 -->

	<!-- 네이버 홈 -->
	<a href="#" class="u_gnbh"><span style="background:url(http://static.naver.net/m/comic/im/promo/maso/maso_logo_160823.png) no-repeat;background-size:92px 39px;-webkit-background-size:92px 39px">네이버</span></a>
	<!-- //네이버 홈 -->

	<!-- 검색 -->
	<!-- [D] u_hsbt_smart 추가로 검색 버튼 위치 스마트 툰 페이지에 맞게 조정 -->
	<?php $search_txt = strpos($searchType,'search');
	if($search_txt !== false){ ?>
	<!-- [D] 검색창 접기: <a href="#u_gnbw" class="u_hsbt u_hsbt_fd"><div><span class="u_vc">검색창 접기</span></div></a> -->
		<a href="#none" class="u_hsbt u_hsbt_op"><div><span class="u_vc">검색창 펼치기</span></div></a>
	<?php } ?>

	<!-- [D] 통합검색 버튼 유무에 따라,
		 * 통합검색 버튼이 있는 경우: class="u_hs"
		 * 통합검색 버튼이 없는 경우: class="u_hs u_hs_nous" -->
	<fieldset id="u_hs" class="u_hs" style="display:none;">
		<legend class="u_hc">검색</legend>
		<div class="u_hsw">
			<!-- [D] placeholder는 HTML5 DTD에서만 사용 가능. 그 외 DTD에서는 스크립트로 처리.
				 * HTML5 : <input ... placeholder="안내메시지" class="u_it">
				 * 그 외 : <input ... value="안내메시지" class="u_it u_sd"> -->
					<div class="u_itw">
						<div class="u_itwi">
							<input type="text" name="msearch" title="" class="u_it" placeholder="제목 또는 작가명 검색">
							<button type="button" class="u_clrt">입력 내용 삭제</button>
						</div>
					</div>
			<button type="submit" class="u_hssbt u_hssbt_ss"><span class="u_vc">검색</span></button>
			<button type="submit" class="u_hssbt u_hssbt_us">통합검색</button>
		</div>
	</fieldset>

	<!-- MY -->
	<div class="my_page"><a href="#"><span>MY</span></a></div>
	<!-- //MY -->

	<!-- 검색결과 헤더 -->
	<?php if($searchType == 'search rult'){ ?>
	<!-- [D] 검색결과 헤더인 경우 v2 클래스 추가 -->
		<div class="lnb v2">
				<?
					echo '<a href="#" class="btn_prev"><span>이전</span></a>
			<h2>검색 결과 <em>56</em>건</h2>';
				?>
		</div>
	<? } ?>
	<!-- //검색결과 -->
	<nav>

<?php
	$search_txt = strpos($menu,'my');
	if($menu != ''){
		if($search_txt !== false){
?>
		<div class="lnb">

				<?php
					$search_txt = strpos($menu,"detail");
					if($search_txt){
						// 작품별 보기 상세인 경우
						echo '<a href="#" class="btn_prev"><span>이전</span></a>
			<h2>W.I.T.C.H - 마법소녀 위치 W.I.T.C.H - 마법소녀 위치 W.I.T.C.H - 마법소녀 위치 W.I.T.C.H - 마법소녀 위치 W.I.T.C.H - 마법소녀 위치</h2>';
					}else{
						if(strpos($menu,"comic")){
						echo '<span class="my_lnb">
							<a href="#" class="on">MY 웹툰</a>
							<a href="#">MY 스토어</a>
							</span>';
						}else{
							echo '<span class="my_lnb">
							<a href="#">MY 웹툰</a>
							<a href="#" class="on">MY 스토어</a>
							</span>';
						}
						echo '<h2 class="u_hc">선택한 메뉴명</h2>';
					}
				?>
			</div>
		<? } else {?>

		<div class="lnb bx_tab">
			<ul>
				<?php switch ($menu) {
					case 'main':
						echo'<li class="on"><a href="#">홈</a></li>
				<li><a href="#">웹툰</a></li>
							<li><a href="#">베스트도전</a></li>
							<li><a href="#">게임<span class="ico_new">신규</span></a></li>
							<li><a href="#">스토어</a></li>';
						break;
					case 'week':
						echo'<li><a href="#">홈</a></li>
							<li class="on"><a href="#">웹툰</a></li>
							<li><a href="#">베스트도전</a></li>
							<li><a href="#">게임<span class="ico_new">신규</span></a></li>
							<li><a href="#">스토어</a></li>';
						break;
					case 'challenge':
						echo'<li><a href="#">홈</a></li>
							<li><a href="#">웹툰</a></li>
							<li class="on"><a href="#">베스트도전</a></li>
							<li><a href="#">게임<span class="ico_new">신규</span></a></li>
							<li><a href="#">스토어</a></li>';
						break;
					case 'game':
						echo'<li><a href="#">홈</a></li>
							<li><a href="#">웹툰</a></li>
							<li><a href="#">베스트도전</a></li>
							<li class="on"><a href="#">게임<span class="ico_new">신규</span></a></li>
							<li><a href="#">스토어</a></li>';
						break;
					case 'store':
						echo'<li><a href="#">홈</a></li>
							<li><a href="#">웹툰</a></li>
							<li><a href="#">베스트도전</a></li>
							<li><a href="#">게임<span class="ico_new">신규</span></a></li>
							<li><a href="#">스토어</a></li>';
						break;
					case 'my':
						echo'<li><a href="#">홈</a></li>
							<li><a href="#">웹툰</a></li>
							<li><a href="#">베스트도전</a></li>
							<li><a href="#">게임<span class="ico_new">신규</span></a></li>
							<li><a href="#">스토어</a></li>';
						break;
					default:
						echo'';
						break;
				} ?>
			</ul>
			<h2 class="u_hc">선택한 메뉴명</h2>
		</div>
		<? }} ?>
	</nav>
</header>