<form action="add-production.php" method="get" class="orb-form">
                  <fieldset>
                   <legend><?php echo $select_g_row['T_Item_Stk_Name'];?></legend>
                    <section>
                      <label class="label">Batch/Godown Location</label>
                      
                      <label class="select">
                        <select name="location<?php echo $select_g_row['T_Item_Id']; ?>">
                          <?php $selectitem=mysqli_query($con,"select * from t_godown"); 
			while($rowitem=mysqli_fetch_array($selectitem))
			{
			?>
                         <option value="<?php echo $rowitem['T_Godown_Name']; ?>"><?php echo $rowitem['T_Godown_Name']; ?></option>
                         <?php		
			}
			?>
                        </select>
                        <i></i> </label>
                    </section>
                      <section>
                      <label class="label">Batch No</label>
                      <label class="input">
                          <input type="text" name="batch_no<?php echo $select_g_row['T_Item_Id']; ?>" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">Batch Qty</label>
                      <label class="input">
                          <input type="text" name="batch_qty<?php echo $select_g_row['T_Item_Id']; ?>" pattern="^(([1-9]*)|(([1-9]*)\.([0-9]*)))$" required>
                      </label>
                    </section>
                    
                  </fieldset>
                  <?php
                    }
                  ?>
                  <footer>
                    <button type="submit" class="btn btn-default" name="Update">Submit</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="add-production.php">Back</a>
                  </footer>
                </form>