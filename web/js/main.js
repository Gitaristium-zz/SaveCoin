document.getElementById('date').valueAsDate = new Date();


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