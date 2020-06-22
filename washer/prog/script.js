var d = new Date().toLocaleTimeString(navigator.language, {hour: '2-digit', minute:'2-digit', second:'2-digit'});
  var t = $("<span class='date'></span>").text(d);
$('.steps').on('click', '.step--active', function() {
  $(this).removeClass('step--incomplete').addClass('step--complete');
  $(this).removeClass('step--active').addClass('step--inactive');
  $(this).next().removeClass('step--inactive').addClass('step--active');
  $('.step--complete').append(t);
});

$('.steps').on('click', '.step--complete', function() {
  $(this).removeClass('step--complete').addClass('step--incomplete');
  $(this).removeClass('step--inactive').addClass('step--active');
  $(this).nextAll().removeClass('step--complete').addClass('step--incomplete');
  $(this).nextAll().removeClass('step--active').addClass('step--inactive');
  $('.date').remove();
});