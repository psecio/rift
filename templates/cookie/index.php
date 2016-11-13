{% extends 'app.layout.php' %}

{% block content %}

<h3>Cookie Security</h3>

<div style="padding:5px;border:1px solid #CCCCCC;background-color:#EEEEEE">
<b>Current Cookies:</b><br/>
{% for index,cookie in cookies %}
    {{ index }} - {{ cookie }}<br/>
{% endfor %}
</div><br/>

<p>
    Cookies are pieces of data set by headers saved on the user's browser (or other client). This data is stored as-sent and not modified by the
    client. However a user can modify them manually very easily. Therefore they cannot be trusted.
</p>
<h4>Types of Cookies</h4>

<ul>
    <li>PHP Session cookies</li>
    <li>Application-specific cookies</li>
</ul>

<a href="/cookie?set-cookies=1" class="btn btn-success">Set cookies</a>
<br/><br/>
<div class="row">
    <div class="col-md-2">
    <select id="cookie-names" class="form-control">
        {% for name in names %}
        <option value="{{ name }}">{{ name }}</option>
        {% endfor %}
    </select>
    </div>
    <div class="col-md-2">
        <a href="#" id="get-cookie-value" class="btn btn-success">Get cookie value</a>
    </div>
</div>

<hr/>
{% if isAdmin is defined %}
<b>Way to go!</b> You changed the cookie to make yourself an admin! See how easy it is to change cookie values?
{% endif %}


<script>
$(function() {
    $('#get-cookie-value').on('click', function(e) {
        e.preventDefault();
        var cookieName = $('#cookie-names').val();
        alert(getCookie(cookieName));
    });
    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return decodeURIComponent(parts.pop().split(";").shift());
    }
});
</script>
{% endblock %}
