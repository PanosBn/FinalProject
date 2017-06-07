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
                input.name = "gantt_lines_" + i;
                start_date.type = "date";
                start_date.name = "start_date_" + i;
                end_date.type = "date";
                end_date.name = "end_date_" + i;
                container.appendChild(input);
                container.appendChild(document.createTextNode( " Εναρξη: "));
                container.appendChild(start_date);
                container.appendChild(document.createTextNode( " Λήξη: "));
                container.appendChild(end_date);

                container.appendChild(document.createElement("br"));
            }
            //Dhmiourgia koumpiou kai topothetisi tou katw apo n-osto element pou tha paragei o xristis gia to gantt
            var span = document.createElement("span");
            span.innerHTML = '<button class="button button-primary" id="button_gantt" onclick="createGanttCharts()">Δημιουργία </>';
            container.appendChild(span);
            
        }

        function createGanttCharts(){
          //arxika tha mazepsoume oles tis varialbes apo kathe typo dedomenwn (perigrafi , start date kai end date)
          //Tha topothetithoun se 3 arrays
          //Epeidi ta pedia dimiourgountai dunamika den kseroume to plires onoma tous h ton arithmo tous opote tha ta vroume
          //kanontas xrisi twn Selectors -->  https://www.w3.org/TR/selectors-api/ 
          //Kathe stoixeio tupou text ksekina me to name = "gantt_lines_ + ena auksonta arithmo"
          //To idio isxuei kai gia ta stoixeia typou date , start_date_ + arithmos , end_date_ + arithmos
          var elements_perigrafes = document.querySelectorAll('input[name^="gantt_lines_"]');
          var elemetns_startDate = document.querySelectorAll('input[name^="start_date_"]');
          var elemetns_endDate = document.querySelectorAll('input[name^="end_date_"]');

          var perigrafes_array = new Array();
          var start_date_array = new Array();
          var end_date_array = new Array();

          for (i = 0; i < elements_perigrafes.length; i++) {
                //console.log(elements_perigrafes[i].value);
                perigrafes_array.push(elements_perigrafes[i].value);
                console.log(perigrafes_array[i]);
          }
          for (i = 0; i < elements_perigrafes.length; i++) {
                //console.log(elemetns_startDate[i].value);
                start_date_array.push(elemetns_startDate[i].value);
                console.log(start_date_array[i]);
          }
          for (i = 0; i < elements_perigrafes.length; i++) {
                //console.log(elemetns_endDate[i].value);
                end_date_array.push(elemetns_endDate[i].value);
                console.log(end_date_array[i]);
          }


        }

</script>


<div class="blurred" </div>

<?php
require('injecthtml/footer.php');
?>