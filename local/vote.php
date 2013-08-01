<?php
					session_start();
					header('Cache-Control: no-cache');
					if (isset($_SESSION))
					{
						require('htmlbody/index.php'); 
						htmlupper(); 
						?>  
<style>
/* ---- table (general)---- */
div.row { clear: both; padding-top: 6px; }
div.row span.label  { float: left; width: 100px; text-align: right; }
div.row .col  { float: right; width: 280px; text-align: left; }
form  { width:400px; }
</style>
<p>Paticipants for Event No. 1 : </p><form method="get" action="receipt.php"><div class="row"><span class="label">No. 1 : </span><div class="col"><input type="radio" name="p_id" value="1" id="op1" /><label for="op1"> Pingpong</label><br></div></div><div class="row"><span class="label">No. 2 : </span><div class="col"><input type="radio" name="p_id" value="2" id="op2" /><label for="op2"> Swish</label><br></div></div><div class="row"><span class="label">No. 3 : </span><div class="col"><input type="radio" name="p_id" value="3" id="op3" /><label for="op3"> buzz</label><br></div></div><div class="row"><span class="label">No. 4 : </span><div class="col"><input type="radio" name="p_id" value="4" id="op4" /><label for="op4"> iDog</label><br></div></div><div class="row"><span class="label">No. 5 : </span><div class="col"><input type="radio" name="p_id" value="5" id="op5" /><label for="op5"> capp</label><br></div></div><input type="hidden" name="e_id" value="1" /><div class="row"><div class="col"><p><input type="submit" value="Vote" /></p></div></div></form>

						
						<?php echo "<script>window.history.forward(1);</script>"; htmllower();
					}
					else
					{
						header('location:index.php');
					}?>