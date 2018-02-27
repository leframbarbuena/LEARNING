  <div class="list-group">
  <div id="sidemenu">
    <h4 class="text-center">Resource Manager</h4>
    <script type="text/javascript">
    var container = document.getElementById("rm");
    for (var i = 0; i < 30; i++) {
      container.innerHTML += '<div id="div'+i+'"></div>';
    }
    </script>

    <ul id="rm">
      <input id="outlinetitle" type="text1" name="ol_name" placeholder="Project title" value="<?php if(isset($_SESSION['outlineTitle'])){ echo $_SESSION['outlineTitle'];}?>">
      <button id="saveit" type="button" name="save" onclick="save()">Save title</button>
      <a class="btn" data-popup-open="popup-1" href="#">Manage</a>
      <?php
       if(isset($_SESSION['resmgr'])){
         foreach ($_SESSION['resmgr'] as $value) {
           echo $value;
         }
      }
        ?>
      </ul>
  </div>
</div>

<div class="popup" data-popup="popup-1">
  <div class="popup-inner">
    <div class="inn">Wow! This is Awesome! (Popup #1)</div>

    <p><a data-popup-close="popup-1" href="#">Close</a></p>
    <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
  </div>
</div>

<script type="text/javascript">
function save(){
  var myLength = $("#outlinetitle").val().length;
  if(myLength==0){
    alert('A title is needed');
  }
  else{
    var title = $("#outlinetitle").val();
    $.post("<?php echo base_url('Ajax_control/title');?>",{
      posttitle: title
    },
    function(data){
      $("#outlinetitle").html(data);
    });
  }
}

$(function() {
//----- OPEN
$('[data-popup-open]').on('click', function(e)  {
var targeted_popup_class = jQuery(this).attr('data-popup-open');
$('.inn').html('<?php foreach ($_SESSION['resmgr'] as $vals) {
  echo '<div>'.$vals.'<button>rem</button></div>';
} ?>');
$('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
e.preventDefault();
});
//----- CLOSE
$('[data-popup-close]').on('click', function(e)  {
var targeted_popup_class = jQuery(this).attr('data-popup-close');
$('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
e.preventDefault();
});
});
</script>
