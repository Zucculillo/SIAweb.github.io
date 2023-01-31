<label for="customRange2" class="form-label" id="range-label" >Che mese devi registrare?</label>
<input type="range" class="form-range" min="1" max="12" id="customRange2">
<table class="table table-hover" id="journalBook">
  <thead>
    <tr>
      <th scope="col" class="table-secondary">Data</th>
      <th scope="col" class="table-primary">Nome</th>
      <th scope="col" class="table-success">Dare</th>
      <th scope="col" class="table-danger">Avere</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="table-secondary">/</th>
      <td class="table-primary"></td>
      <td class="table-success"></td>
      <td class="table-danger"></td>
    </tr>
  </tbody>
</table>
<div class="btn-group removeRow" role="group" aria-label="Basic radio toggle button group">
  <input type="radio" class="btn-check" name="btnradio" id="removeRow" autocomplete="off" checked>
  <label class="btn btn-outline-danger" for="removeRow">Rimuovi riga</label>

  <input type="radio" class="btn-check" name="btnradio" id="addRow" autocomplete="off">
  <label class="btn btn-outline-success " for="addRow">Aggiungi riga</label>
</div>
<button type="button" class="btn btn-outline-info" id="confirmJournalBook">Conferma</button>


<script>
  var accounts = []
  var table = document.getElementById("journalBook")
  var addRowBtn = document.getElementById("addRow")
  var removeRowBtn = document.getElementById("removeRow")


  var rangeLabel = document.getElementById("range-label");
  var range = document.getElementById("customRange2");
  var month = range.value;

  var inputPrompt;

  var confirmBtn = document.getElementById("confirmJournalBook")
  confirmBtn.addEventListener("click",()=>{
    if(addRowBtn.checked){
  // Create a new row
  let newRow = table.insertRow(-1);

  // Add cells to the new row
  let dateCell = newRow.insertCell(0);
  let nameCell = newRow.insertCell(1);
  let dareCell = newRow.insertCell(2);
  let avereCell = newRow.insertCell(3);

  // Set the classes for the cells
  dateCell.classList.add("table-secondary");
  dateCell.classList.add("date")
  nameCell.classList.add("table-primary");
  dareCell.classList.add("table-success");
  avereCell.classList.add("table-danger");

  //Set the text
  dateCell.textContent = "Nessun dato"
  nameCell.textContent = "Nessun dato"
  dareCell.textContent = "Nessun dato"
  avereCell.textContent = "Nessun dato"

  }else{
    if(table.rows.length > 1)table.deleteRow(-1);
  }
  })
range.addEventListener("input", function() {
  for (let i = 1; i < table.rows.length; i++) {
    let dateEl = table.rows[i].cells[0]
    rangeLabel.textContent = "Mese: " + range.value;
    month = range.value
    dateEl.textContent = `${month}/`
  }});
table.addEventListener("click",(e)=>{
  for (let i = 1; i < table.rows.length; i++) {
    if(e.target == table.rows[i].cells[0])askAndModifyDate(table.rows[i].cells[0])
    if(e.target == table.rows[i].cells[1])askAndModifyAccount(table.rows[i].cells[1])
    if(e.target == table.rows[i].cells[2])askAndModifyDareAvere(table.rows[i].cells[2])
    if(e.target == table.rows[i].cells[3])askAndModifyDareAvere(table.rows[i].cells[3])
  }
})




function askAndModifyDareAvere(cell){
  let inputPrompt
  let onlyLetters = /^[0-9]+$/;
  do {
  inputPrompt = prompt("Inserisci il valore:");
} while (!inputPrompt.match(onlyLetters));
    cell.textContent = `${inputPrompt}`
}

function askAndModifyAccount(cell){
  let inputPrompt
  let onlyLetters = /^[a-zA-Z]+$/;
  do {
  inputPrompt = prompt("Inserisci il conto:");
} while (!inputPrompt.match(onlyLetters));
    cell.textContent = `${inputPrompt}`
  }



function askAndModifyDate(cell){
  let inputPrompt
  let onlyLetters = /^[0-9]+$/;
  do {
  inputPrompt = prompt("Inserisci il giorno:");
} while (!inputPrompt.match(onlyLetters) || inputPrompt < 0 || inputPrompt > 31);
    cell.textContent = `${month}/${inputPrompt}`
  }

</script>