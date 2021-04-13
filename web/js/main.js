// auto date into input
// document.getElementById('date-income').valueAsDate = new Date();
// document.getElementById('date-spend').valueAsDate = new Date();

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
$('.stats-item__link').click(function () {
  $('#add-income').removeClass('active');
  $('#add-spend').removeClass('active');
  $('.income__add').removeClass('active');
  $('.spend__add').removeClass('active');
  $('.modal-edit').addClass('active');
  var $id = $(this).attr('data-id'),
    $act = $(this).attr('data-act'),
    $sum = $(this).children('.stats-item__currency').text(),
    $catId = $(this).children('.stats-item__cat-id').text(),
    $date = $(this).children('.stats-item__date').attr('data-date');
  $catName = $(this).children('.stats-item__cat-name').text();
  $('.modal #savecoin-id').val($id);
  $('.modal #savecoin-sum').val($sum);
  $('.modal #savecoin-cat').val($catId);
  $('.modal #savecoin-date').val($date);
  $('.modal #savecoin-act').val($act);
  $('.modal #categoriesspend-id').val($id);
  $('.modal #categoriesspend-cat_name').val($catName);
});
$('.link-edit').click(function () {
  var $catNameEdit = $('.edit-catname').text();
  $(this).attr("href", "site/edit&id=" + $id + "&cat_name=" + $catNameEdit);
});
$('.modal__close').click(function () {
  $('.modal').removeClass('active');
});



// modal categories
$('#btn-add-categogy-add').click(function () {
  $('.modal').removeClass('active');
  $('#add-categogy-add').addClass('active');
});
$('#btn-add-categogy-spend').click(function () {
  $('.modal').removeClass('active');
  $('#add-categogy-spend').addClass('active');
});
