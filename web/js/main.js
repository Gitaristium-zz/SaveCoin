document.getElementById('date-income').valueAsDate = new Date();
document.getElementById('date-spend').valueAsDate = new Date();


$('form').on('beforeSubmit', function () {
  var data = $(this).serialize();
  $.ajax({
    url: '/web/index',
    type: 'POST',
    data: data,
    success: function (res) {
      console.log(res);
    },
    error: function () {
      alert('Error!');
    }
  });
  return false;
});

$('.income__add').click(function () {
  $(this).toggleClass('active');
  $('#add-income').toggleClass('active');
  $('#add-spend').removeClass('active');
  $('.spend__add').removeClass('active');
});
$('.spend__add').click(function () {
  $(this).toggleClass('active');
  $('#add-spend').toggleClass('active');
  $('#add-income').removeClass('active');
  $('.income__add').removeClass('active');
});