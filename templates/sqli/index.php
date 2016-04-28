{% extends 'app.layout.php' %}

{% block content %}

<h3>SQL Injection</h3>

<blockquote style="font-size:13px">
SQL injection is a code injection technique, used to attack data-driven applications, in which malicious SQL statements are inserted
into an entry field for execution (e.g. to dump the database contents to the attacker).[1] SQL injection must exploit a security
vulnerability in an application's software, for example, when user input is either incorrectly filtered for string literal escape
characters embedded in SQL statements or user input is not strongly typed and unexpectedly executed. SQL injection is mostly known
as an attack vector for websites but can be used to attack any type of SQL database.
<br/>
- <a href="https://en.wikipedia.org/wiki/SQL_injection">Wikipedia</a>
</blockquote>

<table class="table">
    <tr>
        <td class="col-md-1"><b>Username:</b></td>
        <td>user1</td>
    </tr>
    <tr>
        <td class="col-md-1"><b>Password:</b></td>
        <td><input type="text" name="field" id="field"/></td>
    </tr>
</table>
<br/><br/>
<pre><div id="display">select * from `users` where `username` = 'user1' and password = '_$_';</div></pre>

<div id="solved" style="display:none">
    <br/>
    <h4>Good job!</h4>
    <p>
        SQL injection happens when you use string concatenation to create the SQL strings in your application. In this example,
        the code might look like:
    </p>
    <pre><code class="php">&lt;?php
$sql = "select * from `users` where `username` = '".$_POST['username']."' and `password` = '".$_POST['password']."'";
?></code></pre>
    <p>
        To correctly prevent SQL injections (95% of them at least) you can use prepared statements and bound parameters. Here's
        and example using the <a href="http://php.net/pdo">PDO</a> functionality included in most PHP installs:
    </p>
    <pre><code class="php">&lt;?php
$dsn = 'mysql:dbname=mydb;host=127.0.0.1';
$pdo = new \PDO($dsn, 'dbuser', 'dbpass');

$sql = 'select * from `users` where `username` = :username and `password` = :password';
$sth = $pdo->prepare($sql);
$sth->execute([
    'username' => $_POST['username'],
    'password' => $_POST['password']
]);
$results = $sth->fetchAll();
?></code></pre>
</div>
<br/>

<script>
$(function() {

    var HighlightBlock = function(input, output, start, content)
    {
        this.input = input;
        this.output = $(output);

        this.current;
        this.before;
        this.after;
        this.cursor = '_$_';

        if (typeof content !== 'undefined') {
            this.output.html(content);
        }
        this.start = (typeof start == 'undefined') ? 0 : start;

        // See if we have a cursor to replace and set start there
        var index = this.output.html().indexOf(this.cursor);
        if (index) {
            // Replace it and set the start to that character
            this.output.html(this.output.html().replace('_$_', ''));
            this.start = index;
        }

        var self = this;

        // Hook in the on change handling
        $(this.input).on('input', function(e) {
            var val = $(this).val();
            var display = self.output.html();

            if (typeof self.current == 'undefined') {
                self.current = start;
            }
            if (typeof self.before == 'undefined') {
                self.before = display.slice(0, self.start);
            }
            if (typeof self.after == 'undefined') {
                self.after = display.slice(self.start);
            }

            $('#display').html(
                self.before + val + self.after
            );
            self.current = start + val.length;
        });
    }

    var hb = new HighlightBlock('#field', '#display');

    $('#field').on('input', function(e) {
        var val = $(this).val();
        var match = "' or 1=1;#";

        if (val == match) {
            $('#solved').css('display', 'block');
        }
    });
});
</script>


{% endblock %}
