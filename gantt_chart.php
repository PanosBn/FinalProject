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
            // Number of inputs to create
            var number = document.getElementById("gantt_lines").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("lines");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode((i+1) + " "));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                var input_date = document.createElement("input_date");
                input.type = "text";
                input_date.type = "date";
                input.name = "gantt_lines" + i;
                input_date.name = "gantt_date" + i;
                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
            }
        }     

</script>


<div class="blurred" </div>

<?php
require('injecthtml/footer.php');
?>