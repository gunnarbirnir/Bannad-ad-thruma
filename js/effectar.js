$(document).ready(function() {

//Athuga þetta aftur seinna ef fjöldi leikmanna breytist
var stadahaed = $("#stada").height() + $("#banner").height() + 60;

if($(window).height()<stadahaed) {

 $("#stada").css("position", "absolute");

}

 $("#banner2").hide();
 
 var bannerteljari = 0;
 $("#strik").click(function() {
 $("#banner2").toggle();
 if((bannerteljari%2)==0) {
 $("#stada").css("margin-top", "68px");
 $("#stada2").css("margin-top", "68px");
 $("#boltiheild").css("top", "542px");
 bannerteljari++;
 }
 else if((bannerteljari%2)!=0) {
 $("#stada").css("margin-top", "15px");
 $("#stada2").css("margin-top", "15px");
 $("#boltiheild").css("top", "489px");
 bannerteljari++;
 }
 });
 
$(window).resize(function(){
if($(window).width()>485) {
	$("#banner2").hide();
	$("#stada").css("margin-top", "15px");
	$("#stada2").css("margin-top", "15px");
	$("#boltiheild").css("top", "489px");
	bannerteljari = 0;
}
});
 
});