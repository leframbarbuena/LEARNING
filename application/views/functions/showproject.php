<script type="text/javascript">
function selectedtext(){
  var iframe = document.getElementById('pdfview');
  var idoc = iframe.contentDocument || iframe.contentWindow.document; // ie compatibility
  var str = idoc.getSelection().toString();
  var cout = str.length;
  var nxtStr = '<div class="div-list-group-item"><p class="list-group-item list-group-item-action">'+str+
  '</div>';

  if(cout==0){
    alert("No text selected");
    }
  else {
    $.post("<?php echo base_url('Ajax_control');?>",{
      postres: nxtStr
    },
    function(data){
      $("#div"+counter).html(data);
    });
    counter+=1;
  }
  }
</script>

<div class="container-fluid">
  <div class="row">
<?php
  foreach ($showproj as $project) {
    echo '<div class="col-sm-2 text-center"><h5>'.
    $project['title'].
    '</h5><p>Author/s: <div>';
    $auth = explode(',', $project['author']);
    foreach ($auth as $val) {
       echo $val.'<br/>';
     }
    echo '</div></p>'.
    '<p><small><i><a href="#">'.
    $project['abbrev'].
    '</a></i></small> | <a href="#"><small><i>'.
    $project['year'].
    '</i></small></a>  <a href="#"><i><small></br>'.
    $project['professor'].
    '</small></i></a></p><div class="text-justify"><small>'.
    $project['abstract'].'</div></div>'.
    '</small><div class="col-sm-6 text-right"><button type="submit" onClick="selectedtext()">Add to Resource Manager</button>
<iframe id="pdfview" width="650" height="850" src="./output/'.
    $project['file_name'].
    '.html"></iframe></div>';
   }
?>
  <div class="col-sm-2">
    
  </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-full navbar-s">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand aaa" href="<?php echo base_url(); ?>Learning/dashboard">LEARNING RESOURCE PLATFORM</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="dropdown">
                <a class="nav-link" href="<?php echo base_url(); ?>Learning/dashboard"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
                <button class="dropdown-menu dropdown-style">
                    <li class="drp"><a href="<?php echo base_url(); ?>user/profile"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</li>
                    <li class="drp"><a href="<?php echo base_url(); ?>upload"><i class="fa fa-upload" aria-hidden="true"></i> UPLOAD</a></li>
                  </button>
            </li>
            <li class="dropdown">
                <a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
            </li>
            <li class="dropdown">
                <a class="nav-link" href="<?php echo base_url(); ?>Learning/help"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Help</a>
            </li>
            <li class="dropdown">
                <a class="nav-link" href="<?php echo base_url(); ?>Learning/about"><i class="fa fa-question-circle" aria-hidden="true"></i> About<span class="sr-only"></span></a>
            </li>
            <li class="dropdown">
                <a class="nav-link" href="<?php echo base_url('Learning/logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log-out</a>
            </li>
        </ul>
        </div>      
        </nav>
