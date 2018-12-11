$(document).ready(function () {

    $('#home_tab').DataTable({
        
        language: {

            url: "DataTables/media/French.json"

        }
        
        

    });
    
    
    $('#delete_tab').DataTable({
        
        language: {

            url: "DataTables/media/French.json"

        }
        
        

    });
    
        $('#modify_tab').DataTable({
        
        language: {

            url: "DataTables/media/French.json"

        }

    });
    
    
       $('#home_tab .table-hover-click').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
    
//           $('#delete_tab .table-hover-click').click(function(){
//        window.location = $(this).attr('href');
//        return false;
//    });
//    
//           $('#modify_tab .table-hover-click').click(function(){
//        window.location = $(this).attr('href');
//        return false;
//    });

});