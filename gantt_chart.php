<?php
require('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    if ($_SESSION["unistatus"] == "professor"){
    require('navbar.php');
    }
}

?>

<script type="text/javascript">
     

</script>



<div class="ongoing-thesis-list">
        <h2 class="pagePurpose">Αιτήσεις Φοιτητών</h2>
        <div class="container">
            <div class="row">
                <section class="thesis-list">

                </section>
            </div>
        </div>
        <div class="container">
          <div class="row">
            <section class="thesis-list">
              <!--Edw tha topothetithei to chart otan paraxthei-->
              <div id="chart_div"></div>
            </section>
</div>




<div class="blurred" </div>

<?php
require('injecthtml/footer.php');
?>