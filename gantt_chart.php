<?php
require('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    if ($_SESSION["unistatus"] == "professor"){
    require('navbar.php');
    }
}

?>






<div class="ongoing-thesis-list">
        <h2 class="pagePurpose">Αιτήσεις Φοιτητών</h2>
        <div class="container">
            <div class="row">
                <section class="thesis-list">
                  <label for = "gantt_lines">Εισάγετε τον αριθμό των διαστημάτων του γραφήματος Gantt </label>
                  <input type="text" id="gantt_lines" name="gantt_lines"><br />
                  <a href="#" id="arithmos_gantt" onclick="addFields()">Εμφάνιση</a>
                   <div id="dates"/>
                   <div id="lines"/>
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


<script type="text/javascript">
        function addFields(){

            var number = document.getElementById("gantt_lines").value;
            var container = document.getElementById("lines");
            var date_container = document.getElementById("dates");
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                container.appendChild(document.createTextNode((i+1) + " "));

                var input = document.createElement("input");
                var start_date = document.createElement("input");
                var end_date = document.createElement("input");
                input.type = "text";
                input.name = "gantt_lines" + i;
                start_date.type = "date";
                start_date.name = "gantt_date" + i;
                end_date.type = "date";
                end_date.name = "gantt_date" + i;
                container.appendChild(input);
                container.appendChild(document.createTextNode( " Εναρξη: "));
                container.appendChild(start_date);
                container.appendChild(document.createTextNode( " Λήξη: "));
                container.appendChild(end_date);

                container.appendChild(document.createElement("br"));
            }
            //Dhmiourgia koumpiou kai topothetisi tou katw apo n-osto element pou tha paragei o xristis gia to gantt
            var span = document.createElement("span");
            span.innerHTML = '<button class="button button-primary" id="button_gantt" onclick="callJavascriptFunction()">Δημιουργία </>';
            container.appendChild(span);
            
        }     

</script>


<div class="blurred" </div>

<?php
require('injecthtml/footer.php');
?>