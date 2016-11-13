{% extends 'app.layout.php' %}

{% block content %}

<h3>Password Hashing</h3>

<p>
    PHP includes password hashing functions to make your life easier and to help store your passwords at rest in a
    safer format. This is thanks to the <a href="http://php.net/password">password_</a> functions:

    <ul>
        <li>password_hash</li>
        <li>password_verify</li>
        <li>password_needs_rehash</li>
    </ul>
</p>
<br/>
{% if message is defined %}
<div style="padding:5px;border:1px solid #CCCCCC;background-color:#EEEEEE">{{ message }}</div>
{% endif %}

<h4>Enter a password</h4>
<form action="/password" method="POST" class="form form-horizontal">
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label"><b>Password:</b></label>
        <div class="col-sm-6"><input type="password" name="password" value="" class="form-control"/></div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" value="Submit"/>
        </div>
    </div>
</form>

{% endblock %}
