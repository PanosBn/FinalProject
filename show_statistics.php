<?php
require_once('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    if ($_SESSION["unistatus"] == "professor"){
    require('navbar.php');

    }
    else{
        Header("Location: landingpage.php");
    }
}else{
    Header("Location: landingpage.php");
}

?>
<div class="ongoing-thesis-list">
    <h2 class="pagePurpose">Στατιστικά Στοιχεία Εργασιών</h2>
    <div class="container">
        <section class = "thesis-list">
            <div class = "row">
                <div id = "thesis_stats"></div>
            </div>
        </section>
        <section class = "thesis-list">
            <div class="row">
                <div id = "chart" ></div>
            </div>
        </section>
    </div>
</div>



<script type = "text/javascript">

    $(document).ready(function(){
        var all_thesis_json;
        $.getJSON('php_workers/provide_stats.php', function(data){
            all_thesis_json = data;
            $.each(all_thesis_json, function(key,val){
                if ( val.perigrafi != null){
                    console.log(key,val.perigrafi);
                }
            });

            
            drawData();
        });

    });

    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawData);

    
    function drawData(){

      var data = new google.visualization.DataTable();
      data.addColumn('month', 'Mηνας');
      data.addColumn('number', 'Πτυχιακές');
      
      var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
      ];
      $.each(all_thesis_json, function(key,val){
         if ( val.perigrafi != null){
            console.log(key,val.perigrafi);
         }
      });

    }

</script>


<div class="blurred" </div>


<?php

require('injecthtml/footer.php');
?>