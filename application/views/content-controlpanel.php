<div class="content">
	<!-- <div style="width: 95%; margin: 10px auto; padding: 10px; background-image: linear-gradient(rgba(0,0,255,0), rgba(0,0,255,0.1)); border: 1px solid blue; border-radius: 5px; color: #aaa; font-size: 15pt;">
		<strong>To do list upon resume:</strong><br />
		<small>
			<small>
				<ul type="square" >
					<li>Web Design <b style='color: orange'>[Queued]</b></li>
					<li>
						Patient Registration Form</b>
						<small>(90% Complete, 10% - Autocomplete text field for Assigned Nurse and Doctor <b style='color: green'>[On progress...]</b>)</small>
					</li>
					<li>Registration Form validation <b style='color: blue'>[DONE]</b></li>
					<li>Getting values for each registration form from the server <b style='color: blue'>[DONE]</b></li>
					<li>Store values from nurse registration form to the database <b style='color: blue'>[DONE]</b></li>
					<li>Display all nurses <b style='color: blue'>[DONE]</b></li>
					<li>Store values from doctor registration form to the database <b style='color: blue'>[DONE]</b></li>
					<li>Display all doctors <b style='color: blue'>[DONE]</b></li>
					<li>Store values from admin registration form to the database <b style='color: blue'>[DONE]</b></li>
					<li>Display all admins <b style='color: blue'>[DONE]</b></li>
					<li>Construct the manage profile page <b style='color: orange'>[Queued]</b></li>
					<li>
						Search Box <i>(For unregistered user)</i> - Displays the patient's and his/her relative's information <b style='color: orange'>[Queued]</b>
					</li>
					<li>
						Chat Feature <b style='color: orange'>[Queued]</b>
						<ul>
							<li>Nurse</li>
							<li>Patient</li>
							<li>Doctor</li>
							<li>Admin</li>
						</ul>
					</li>
					<li>
						Home page content <b style='color: orange'>[Queued]</b>
						<ul>
							<li>Articles</li>
							<li>Photos</li>
							<li>...</li>
						</ul>
					</li>
					<li>
						About us page content <b style='color: orange'>[Queued]</b>
						<ul>
							<li>Articles</li>
							<li>...</li>
						</ul>
					</li>
					<li>
						Contact page content <b style='color: orange'>[Queued]</b>
						<ul>
							<li>Article</li>
							<li>...</li>
						</ul>
					</li>
					<li>
						Login for patient <small>(if appropriate)</small> <b style='color: orange'>[Queued]</b>
					</li>
					<li>Login for nurse <b style='color: orange'>[Queued]</b></li>
					<li>Login for doctor <b style='color: orange'>[Queued]</b></li>
					<li>Code refinement <b style='color: orange'>[Queued]</b></li>
					<li>Search distant relative of the patient (Known as "crawler") <b>[Optional]</b> <b style='color: orange'>[Queued]</b></li>
					<li>Admin's Filtering of patient's possible relative within the facility <b style='color: orange'>[Queued]</b></li>
				</ul>
			</small>
		</small>
		<strong>Note:</strong>
		<small>
			<small>
				<ul>
					<li>Planning to have a super-admin user type</li>
					<li>Restriction of Admin user type:
						<ul>
							<li>update own and colleague's personal profile</li>
							<li>add another admin</li>
							<li>delete another admin</li>
						</ul>
					</li>
				</ul>
			</small>
		</small>
	</div> -->
	<div class="usertype">
		<ul>
			<li id='type-pat' class=""><a class="ctrl">Patients<span class='icon ic-patient-g ic-default2 pull-right'></span></a></li>
			<li id='type-nur' class=""><a class="ctrl">Nurses<span class='icon ic-nurse-g ic-default2 pull-right'></span></a></li>
			<li id='type-doc' class=""><a class="ctrl">Doctors<span class='icon ic-doctor-g ic-default2 pull-right'></span></a></li>
			<li id='type-adm' class=""><a class="ctrl">Admins<span class='icon ic-admin-g ic-default2 pull-right'></span></a></li>
		</ul>
	</div>
	<div class="target">
		<div id="patient-panel" class="hide">
			<form id="patient-reg-form" method="post" action="<?=base_url()?>main/reg_patient">
				<h2>Patient Registration Form</h2>
				<table class='form-table'>
					<th>Personal Information</th>
					<tr>
						<td class='inputs-3'>
							<input type='text' id='reg-pat-firstname' name='reg-pat-firstname' placeholder='First Name' maxlength='50' class='txt txt-white' />
							<input type='text' id='reg-pat-middlename' name='reg-pat-middlename' placeholder='Middle Name' maxlength='50' class='txt txt-white' />
							<input type='text' id='reg-pat-lastname' name='reg-pat-lastname' placeholder='Last Name' maxlength='50' class='txt txt-white' />
						</td>
					</tr>
					<tr>
						<td class='inputs-2'>
							<input type='date' id='reg-pat-birthdate' name='reg-pat-birthdate' class='txt txt-white' />
							<div id='radio-gender' class='txt-white'>
								<span>Gender:</span>
								<label><input type='radio' id='reg_pat_gender' name='reg_pat_gender' value='m' class='txt txt-white' /> Male</label>
								<label><input type='radio' id='reg_pat_gender' name='reg_pat_gender' value='f' class='txt txt-white' /> Female</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<input type='text' id='reg-pat-address' name='reg-pat-address' placeholder='Address' maxlength='255' class='txt txt-white' style="width: 92.9%" />
						</td>
					</tr>
				</table>
				
				<table class='form-table'>
					<th>Relative/Guardian Information</th>
					<tr>
						<td class='inputs-2'>
							<input type='text' id='reg-pat-rel-firstname' name='reg-pat-rel-firstname' placeholder='First Name' maxlength='50' class='txt txt-white' />
							<input type='text' id='reg-pat-rel-lastname' name='reg-pat-rel-lastname' placeholder='Last Name' maxlength='50' class='txt txt-white' />
						</td>
					</tr>
					<tr>
						<td class='inputs-2'>
							<input type='date' id='reg-pat-rel-birthdate' name='reg-pat-rel-birthdate' class='txt txt-white' />
							<div id='radio-rel-gender' class='txt-white'>
								<span>Gender:</span>
								<label><input type='radio' id='reg_pat_rel_gender' name='reg_pat_rel_gender' value='m' class='txt txt-white' /> Male</label>
								<label><input type='radio' id='reg_pat_rel_gender' name='reg_pat_rel_gender' value='f' class='txt txt-white' /> Female</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<input type='text' id='reg-pat-rel-address' name='reg-pat-rel-address' placeholder='Home Address' maxlength='50' class='txt txt-white' style='width: 92.9%;' />
						</td>
					</tr>
					<tr>
						<td class='inputs-3'>
							<input type='email' id='reg-pat-rel-email' name='reg-pat-rel-email' placeholder='Email Address' maxlength='50' class='txt txt-white' />
							<input type="number" id='reg-pat-rel-phone' name='reg-pat-rel-phone' placeholder='Contact Number' maxlength='50' class='txt txt-white' />
							<input type='text' id='reg-pat-rel-fax' name='reg-pat-rel-fax' placeholder='Fax No. (Optional)' maxlength='50' class='txt txt-white' />
						</td>
					</tr>
				</table>
				
				<table class='form-table'>
					<th>Admission Information</th>
					<tr>
						<td><input type='text' id='reg-pat-id' name='reg-pat-id' placeholder='Patient ID' maxlength='20' class='txt txt-white' style="width: 92.9%" /></td>
					</tr>
					<tr>
						<td class='inputs-2'>
							<input type='text' id='reg-pat-assigned-nurse' name='reg-pat-assigned-nurse' placeholder='Assigned Nurse' maxlength='50' list='nurse-names' class='txt txt-white' />
							<datalist id='nurse-names'>
							</datalist>
							<input type='hidden' id='hidden-reg-pat-assigned-nurse' name='hidden-reg-pat-assigned-nurse' />
							
							<input type='text' id='reg-pat-assigned-doctor' name='reg-pat-assigned-doctor' placeholder='Assigned Doctor' maxlength='50' class='txt txt-white' />
							<input type='hidden' id='hidden-reg-pat-assigned-doctor' name='hidden-reg-pat-assigned-doctor' />
						</td>
					</tr>
					<tr>
						<td>
							<input type='text' id='reg-pat-assigned-room' name='reg-pat-assigned-room' placeholder='Location Room' maxlength='50' class='txt txt-white' style="width: 92.9%" />
						</td>
					</tr>
					<tr>
						<td>
							<textarea id='reg-pat-prescription' name='reg-pat-prescription' placeholder="Doctor's Prescription" class='txt txt-white' style='width: 92.9%' rows='5'></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<input type='submit' id='reg-pat-submit' value='Register' class='btn btn-blue' style="width: 96.5%" />
						</td>
					</tr>
				</table>
			</form>
			<div id="all-patients">
				<?php ?>
			</div>
		</div>
		<div id="nurse-panel" class="hide">
			<form id="nurse-reg-form" method="post" action="<?=base_url()?>main/reg_nurse">
				<h2>Nurse Registration Form</h2>
				<div class='note'>
					Nurse's company identification will be his/her username and password for the mean time.<br />
					That will be used upon first login on the system. He/she can change it by editing to the profie page.
				</div>
				<table class='form-table'>
					<tr>
						<td><input type='text' id='reg-nur-compid' name='reg-nur-compid' placeholder='Company ID' maxlength='20' class='txt txt-white' style="width: 92.9%" /></td>
					</tr>
					<tr>
						<td class='inputs-2'>
							<input type='text' id='reg-nur-username' name='reg-nur-username' placeholder='Username' maxlength='50' class='txt txt-white' readonly />
							<input type='password' id='reg-nur-password' name='reg-nur-password' placeholder='Password' maxlength='50' class='txt txt-white' readonly />
						</td>
					</tr>
					<tr>
						<td class='inputs-3'>
							<input type='text' id='reg-nur-firstname' name='reg-nur-firstname' placeholder='First Name' maxlength='50' class='txt txt-white' />
							<input type='text' id='reg-nur-middlename' name='reg-nur-middlename' placeholder='Middle Name' maxlength='50' class='txt txt-white' />
							<input type='text' id='reg-nur-lastname' name='reg-nur-lastname' placeholder='Last Name' maxlength='50' class='txt txt-white' />
						</td>
					</tr>
					<tr>
						<td class='inputs-2'>
							<input type='date' id='reg-nur-birthdate' name='reg-nur-birthdate' class='txt txt-white' />
							<div id='nur-radio-gender' class='txt-white'>
								<span>Gender:</span>
								<label><input type='radio' id='reg_nur_gender' name='reg_nur_gender' value='m' /> Male</label>
								<label><input type='radio' id='reg_nur_gender' name='reg_nur_gender' value='f' /> Female</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<input type='text' id='reg-nur-address' name='reg-nur-address' placeholder='Home Address' class='txt txt-white' style='width: 92.9%' />
						</td>
					</tr>
					<tr>
						<td class='inputs-3'>
							<input type='email' id='reg-nur-email' name='reg-nur-email' placeholder='Email Address' class='txt txt-white' />
							<input type='text' id='reg-nur-phone' name='reg-nur-phone' placeholder='Contact Number' class='txt txt-white' />
							<input type='text' id='reg-nur-fax' name='reg-nur-fax' placeholder='Fax No. (Optional)' class='txt txt-white' />
						</td>
					</tr>
					<tr>
						<td>
							<input type='submit' id='reg-nur-submit' value='Register' class='btn btn-blue' style="width: 96.3%" />
						</td>
					</tr>
				</table>
			</form>
			<div id="all-nurses">
				Nurses: <b style='margin-left: 15px;'><?=$nurses->num_rows();?> Found</b>
				<table>
					<?php
						foreach ($nurses->result() as $nurse) {
							echo "<tr>";
							echo "<td>".ucwords($nurse->company_id)."</td>";
							echo "<td>".ucwords($nurse->firstname)."</td>";
							echo "<td>".ucwords($nurse->middlename)."</td>";
							echo "<td>".ucwords($nurse->lastname)."</td>";
							echo "</tr>";
						}
					?>
				</table>
			</div>
		</div>
		<div id="doctor-panel" class="hide">
			<form id="doctor-reg-form" method="post" action="<?=base_url()?>main/reg_doctor">
				<h2>Doctor Registration Form</h2>
				<div class='note'>
					Doctor's company identification will be his/her username and password for the mean time.<br />
					That will be used upon first login on the system. He/she can change it by editing to the profie page.
				</div>
				<table class='form-table'>
					<tr>
						<td><input type='text' id='reg-doc-compid' name='reg-doc-compid' placeholder='Doctor ID' maxlength='20' class='txt txt-white' style="width: 92.9%" /></td>
					</tr>
					<tr>
						<td class='inputs-2'>
							<input type='text' id='reg-doc-username' name='reg-doc-username' placeholder='Username' maxlength='50' class='txt txt-white' readonly />
							<input type='text' id='reg-doc-password' name='reg-doc-password' placeholder='Password' maxlength='50' class='txt txt-white' readonly />
						</td>
					</tr>
					<tr>
						<td class='inputs-3'>
							<input type='text' id='reg-doc-firstname' name='reg-doc-firstname' placeholder='First Name' maxlength='50' class='txt txt-white' />
							<input type='text' id='reg-doc-middlename' name='reg-doc-middlename' placeholder='Middle Name' maxlength='50' class='txt txt-white' />
							<input type='text' id='reg-doc-lastname' name='reg-doc-lastname' placeholder='Last Name' maxlength='50' class='txt txt-white' />
						</td>
					</tr>
					<tr>
						<td class='inputs-2'>
							<input type='date' id='reg-doc-birthdate' name='reg-doc-birthdate' class='txt txt-white' />
							<div id='doc-radio-gender' class='txt-white'>
								<span>Gender:</span>
								<label><input type='radio' id='reg_doc_gender' name='reg_doc_gender' value='m' /> Male</label>
								<label><input type='radio' id='reg_doc_gender' name='reg_doc_gender' value='f' /> Female</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<input type='text' id='reg-doc-address' name='reg-doc-address' placeholder='Home Address' class='txt txt-white' style='width: 92.9%' />
						</td>
					</tr>
					<tr>
						<td class='inputs-3'>
							<input type='email' id='reg-doc-email' name='reg-doc-email' placeholder='Email Address' class='txt txt-white' />
							<input type='text' id='reg-doc-phone' name='reg-doc-phone' placeholder='Contact Number' class='txt txt-white' />
							<input type='text' id='reg-doc-fax' name='reg-doc-fax' placeholder='Fax No. (Optional)' class='txt txt-white' />
						</td>
					</tr>
					<tr>
						<td class='txt-r'>
							<input type='submit' id='reg-doc-submit' value='Register' class='btn btn-blue' style="width: 96.3%" />
						</td>
					</tr>
				</table>
			</form>
			<div id="all-doctors">
				Doctors: <b style='margin-left: 15px;'><?=$doctors->num_rows();?> Found</b>
				<table>
					<?php
						foreach ($doctors->result() as $doctor) {
							echo "<tr>";
							echo "<td>$doctor->company_id</td>";
							echo "<td>$doctor->firstname</td>";
							echo "<td>$doctor->middlename</td>";
							echo "<td>$doctor->lastname</td>";
							echo "</tr>";
						}
					?>
				</table>
			</div>
		</div>
		<div id="admin-panel" class="hide">
			<form id="admin-reg-form" method="post" action="<?=base_url()?>main/reg_admin">
				<h2>Admin Registration Form</h2>
				<table class='form-table'>
					<tr>
						<td><input type='text' id='reg-adm-compid' name='reg-adm-compid' placeholder='Admin ID' maxlength='20' class='txt txt-white' style="width: 92.9%" /></td>
					</tr>
					<tr>
						<td class='inputs-2'>
							<input type='text' id='reg-adm-username' name='reg-adm-username' placeholder='Username' maxlength='50' class='txt txt-white' readonly />
							<input type='text' id='reg-adm-password' name='reg-adm-password' placeholder='Password' maxlength='50' class='txt txt-white' readonly />
						</td>
					</tr>
					<tr>
						<td class='inputs-3'>
							<input type='text' id='reg-adm-firstname' name='reg-adm-firstname' placeholder='First Name' maxlength='50' class='txt txt-white' />
							<input type='text' id='reg-adm-middlename' name='reg-adm-middlename' placeholder='Middle Name' maxlength='50' class='txt txt-white' />
							<input type='text' id='reg-adm-lastname' name='reg-adm-lastname' placeholder='Last Name' maxlength='50' class='txt txt-white' />
						</td>
					</tr>
					<tr>
						<td class='inputs-2'>
							<input type='date' id='reg-adm-birthdate' name='reg-adm-birthdate' class='txt txt-white' />
							<div id='adm-radio-gender' class='txt-white'>
								<span>Gender:</span>
								<label><input type='radio' id='reg_adm_gender' name='reg_adm_gender' value='m' /> Male</label>
								<label><input type='radio' id='reg_adm_gender' name='reg_adm_gender' value='f' /> Female</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<input type='text' id='reg-adm-address' name='reg-adm-address' placeholder='Home Address' class='txt txt-white' style='width: 92.9%' />
						</td>
					</tr>
					<tr>
						<td class='inputs-3'>
							<input type='email' id='reg-adm-email' name='reg-adm-email' placeholder='Email Address' class='txt txt-white' />
							<input type='text' id='reg-adm-phone' name='reg-adm-phone' placeholder='Contact Number' class='txt txt-white' />
							<input type='text' id='reg-adm-fax' name='reg-adm-fax' placeholder='Fax No. (Optional)' class='txt txt-white' />
						</td>
					</tr>
					<tr>
						<td class='txt-r'>
							<input type='submit' id='reg-adm-submit' value='Register' class='btn btn-blue' style="width: 96.3%" />
						</td>
					</tr>
				</table>
			</form>
			<div id="all-admins">
				Admins: <b style='margin-left: 15px;'><?=$admins->num_rows();?> Found</b>
				<table>
					<?php
						foreach ($admins->result() as $admin) {
							echo "<tr>";
							echo "<td>$admin->company_id</td>";
							echo "<td>$admin->firstname</td>";
							echo "<td>$admin->middlename</td>";
							echo "<td>$admin->lastname</td>";
							echo "</tr>";
						}
					?>
				</table>
			</div>
		</div>
	</div>
</div>