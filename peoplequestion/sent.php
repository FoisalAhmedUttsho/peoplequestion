<div id="msg">
<table width="700">
<tr>
 <th>Receiver</th>
 <th>Subject</th>
 <th>Date</th>
 <th>Reply</th>
</tr>
<?php
$sel_msg="select * from messages where sender='$user_id' ORDER by 1 DESC ";
 $run_msg=mysqli_query($con,$sel_msg);
 $count_msg=mysqli_num_rows($run_msg);
 while ($row=mysqli_fetch_array($run_msg)) {
     	                $msg_id=$row['msg_id'];
						$msg_receiver=$row['receiver'];
						$msg_sender=$row['sender'];
						$msg_sub=$row['msg_sub'];
						$msg_topic=$row['msg_topic'];
						$msg_date=$row['msg_date'];
						$get_receiver="select * from users where user_id='$msg_receiver'";
						$run_receiver=mysqli_query($con,$get_receiver);
		    		    $row_receiver= mysqli_fetch_array($run_receiver);
		    		    $receiver_name=$row_receiver['user_name'];    

                 ?>
                  <tr align="center">
		    		 	<td>
		    		 	<a href="user_profile.php?u_id=<?php echo $msg_receiver;?>" target="blank"><?php echo $receiver_name;?></a>
		    		 	</td>
		    		 	<td><a href="my_messages.php?sent&msg_id=<?php echo $msg_id?>"><?php echo $msg_sub ?></a></td>
		    		 	<td><?php echo $msg_date ?></td>
		    		 	<td><a href="my_messages.php?sent&msg_id=<?php echo $msg_id?>">View Reply</a></td>
		    		 </tr>
		    		 <?php
		    		   }
		    		  ?>
  </table>
           	 <?php
		    	if(isset($_GET['msg_id'])){
		    	$get_id=$_GET['msg_id'];
		    	$sel_message="select * from messages where msg_id='$get_id'";
		    	$run_message=mysqli_query($con,$sel_message);
		    	$row_message=mysqli_fetch_array($run_message);
		    	$msg_subject=$row_message['msg_sub'];
		    	$msg_topic=$row_message['msg_topic'];
		    	$reply_content=$row_message['reply'];
		         
		         echo "<center><br/><hr>
		            <h2>$msg_subject</h2>
		         	<p><b>My Message:</b>$msg_topic</p>
		         	<p><b>Their Reply:</b>$reply_content</p>
		         </center>";
		     }

		     ?>
</div>