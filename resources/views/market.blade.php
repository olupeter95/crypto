<!DOCTYPE html>
<html lang="en" class="wf-roboto-n7-active wf-roboto-n9-active wf-catamaran-n9-active wf-catamaran-n4-active wf-catamaran-n7-active wf-catamaran-n6-active wf-catamaran-n3-active wf-active">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Coinshape | Price-Index</title>
		<meta name="description" content="Getting live market rates is now easy with the Instant cryptocurrency exchange platform - Coinshape. Go through our website to have a deep understanding of it.">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Template Basic Images Start -->
		<meta property="og:image" content="path/to/image.jpg">
		<link rel="icon" href="/main/images/favicon.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/main/images/favicon.png">
		<!-- Template Basic Images End -->
		
		<!-- Custom Browsers Color Start -->
		<meta name="theme-color" content="#000">
		<!-- Custom Browsers Color End -->
        <link rel="stylesheet" href="cf/font.css">
        <link href="main/css/font-awesome-all.css" rel="stylesheet">
        <link href="main/css/flaticon.css" rel="stylesheet">
		<link rel="stylesheet" href="cf/main.min.css">

		<!-- Load google font
		================================================== -->
		<script src="cf/webfont.js" type="text/javascript" async=""></script><script type="text/javascript">
			WebFontConfig = {
				google: { families: [ 'Catamaran:300,400,600,700,900', 'Roboto:700,900'] }
			};
			(function() {
				var wf = document.createElement('script');
				wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + 
				'://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
				wf.type = 'text/javascript';
				wf.async = 'true';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(wf, s);
			})();
		</script>

		<!-- Load other scripts
		================================================== -->
		<script type="text/javascript">
			var _html = document.documentElement;
			_html.className = _html.className.replace("no-js","js");
		</script>

		<style>
			.preloader{
				width: 100%;
				height: 100%;
				position: fixed;
				background-color: #fff;
				z-index: 9999;
			}
            .data__list li{
                justify-content: center;
            }
		</style>

		<style type="text/css">/* Chart.js */
			@-webkit-keyframes chartjs-render-animation{
				from{opacity:0.99}to{opacity:1}
			}
			
			@keyframes chartjs-render-animation{
				from{opacity:0.99}to{opacity:1}
			}
			
			.chartjs-render-monitor{
				-webkit-animation:chartjs-render-animation 0.001s;
				animation:chartjs-render-animation 0.001s;
			}
		</style>
		
		<link rel="stylesheet" href="cf/font.css" media="all">
		<style type="text/css">/* Chart.js */
			@-webkit-keyframes chartjs-render-animation{
				from{opacity:0.99}to{opacity:1}
			}
			
			@keyframes chartjs-render-animation{
				from{opacity:0.99}to{opacity:1}
			}
			
			.chartjs-render-monitor{
				-webkit-animation:chartjs-render-animation 0.001s;
				animation:chartjs-render-animation 0.001s;
			}
		</style>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	</head>

	<body data-aos-easing="ease" data-aos-duration="3000" data-aos-delay="0">
		<div class="preloader"></div>
		<div class="wrapper">
            @include('includes.welcome-head')	
		
			<section class="first-screen aos-init aos-animate" id="first-screen" data-aos-easing="ease" data-aos-duration="5000" data-aos-delay="0">
                <div class="container">
                    <div class="sec-title">
                        <h2 class="mt-5">Live Market Rates</h2>
                    </div>
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a> by TradingView</div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                            {
                                "width": "100%",
                                "height": "690",
                                "defaultColumn": "overview",
                                "screener_type": "crypto_mkt",
                                "displayCurrency": "USD",
                                "colorTheme": "light",
                                "locale": "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
		    </section>

            @include('includes.footer')
	    </div>

        <script>window.jQuery || document.write('<script src="cf/jquery-2.2.4.min.js"><\/script>')</script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="cf/scripts.min.js"></script>
    </body>
</html>