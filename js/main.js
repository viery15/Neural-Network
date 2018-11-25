$(document).ready(function(){
   $("#btn-submit").click(function(){
      var data = $("#form1").serialize();
      $.ajax({
          url : 'proses.php',
          type : 'post',
          data : data,
          success : function (html) {
             $("#hasil").html(html);
          }
      });
   })
});