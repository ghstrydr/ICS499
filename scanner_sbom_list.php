<?php

  $nav_selected = "SCANNER"; 
  $left_buttons = "YES"; 
  $left_selected = "RELEASESLIST"; 
  $left_selected = "BOMLIST"; 

  include("./nav.php");
  global $db;

  ?>


<div class="right-content">
    <div class="container">

      <h3 style = "color: #01B0F1;">Scanner -> System Releases List</h3>

        <h3><img src="images/releases.png" style="max-height: 35px;" />System Releases</h3>

        <table id="info" cellpadding="0" cellspacing="0" border="0"
            class="datatable table table-striped table-bordered datatable-style table-hover"
            width="100%" style="width: 100px;">
              <thead>
                <tr id="table-first-row">
                        <th>App Id</th>
                        <th>App Name</th>
                        <th>App Status</th>
                        <th>App Version</th>
                        <th>CMP ID</th>
                        <th>CMP Name</th>
                        <th>CMP Status(s)</th>
                        <th>CMP Type</th>
                        <th>CMP Version</th>
                        <th>Notes</th>
                        <th>Row ID</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                        <th>App Id</th>
                        <th>App Name</th>
                        <th>App Status</th>
                        <th>App Version</th>
                        <th>CMP ID</th>
                        <th>CMP Name</th>
                        <th>CMP Status(s)</th>
                        <th>CMP Type</th>
                        <th>CMP Version</th>
                        <th>Notes</th>
                        <th>Row ID</th>
                </tr>
              </tfoot>

              <tbody>

              <?php

$sql = "SELECT * from sbom ORDER BY app_version ASC;";
$result = $db->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>'.$row["app_id"].'</td>
                                <td>'.$row["app_name"].' </span> </td>
                                <td>'.$row["app_status"].'</td>
                                <td>'.$row["app_version"].'</td>
                                <td>'.$row["cmp_id"].' </span> </td>
                                <td>'.$row["cmp_name"].'</td>
                                <td>'.$row["cmp_status"].'</td>
                                <td>'.$row["cmp_type"].' </span> </td>
                                <td>'.$row["cmp_version"].' </span> </td>
                                <td>'.$row["notes"].' </span> </td>
                                <td>'.$row["row_id"].' </span> </td>
                            </tr>';
                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else

                 $result->close();
                ?>

              </tbody>
        </table>


        <script type="text/javascript" language="javascript">
    $(document).ready( function () {
        
        $('#info').DataTable( {
            dom: 'lfrtBip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );

        $('#info thead tr').clone(true).appendTo( '#info thead' );
        $('#info thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#info').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true
        } );
        
    } );

</script>

        

 <style>
   tfoot {
     display: table-header-group;
   }
 </style>

  <?php include("./footer.php"); ?>
