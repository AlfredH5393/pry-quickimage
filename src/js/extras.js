$(document).ready(function() {
    $('#sidebarCollapse').on('click', () => {
        $('#sidebar').toggleClass('active');  
    });

    $('#sidebarCollapse').on('click', () => {
        $('.container-fluid').toggleClass('mx-width-1075')
    });


    
});