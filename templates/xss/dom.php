{% extends 'app.layout.php' %}

{% block content %}

<h3>Cross-Site Scripting (XSS): DOM</h3>

<p>
    DOM XSS injections happen when unfiltered user data is directly used through Javascript. This is much harder to detect
    as there's no server interaction happening.
</p>
<p>
    <b>Exploit:</b><br/>
    Use the form below and see if you can figure out how to inject content into the page.
</p>

<div class="row">
    <div class="col-md-6">
        <form action="#" class="form" id="name-form">
            <div class="form-group">
                <label for="name">What's your name?</label>
                <input type="text" name="name" class="form-control" id="name"/>
            </div>
            <div class="form-group">
                <input type="submit" name="sub" value="Say hello!" class="btn"/>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <div id="hello" style="font-size:18px;padding:5px;border:1px solid #CCCCCC"></div>
    </div>
</div>

<script>
$(function() {
    $('#name-form').submit(function(e) {
        e.preventDefault();
        var name = $('#name').val();
        $('#hello').html(name);

        // Protection:
        // var d = document.createElement('div');
        // d.innerText = 'Hello '+name+'!';
        // $('#hello').append(d);

    });
});
</script>

{% endblock %}
