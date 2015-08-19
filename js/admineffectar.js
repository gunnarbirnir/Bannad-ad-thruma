$(document).ready(function() {

$(".maetingnofn").on('click', 'input:checkbox', function () {
   $(this).parent().toggleClass('tekkad', this.checked );
});

});