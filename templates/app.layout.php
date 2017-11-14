
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Rift: A Learning Application</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/simplex-bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/site.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/highlightjs.css">

    <script src="/assets/js/jquery-1.12.2.min.js"></script>

    <script src="/assets/js/highlight.pack.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Rift</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Exercises <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/cookie">Cookie Security</a></li>
                    <li><a href="/cookie/rememberme">Remember Me</a></li>
                    <li><a href="/forgot">Forgot Password</a></li>
                    <li><a href="/upload">File Upload</a></li>
                    <li><a href="/password">Password Hashing</a></li>
                    <li><a href="/ratelimit">Rate Limiting</a></li>
                    <li role="separator" class="divider"></li>

                    <li><a href="/xss">Cross-Site Scripting (XSS)</a></li>
                    <li><a href="/sqli">SQL Injection (SQLi)</a></li>
                    <li><a href="/csrf">Cross-Site Request Forgery (CSRF)</a></li>
                    <li><a href="/dor">Direct Object Reference</a></li>
                    <li><a href="/rfi">Remote File Include (RFI)</a></li>
                    <li><a href="/lfi">Local File Injection (LFI)</a></li>
                    <li><a href="/openredirect">Open Redirect</a></li>
                    <li><a href="/tfa">Two-factor Authentication</a></li>
                    <li><a href="/csp">Content Security Policy (CSP)</a></li>
                </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <br/><br/><br/>
        {% block content %}{% endblock %}
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script>$(function() { hljs.initHighlightingOnLoad(); });</script>
  </body>
</html>
