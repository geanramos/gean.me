// AJAX commenting system to fix everything, most information taken from http://www.makeuseof.com/tag/ajaxify-wordpress-comments/

if (typeof jQuery != 'undefined') {

jQuery('document').ready(function($){
var commentform=$('#commentform'); // find the comment form
commentform.prepend('<div id="comment-status" ></div>'); // add info panel before the form to provide feedback or errors
var statusdiv=$('#comment-status'); // define the infopanel
 
commentform.submit(function(){
//serialize and store form data in a variable
var formdata=commentform.serialize();
//Add a status message
statusdiv.html('<p>Processing...</p>');
//Extract action URL from commentform
var formurl=commentform.attr('action');
//Post Form with data
$.ajax({
type: 'post',
url: formurl,
data: formdata,
error: function(XMLHttpRequest, textStatus, errorThrown){
statusdiv.html('<p class="wdpajax-error" >You might have left one of the fields blank, or be posting too quickly</p>');
},
success: function(data, textStatus){
if(data=="success")
statusdiv.html('<p class="ajax-success" style="color:#007700; font-size:18px;" >Obrigado. Seu comentário foi enviado com sucesso!.</p>');
else
statusdiv.html('<p class="ajax-error" >Please wait a while before posting your next comment</p>');
commentform.find('textarea[name=comment]').val('');
}
});
return false;
 
});
});

}