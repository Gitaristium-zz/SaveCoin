// auto date into input
document.getElementById('date-income').valueAsDate = new Date();
document.getElementById('date-spend').valueAsDate = new Date();

// plates btn
$('.income__add').click(function () {
  $(this).toggleClass('active');
  $('#add-income').toggleClass('active');
  $('#add-spend').removeClass('active');
  $('.spend__add').removeClass('active');
  $('.modal').removeClass('active');
});
$('.spend__add').click(function () {
  $(this).toggleClass('active');
  $('#add-spend').toggleClass('active');
  $('#add-income').removeClass('active');
  $('.income__add').removeClass('active');
  $('.modal').removeClass('active');
});

// click to edit
$('.stats__link').click(function () {
  $('#add-income').removeClass('active');
  $('#add-spend').removeClass('active');
  $('.income__add').removeClass('active');
  $('.spend__add').removeClass('active');
  $('.modal').addClass('active');
  var $id = $(this).attr('data-id'),
    $act = $(this).attr('data-act'),
    $sum = $(this).children('span:nth-child(1)').text(),
    $cat = $(this).children('span:nth-child(2)').text(),
    $date = $(this).children('span:nth-child(3)').attr('data-date');
  $('.modal #savecoin-id').val($id);
  $('.modal #savecoin-sum').val($sum);
  $('.modal #savecoin-cat').val($cat);
  $('.modal #savecoin-date').val($date);
  $('.modal #savecoin-act').val($act);
});
$('.modal__close').click(function () {
  $('.modal').removeClass('active');
});