<?php
	include 'header.php';
    if(Session::get('sId') == ''){
?>
<div class="container">
          <center><h2><u>Students Info</u></h2></center> <br><br>          
		  <table class="table table-striped">
		    <thead class="black">
		      <tr>
		        <th>Name</th>
		        <th>Roll</th>
		        <th>Phone</th>
		        <th>Email</th>
		        <th>Session</th>
		        <th>Address</th>
		        <th>Curent Semester</th>
		        <th>Photo</th>
                <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
               <?php
                    $query = "SELECT * from students;"; 
                    $post = $db->select($query);
                    if($post){
                        while($result = $post->fetch_assoc()){  
                        ?>
		    		    <tr>
		    			<td><?php echo $result['name']; ?></td>
		    			<td><?php echo $result['roll']; ?></td>
		    			<td><?php echo $result['phone']; ?></td>
		    			<td><?php echo $result['email']; ?></td>
		    			<td><?php echo $result['session']; ?></td>
		    			<td><?php echo $result['address']; ?></td>
		    			<td><?php echo $result['currentsemester']; ?></td>
		    			<td><img src="upload/<?php echo $result['photo']; ?>" height="40px" width="60px"/></td>

		    			<td><a class='btn btn-primary btn-xs'  href="Update.php?updateId=<?php echo $result['id']; ?>">Edit</a>
		    				<a class='btn btn-danger btn-xs' onclick="return confirm('Are you sure to Delete?')" href="Delete.php?deletId=<?php echo $result['id']; ?>">Delete</a></td>
		    		</tr>
                <?php
		    	     }
                }
		       ?>
		    </tbody>
		    <tfoot>
		    	<td></td>
		    	<td></td>
		    	<td></td>
	            <td></td>
	            <td></td>
		    	<td><a class="btn btn-primary" href="create.php">Create New Record</a></td>
		    </tfoot>
		  </table>
		</div>
<?php }else{ 
            $stuid = Session::get('sId');
            $query = "SELECT * from students where id = $stuid;"; 
            $post = $db->select($query);
            $result = $post->fetch_assoc();
?>
    <div class="back">
          <div class="container2">
              <h2><u><center>Form Fill up</center></u></h2><br><br>    
              <form method="post" action="form.php?submitId=<?php echo $result['id']; ?>">
                  <label>Name:</label>
                  <input type="text" value="<?php echo $result['name']?>" readonly name="name"/>
                  <label>Roll:</label>
                  <input type="text" value="<?php echo $result['roll']?>" readonly name="roll"/>
                  <label>Session:</label>
                  <input type="text" name="session"/>
                  <label>Semester:</label>
                  <input type="text" name="semester"/>
                  <span>Read again before submit, because you can't update it later</span><br/>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </div>
        
 <?php   } ?>
<?php
	include 'footer.php';
?>