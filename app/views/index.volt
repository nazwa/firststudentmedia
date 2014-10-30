<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <!--
            ###############################################
            ##                                           ##
            ##         1st Student Media 2012            ##
            ##                                           ##
            ###############################################
        -->
        <title>1st Student Media</title>
        <meta charset='utf8' />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="content-language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="First Student Media delivering you all the recent news updates from the majority of the student led newspapers and TV stations across UK.">
        <meta name="keywords" content="">
        <meta name="author" content="ZorleQ">
        <meta http-equiv="reply-to" content="info@1ststudentmedia.com">
        <link rel="shortcut icon"  href="favicon.ico">
        <meta name="creation-date" content="02/10/2012">
        <meta name="robots" content="index, follow">
        <meta name="revisit-after" content="1 hour">

        <meta property="og:title" content="1st Student Media"/>
        <meta property="og:url" content="http://1ststudentmedia.com"/>
        <meta property="og:image" content="http://1ststudentmedia.com/1ststudentmedia.png"/>
        <meta property="og:site_name" content="1st Student Media"/>
        <meta property="og:description" content="First Student Media delivering you all the recent news updates from the majority of the student led newspapers and TV stations across UK."/>

        <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>


        <?php $this->assets->outputCss('styles'); ?>
        <?php $this->assets->outputJs('scripts'); ?>





    </head>


    <body>
        <!-- Rendered on: <?php echo date('d/m/Y H:i:s', time()); ?> -->
        {{ content() }}


                {#
                ====GA====
        <script type="text/javascript">
            if( window.location.hostname.indexOf('dev.') === -1) {
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', '']);
                _gaq.push(['_setDomainName', '']);
                _gaq.push(['_trackPageview']);

                (function() {
                    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
            }

        </script>

        #}
   </body>
</html>