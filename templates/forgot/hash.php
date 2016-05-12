{% extends 'app.layout.php' %}

{% block content %}

<h3>Forgot Password</h3>

{% if error is defined %}
<div class="alert alert-danger">{{ error }}</div>
{% endif %}

{% if success == true %}
<p>
    The hash provided on the URL correctly matches one saved to the user record. This provides
    a secondary validation that the user is who they say they are. They would then be presented with
    a form similar to:
</p>
<div class="row">
    <div class="col-md-5">
        <form action="" method="POST">
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password:</label>
                <input type="confirm_password" name="confirm_password" id="confirm_password" class="form-control"/>
            </div>
            <input type="submit" name="sub" value="Submit" class="btn btn-success"/>
        </form>
    </div>
</div>
<br/>
<p>
    When the form is submitted successfully, the hash is <b>cleared out</b> of the user record. Ideally,
    you also have the following in place:
    <ul>
        <li>A timeout on the hash (usually about an hour is an okay limit). After that the hash is invalid.</li>
        <li>A process to regenrate and save a new hash if the old one is expired.</li>
    </ul>
</p>
{% endif %}

{% endblock %}
