// function showModal(id) {
//     var modal = document.getElementById("modal");
//     modal.style.display = "block";
//     modal.dataset.time = id; // Save the ID of the clicked time slot
//   }
  
//   function submitInfo(id) {

//     event.preventDefault(); 
//     var timeSlot = document.getElementById(modal.dataset.time + "-info"); // Get the element to clear
//     timeSlot.innerHTML = ""; // prevent the form from submitting and refreshing the page
//     var name = document.getElementById("name").value;
//     var email = document.getElementById("prof").value;
//     var salle = document.getElementById("salle").value;
//     var timeSlot = document.getElementById(id + "-info"); // Get the element to update
//     var result = document.createElement("div");
    
// result.innerHTML = "Module: " + name + "<br>Prof: " + email+"<br>Salle"+salle;
// timeSlot.appendChild(result);// Update the element with the entered data
  
// closeModal();
//   }
  
//   function closeModal() {
//     var modal = document.getElementById("modal");
//     modal.style.display = "none";
//     document.getElementById("name").value = ""; // Clear the input fields
//     document.getElementById("salle").value = "";
//     document.getElementById("prof").value = "";
  
   
//   }


function showModal(id) {
  var modal = document.getElementById("modal");
  modal.style.display = "block";
  modal.dataset.time = id; // Save the ID of the clicked time slot
}

function submitInfo() {
  event.preventDefault(); // prevent the form from submitting and refreshing the page
  var id = document.getElementById("modal").dataset.time; // Get the saved ID of the clicked time slot
  var timeSlot = document.getElementById(id + "-info"); // Get the element to update
  var name = document.getElementById("name").value;
  var email = document.getElementById("prof").value;
  var salle = document.getElementById("salle").value;
  var result = document.createElement("div");
  
  result.innerHTML = "Module: "+ name + "<br>Prof: " + email + "<br>Salle: " + salle;
  timeSlot.innerHTML = ""; // clear the previous content of the time slot
  timeSlot.appendChild(result); // Update the element with the entered data
  closeModal();
}


function closeModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "none";
  document.getElementById("name").value = ""; // Clear the input fields
  document.getElementById("salle").value = "";
  document.getElementById("prof").value = "";
}

  
  const timetablesPerPage = 1; // Change this to adjust how many timetables are displayed per page
  let currentPage = 1;
  
  function showPage(page) {
    const timetables = document.getElementsByClassName("timetable");
    const numPages = Math.ceil(timetables.length / timetablesPerPage);
    
    if (page < 1 || page > numPages) {
      return; // Invalid page number
    }
    
    currentPage = page;
    
    for (let i = 0; i < timetables.length; i++) {
      if (i >= (currentPage - 1) * timetablesPerPage && i < currentPage * timetablesPerPage) {
        timetables[i].style.display = "block";
      } else {
        timetables[i].style.display = "none";
      }
    }
    
    updatePagination();
  }
  
  function updatePagination() {
    const pageButtons = document.getElementsByClassName("page-btn");
    
    for (let i = 0; i < pageButtons.length; i++) {
      if (i + 1 === currentPage) {
        pageButtons[i].classList.add("active");
      } else {
        pageButtons[i].classList.remove("active");
      }
    }
  }
  
  // Show the first page by default
  showPage(1);
  

  


