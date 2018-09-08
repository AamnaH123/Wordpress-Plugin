<?php

    if (!empty($_POST)) {
        global $wpdb;
        $table = 'wp_myplugin';
        $data = array(
            'name' => $_POST['Name'],
            
			'email' => $_POST['Email']
			
			
        );
        $format = array(
            '%s',
            '%s'
        );
        $success=$wpdb->insert( $table, $data, $format );
        if($success){
            echo "<center><h1>Your data has been successfully saved</h1></center>" ; 
        }
    } else {
        ?>
		<center><h1>Enter your Details:</h1></center>
<script>

</script>
        <form name="myform" method="post" action="">
		<ul class="form-style-1">
    <li><label>Full Name <span class="required">*</span></label>
	<input type="text" name="Name" class="field-long" />
	</li>
    <li>
        <label>Email <span class="required">*</span></label>
        <input type="email" name="Email" class="field-long" />
    </li>
    
   
    <li>
        <input type="submit" value="Submit"  />
    </li>
</ul>
        </form>
		
		
		
        <?php
		global $wpdb;
        $tbl = 'wp_myplugin';
$results = $wpdb->get_results( "SELECT* FROM $tbl "); 
if(!empty($results))                        
{    
    echo "<table width='50%' border='0'>"; 
    echo "<tbody>";      
    foreach($results as $row){   
    $Name = $row->Name;               
    echo "<tr>";                           
    echo "<th>NAME</th>" . "<td>" . $row->Name . "</td>";
    echo "</tr>";
    echo "<td colspan='2'><hr size='1'></td>";
    echo "<tr>";        
    echo "<th>EMAIL</th>" . "<td>" . $row->Email . "</td>";   
    echo "</tr>";
    echo "<td colspan='2'><hr size='1'></td>";
    
   
  
    }
    echo "</tbody>";
    echo "</table>"; 

}
		
    }
	
	
?>

	






	
	
	
	
	

	




