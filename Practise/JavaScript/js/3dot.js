// sidebar.js
// for the 3 dot 1:-
// Function to open the sidebar
// function openSidebar() {
//     document.getElementById('sidebar').style.left = '0';
//     document.getElementById('overlay').style.display = 'block';
//     document.getElementById('main-content').style.marginLeft = '250px';
//   }
  
//   // Function to close the sidebar
//   function closeSidebar() {
//     document.getElementById('sidebar').style.left = '-250px';
//     document.getElementById('overlay').style.display = 'none';
//     document.getElementById('main-content').style.marginLeft = '0';
//   }
  

//for the 3dot2 html

// sidebar.js

// Function to toggle the sidebar
function toggleSidebar() {
  var sidebar = document.getElementById('sidebar');
  var mainContent = document.getElementById('main-content');

  if (sidebar.classList.contains('open')) {
    // Close the sidebar
    sidebar.classList.remove('open');
    mainContent.style.marginLeft = '0';
  } else {
    // Open the sidebar
    sidebar.classList.add('open');
    mainContent.style.marginLeft = '250px';
  }
}

