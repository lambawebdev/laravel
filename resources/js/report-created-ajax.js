$('#feedback-form button').addClass('disabled').prop('disabled', true);

$('#Check1, #Check2, #Check3, #Check4').on('click', function () {
  if ($('#feedback-form input[type=checkbox]:checked').length > 0) {
    $('#feedback-form button').addClass('enabled').removeClass('disabled').prop('disabled', false);
  } else {
    $('#feedback-form button').addClass('disabled').removeClass('enabled');
  }
});

$('#feedback-form').on('submit', function (e) {

  e.preventDefault();

  let data = {};

  $('#Check1').is(":checked") ? data.news = true : null;
  $('#Check2').is(":checked") ? data.articles = true : null;
  $('#Check3').is(":checked") ? data.comments = true : null;
  $('#Check4').is(":checked") ? data.tags = true : null;

  axios.post('/contacts/report', data).then(res => {
    console.log(res);
    $("#Check1, #Check2, #Check3, #Check4").prop("checked", false);
    $('#feedback-form button').addClass('disabled').removeClass('enabled').prop('disabled', true);
  });
});