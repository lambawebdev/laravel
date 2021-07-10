<footer class="blog-footer">
    <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.7/holder.min.js" crossorigin="anonymous"></script>
<script src="{{ mix("js/app.js") }}"></script>

<script>
  Holder.addTheme('thumb', {
    bg: '#55595c',
    fg: '#eceeef',
    text: 'Thumbnail'
  });

  $('.form-check').click(function (event) {
    event.stopPropagation();
  });

  $('#feedback-form button').addClass('disabled');

  $('#Check1, #Check2, #Check3, #Check4').on('click', function () {
    if ($('#feedback-form input[type=checkbox]:checked').length > 0) {
        $('#feedback-form button').addClass('enabled');
      $('#feedback-form button').removeClass('disabled');
    } else {
      $('#feedback-form button').addClass('disabled');
      $('#feedback-form button').removeClass('enabled');
    }
  })

  $('#feedback-form').on('submit', function (e) {

    e.preventDefault();

    let data = {"_token": "{{ csrf_token() }}"};

    $('#Check1').is(":checked") ? data.news = true : null;
    $('#Check2').is(":checked") ? data.articles = true : null;
    $('#Check3').is(":checked") ? data.comments = true : null;
    $('#Check4').is(":checked") ? data.tags = true : null;

    $.ajax({
      type: "POST",
      url: 'http://skillbox/' + 'contacts/report',
      data: data,
    })
  })
</script>
