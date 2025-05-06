<?php
include('header.php');

?>
    <style>
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
        }
        .thh h3{
            background: #1F3958;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 30px 30px 0 30px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 30px;
            padding-bottom: 25px;
            -webkit-border-bottom-right-radius: 20px;
            -webkit-border-bottom-left-radius: 20px;
            -moz-border-radius-bottomright: 20px;
            -moz-border-radius-bottomleft: 20px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
            padding-bottom: 0;
            padding-top: 10px;
        }
        .m-portlet .m-form.m-form--fit > .m-portlet__body {
            padding-bottom: 40px !important;
        }
    </style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
			<div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                            <?php  if($data){ ?>
			 <?php echo $this->lang->line('EDIT_ON_CUSTOMER_FILE');?> 
			<?php	} else { ?>
				<?php echo $this->lang->line('Add_Customer');?>  
		<?php } ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"> 
			<?php 
		if($data)
			{
				 echo form_hidden('id',$data->id); 
			}
			else
			{
				 echo form_hidden('id',''); 
			}
		?>

                    <div class="m-portlet__body theme-inner-form">
                       
                        <div class="form-field-container">
						<h3><?php echo $this->lang->line('Customer_Information');?></h3>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
									<?php if($data)
									{
										$value=set_value('type_of_customer',$data->type_of_customer);
									}
									else
									{
										$value=set_value('type_of_customer');
									} ?>
                                    <label class=""><?php echo $this->lang->line('Types_Of_Customer');?>*</label>
									<select name="type_of_customer" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="exampleSelect1">
                                        <option value=""><?php echo $this->lang->line('Please_select_Customer_Type');?></option>
										<option value="Individuals"<?php if($value=='Individuals') echo "selected=selected";?>><?php echo $this->lang->line('Individuals');?></option>
										<option value="Establishment"<?php if($value=='Establishment') echo "selected=selected";?>><?php echo $this->lang->line('Establishment');?></option>
										<option value="a_company"<?php if($value=='a_company') echo "selected=selected";?>><?php echo $this->lang->line('a_company');?></option>
										<option value="Governments"<?php if($value=='Governments') echo "selected=selected";?>><?php echo $this->lang->line('Governments');?></option>
										<option value="organization"<?php if($value=='organization') echo "selected=selected";?>><?php echo $this->lang->line('organization');?></option>
										<option value="other"<?php if($value=='other') echo "selected=selected";?>><?php echo $this->lang->line('Other');?></option>
                                    </select>
									<div class="form-error"><?= form_error('type_of_customer'); ?></div>
                                </div>
                                <div class="col-lg-4">
			<?php if($data)
			{
				echo $value=set_value('client_status',$data->client_status);
			}
			else
			{
				$value=set_value('client_status');
			} ?>
                                    <label class=""><?php echo $this->lang->line('client_status');?>*</label>
                                    <select name="client_status" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="exampleSelect1">
					<option value=""><?php echo $this->lang->line('Please_Select_Client_Status');?></option>
	  				<option value="active"<?php if($value=='active') echo "selected=selected";?>><?php echo $this->lang->line('Active');?></option>
	  				<option value="inactive"<?php if($value=='inactive') echo "selected=selected";?>><?php echo $this->lang->line('Inactive');?></option>
	  				<option value="close"<?php if($value=='close') echo "selected=selected";?>><?php echo $this->lang->line('Close');?></option>
					<option value="other" <?php if($value=='close') echo "selected=selected";?>><?php echo $this->lang->line('Other');?></option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label><?php echo $this->lang->line('client_File_number');?>*</label>
                                   	  		<?php if($data)
			{
				$value=$data->client_file_number;
			}
			else
			{
				$value=set_value('client_file_number');
			} ?>
	  		<?= form_input(['name'=>'client_file_number','class'=>'form-control m-input','value'=>$value,'required'=>'required']);?>
	  		<div class="form-error"><?= form_error('client_file_number'); ?></div> 
                                </div>
			<div class="col-lg-4">
			<?php if($data)
			{
				$value=set_value('branch',$data->branch);
			}

			else
			{
				$value=set_value('branch');
			} ?>
			 <label class=""><?php echo $this->lang->line('branch');?>*</label>
			<select name="branch" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="exampleSelect1" required>
			<option value=""><?php echo $this->lang->line('Please_select_branch');?></option>
			<?php foreach(branch() as $branch) { ?>
			<option value="<?= $branch['id']; ?>"<?php if($value==$branch['id']) echo "selected=selected";?>><?= $branch['name']; ?></option>
			<?php } ?>
			</select>
	  		<div class="form-error"><?= form_error('branch'); ?></div>

		</div>
		<div class="col-lg-4">
	  		<label for="identification_number" class=" form-control-label"><?php echo $this->lang->line('identification_number');?>*</label>
	  		<?php if($data)
			{
				$value=set_value('identification_number',$data->identification_number);
			}
			else
			{
				$value=set_value('identification_number');
			} ?>
	  		<?= form_input(['name'=>'identification_number','id'=>'id_numbers','class'=>'form-control m-input','value'=>$value,'required'=>'required']);?>  
	  		<div class="form-error"><?= form_error('identification_number'); ?></div>
	  	</div>
                                 
                                <div class="col-lg-4">
								<label for="identification_types" class=" form-control-label"><?php echo $this->lang->line('identification_types');?>*</label>
									<?php if($data)
								{
									$value=set_value('identification_types',$data->identification_types);
								}
								else
								{
									$value=set_value('identification_types');
								} ?>
								<select name="identification_types" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="exampleSelect1" required>
									<option value=""><?php echo $this->lang->line('Please_Select_Identification_Types');?></option>	  
									<option value="CR"<?php if($value=="CR") echo "selected=selected";?>><?php echo $this->lang->line('CR');?></option>
									<option value="National_id"<?php if($value=="National_id") echo "selected=selected";?>><?php echo $this->lang->line('National_ID');?></option>
									<option value="Aqama"<?php if($value=="Aqama") echo "selected=selected";?>><?php echo $this->lang->line('Aqama');?></option>
									<option value="Governmental"<?php if($value=="Governmental") echo "selected=selected";?>><?php echo $this->lang->line('Governmental');?></option>
									<option value="other"<?php if($value=="other") echo "selected=selected";?>><?php echo $this->lang->line('Other');?></option>
								
								</select>
								
								<?php echo form_input(['name'=>'other_identification_types','id'=>'other_identification_types','class'=>'form-control']); ?><div class="form-error"><?= form_error('identification_types'); ?></div>
                                
                                </div>
                                <div class="col-lg-4">
                                    <label><?php echo $this->lang->line('client_full_name');?>*</label>
       
										<?php if($data)
			{
				$value=set_value('client_name',$data->client_name);
			}
			else
			{
				$value=set_value('client_name');
			} ?>
			<?= form_input(['name'=>'client_name','id'=>'name','class'=>'form-control m-input','value'=>$value,'required'=>'required']);?>
			<div class="form-error"><?= form_error('client_name'); ?></div>
                                </div>
                                <div class="col-lg-4">
                                    <label class=""><?php echo $this->lang->line('Nationality');?>*</label>
									<?php if($data)
			{
				  $value=set_value('nationality',$data->nationality);
			}
			else
			{
				$value=set_value('nationality');
			} ?>
			<select name="nationality" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="nationality"   >
			<option value=""><?php echo $this->lang->line('Select_country');?></option>
			<?php  foreach($countries as $country) { ?>
			<option value="<?= $country->id; ?>" <?php if($value==$country->id)echo "selected=selected"; ?> ><?= $country->name; ?></option>
			<?php } ?>
			</select>
					 
			<div class="form-error"><?= form_error('nationality'); ?></div>
                                     
			</div>
                                <div class="col-lg-4">
                                   
 
			<label for="gender" class=" form-control-label"><?php echo $this->lang->line('Gender');?>*</label>
			<?php if($data)
			{
				 $value=set_value('gender',$data->gender);
			}
			else
			{
				$value=set_value('gender');
			} ?>
			<select name="gender" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="exampleSelect1">
	  			<option value=""><?php echo $this->lang->line('Please_Select_Gender');?></option>
	  			<option value="Male"<?php if($value=="Male")echo "selected=selected"; ?>><?php echo $this->lang->line('Male');?></option>
	  			<option value="Female"<?php if($value=="Female")echo "selected=selected"; ?>><?php echo $this->lang->line('Female');?></option>
<option value="Other"<?php if($value=="Other") echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>

	  		</select><div class="form-error"><?= form_error('gender'); ?></div>
                                </div>
                            </div>

                        </div>


                     
                        <div class="form-field-container">
						<h3><?php echo $this->lang->line('Customer_address');?></h3>
                            <div class="form-group m-form__group row">
        <div class="form-group col-lg-4">
			<label for="street_name" class=" form-control-label"><?php echo $this->lang->line('Street_name');?></label>
			<?php if($data)
			{
				$value=set_value('street_name',$data->street_name);
			}
			else
			{
				$value=set_value('street_name');
			} ?>
			<?= form_input(['name'=>'street_name','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('street_name'); ?></div>
	  	</div>

	  	<div class="form-group col-lg-4">
			<label for="building_number" class=" form-control-label"><?php echo $this->lang->line('building_number');?></label>
			<?php if($data)
			{
				$value=set_value('building_number',$data->building_number);
			}
			else
			{
				$value=set_value('building_number');
			} ?>
			<?= form_input(['name'=>'building_number','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('building_number'); ?></div>
	  	</div>

	  	<div class="form-group col-lg-4">
			<label for="district" class=" form-control-label"><?php echo $this->lang->line('district');?></label>
			<?php if($data)
			{
				$value=set_value('district',$data->district);
			}
			else
			{
				$value=set_value('district');
			} ?>
			<?= form_input(['name'=>'district','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('district'); ?></div>
	  	</div>

                               <div class="form-group col-sm-4">
			<label for="country" class=" form-control-label"><?php echo $this->lang->line('Country');?>*</label>
			<?php if($data)
			{
				$value=set_value('country',$data->country);
			}
			else
			{
				$value=set_value('country');
			} ?>
			<select name="country" id="country" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker">
			<option value="<?php echo $value ?>"><?php echo $value ?></option>
			<?php  foreach($countries as $country) { ?>
			<option data-id="<?= $country->id; ?>" value="<?= $country->name; ?>" <?php if($country->name == $value) echo "selected";?>><?= $country->name; ?></option>
			<?php } ?>
			</select>
			<div class="form-error"><?= form_error('country'); ?></div>
	  	</div>
	  	<div class="form-group col-sm-4">
			<label for="city" class=" form-control-label"><?php echo $this->lang->line('State');?>*</label>
			<?php if($data)
			{
				$value=set_value('state',$data->state);
			}
			else
			{
				$value=set_value('state');
			} ?>
		<select name="state" id="state" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" >
	<option  data-sid="<?= $country->id; ?>" value="<?php echo $value ?>"><?php 
	if($value) echo getStateByID($value); else{ echo "Select Option";}; ?></option>
</select>
			<div class="form-error"><?= form_error('city'); ?></div>
	  	</div>
	  	<div class="form-group col-sm-4">
			<label for="city" class=" form-control-label"><?php echo $this->lang->line('City');?>*</label>
			<?php if($data)
			{
				$value=set_value('city',$data->city);
			}
			else
			{
				$value=set_value('city');
			} ?>
			<select name="city" id="city" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker">
				<option value="<?php echo $value ?>"><?php  if($value) echo getCityByID($value); else{ echo "Select Option";};  ?></option>
			</select>
			<div class="form-error"><?= form_error('city'); ?></div>
	  	</div>
                            </div>
                        </div>

                    
                        <div class="form-field-container">
						<h3><?php echo $this->lang->line('Postal_Address');?></h3>
                            <div class="form-group m-form__group row">
							<div class="form-group col-sm-6">
			<label for="po_box" class=" form-control-label"><?php echo $this->lang->line('PO_Box');?></label>
			<?php if($data)
			{
				$value=set_value('po_box',$data->po_box);
			}
			else
			{
				$value=set_value('po_box');
			} ?>
			<?= form_input(['name'=>'po_box','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('po_box'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-6">
			<label for="postal_code" class=" form-control-label"><?php echo $this->lang->line('Postal_Code');?></label>
			<?php if($data)
			{
				$value=set_value('postal_code',$data->postal_code);
			}
			else
			{
				$value=set_value('postal_code');
			} ?>
			<?= form_input(['name'=>'postal_code','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('postal_code'); ?></div>
	  	</div>

	  	
<div class="form-group col-sm-12">
			<label for="work_address" class=" form-control-label"><?php echo $this->lang->line('Work_Address');?></label>
			<?php if($data)
			{
				$value=set_value('work_address',$data->work_address);
			}
			else
			{
				$value=set_value('work_address');
			} ?>
			<?= form_textarea(['name'=>'work_address','class'=>'form-control m-input','cols'=>5,'rows'=>5,'value'=>$value]);?>
			<div class="form-error"><?= form_error('work_address'); ?></div>
	  	</div>
                                 
                            </div>
                        </div>

                      
                        <div class="form-field-container">
						<h3><?php echo $this->lang->line('Wasell_Address');?></h3>
                            <div class="form-group m-form__group row">
							 	<div class="form-group col-sm-4">
			<label for="building_number" class=" form-control-label"><?php echo $this->lang->line('building_numbers');?></label>
			<?php if($data)
			{
				$value=set_value('building_number',$data->building_number);
			}
			else
			{
				$value=set_value('building_number');
			} ?>
			<?= form_input(['name'=>'building_number','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('building_number'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-4">
			<label for="street_name" class=" form-control-label"><?php echo $this->lang->line('Street_Name');?></label>
			<?php if($data)
			{
				$value=set_value('street_name',$data->street_name);
			}
			else
			{
				$value=set_value('street_name');
			} ?>
			<?= form_input(['name'=>'street_name','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('street_name'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-4">
			<label for="unit_number" class=" form-control-label"><?php echo $this->lang->line('Unit_Number');?></label>
			<?php if($data)
			{
				$value=set_value('unit_number',$data->unit_number);
			}
			else
			{
				$value=set_value('unit_number');
			} ?>
			<?= form_input(['name'=>'unit_number','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('unit_number'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-4">
			<label for="extra_number" class=" form-control-label"><?php echo $this->lang->line('Extra_Number');?></label>
			<?php if($data)
			{
				$value=set_value('extra_number',$data->extra_number);
			}
			else
			{
				$value=set_value('extra_number');
			} ?>
			<?= form_input(['name'=>'extra_number','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('extra_number'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-4">
			<label for="district" class=" form-control-label"><?php echo $this->lang->line('district');?></label>
			<?php if($data)
			{
				$value=set_value('district',$data->district);
			}
			else
			{
				$value=set_value('district');
			} ?>
			<?= form_input(['name'=>'district','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('district'); ?></div>
	  	</div>
 
                            </div>
                        </div>

                        <div class="form-field-container">
							<h3><?php echo $this->lang->line('Contact_Numbers');?></h3>
                            <div class="form-group m-form__group row">
								<div class="form-group col-sm-6">
			<?php if($data)
			{
				$value=set_value('contact_type',$data->contact_type);
			}
			else
			{
				$value=set_value('contact_type');
			} ?>
	  		<label for="select_contact_type" class=" form-control-label"><?php echo $this->lang->line('Select_Contact_Type');?>*</label>
	  		<select name="contact_type" id="contact_type" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker">
	  			<option value=""><?php echo $this->lang->line('Please_select_type');?></option>
	  			<option value="Mobile"<?php if($value=='Mobile') echo "selected=selected"; ?>><?php echo $this->lang->line('Mobile');?></option>
	  			<option value="Business_Phone"<?php if($value=='Business_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Business_phone');?></option>
	  			<option value="Home_Phone"<?php if($value=='Home_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Home_phone');?></option>
	  			<option value="Fax"<?php if($value=='Fax') echo "selected=selected"; ?>><?php echo $this->lang->line('Fax');?></option>
	  			<option value="Other"<?php if($value=='Other') echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>
	  	
	  		</select>
	  			
			<?php echo form_input(['name'=>'other_contact_type','id'=>'other_contact_type','class'=>'form-control']); ?><div class="form-error"><?= form_error('contact_type'); ?></div>
	  	</div>
	  	<div class="form-group col-sm-6">
			<label for="contact_number" class=" form-control-label"><?php echo $this->lang->line('Contact_Number');?>*</label>
			<?php if($data)
			{
				$value=set_value('contact_number',$data->contact_number);
			}
			else
			{
				$value=set_value('contact_number');
			} ?>
			<?= form_input(['name'=>'contact_number','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('contact_number'); ?></div>
	  	</div>
		<div class="clear"></div>
	  	<div class="form-group col-sm-6">
			<?php if($data)
			{
				$value=set_value('contact_type1',$data->contact_type1);
			}
			else
			{
				$value=set_value('contact_type1');
			} ?>
	  		<label for="select_contact_type" class=" form-control-label"><?php echo $this->lang->line('Select_Contact_Type');?></label>
	  		<select name="contact_type1" id="contact_type1" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker">
	  			<option value=""><?php echo $this->lang->line('Please_select_type');?></option>
	  			<option value="Mobile"<?php if($value=='Mobile') echo "selected=selected"; ?>><?php echo $this->lang->line('Mobile');?></option>
	  			<option value="Business_Phone"<?php if($value=='Business_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Business_phone');?></option>
	  			<option value="Home_Phone"<?php if($value=='Home_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Home_phone');?></option>
	  			<option value="Fax"<?php if($value=='Fax') echo "selected=selected"; ?>><?php echo $this->lang->line('Fax');?></option>
	  			<option value="Other"<?php if($value=='Other') echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>
	  	
	  		</select>
	  	</div>
	  	<div class="form-group col-sm-6">
			<label for="contact_number1" class=" form-control-label"><?php echo $this->lang->line('Contact_Number');?></label>
			<?php if($data)
			{
				$value=set_value('contact_number1',$data->contact_number1);
			}
			else
			{
				$value=set_value('contact_number1');
			} ?>
			<?= form_input(['name'=>'contact_number1','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('contact_number1'); ?></div>
	  	</div>
		<div class="clear"></div>
	  	<div class="form-group col-sm-6">
			<?php if($data)
			{
				$value=set_value('contact_type2',$data->contact_type2);
			}
			else
			{
				$value=set_value('contact_type2');
			} ?>
	  		<label for="select_contact_type2" class=" form-control-label"><?php echo $this->lang->line('Select_Contact_Type');?></label>
	  		<select name="contact_type2" id="contact_type2" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" >
	  			<option value=""><?php echo $this->lang->line('Please_select_type');?></option>
	  			<option value="Mobile"<?php if($value=='Mobile') echo "selected=selected"; ?>><?php echo $this->lang->line('Mobile');?></option>
	  			<option value="Business_Phone"<?php if($value=='Business_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Business_phone');?></option>
	  			<option value="Home_Phone"<?php if($value=='Home_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Home_phone');?></option>
	  			<option value="Fax"<?php if($value=='Fax') echo "selected=selected"; ?>><?php echo $this->lang->line('Fax');?></option>
	  			<option value="Other"<?php if($value=='Other') echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>
	  	
	  		</select>
	  			
		 
	  	</div>
	  	<div class="form-group col-sm-6">
			<label for="contact_number2" class=" form-control-label"><?php echo $this->lang->line('Contact_Number');?></label>
			<?php if($data)
			{
				$value=set_value('contact_number2',$data->contact_number2);
			}
			else
			{
				$value=set_value('contact_number2');
			} ?>
			<?= form_input(['name'=>'contact_number2','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('contact_number2'); ?></div>
	  	</div>
		<div class="clear"></div>
	  	<div class="form-group col-sm-6">
			<?php if($data)
			{
				$value=set_value('contact_type3',$data->contact_type3);
			}
			else
			{
				$value=set_value('contact_type3');
			} ?>
	  		<label for="select_contact_type3" class=" form-control-label"><?php echo $this->lang->line('Select_Contact_Type');?></label>
	  		<select name="contact_type3" id="contact_type3" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker">
	  			<option value=""><?php echo $this->lang->line('Please_select_type');?></option>
	  			<option value="Mobile"<?php if($value=='Mobile') echo "selected=selected"; ?>><?php echo $this->lang->line('Mobile');?></option>
	  			<option value="Business_Phone"<?php if($value=='Business_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Business_phone');?></option>
	  			<option value="Home_Phone"<?php if($value=='Home_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Home_phone');?></option>
	  			<option value="Fax"<?php if($value=='Fax') echo "selected=selected"; ?>><?php echo $this->lang->line('Fax');?></option>
	  			<option value="Other"<?php if($value=='Other') echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>
	  	
	  		</select>
	  		 
	  	</div>
	  	<div class="form-group col-sm-6">
			<label for="contact_number3" class=" form-control-label"><?php echo $this->lang->line('Contact_Number');?></label>
			<?php if($data)
			{
				$value=set_value('contact_number3',$data->contact_number3);
			}
			else
			{
				$value=set_value('contact_number3');
			} ?>
			<?= form_input(['name'=>'contact_number3','class'=>'form-control m-input','value'=>$value]);?>
			<div class="form-error"><?= form_error('contact_number3'); ?></div>
	  	</div>
			<div class="col-lg-6">
				<label><?php echo $this->lang->line('Customer_image');?>*</label>
				<div class="custom-file">
				<?= form_upload(['name'=>'customer_image','class'=>'form-control m-input custom-file-input','value'=>$value]);?>
					 	
					<label class="custom-file-label" for="customFile"><?php echo $this->lang->line('Choose_file');?></label>
				</div>
			</div>
	   
	  	<div class="form-group col-sm-12">
			<label for="notes" class=" form-control-label"><?php echo $this->lang->line('Note');?>*</label>
			<?php if($data)
			{
				$value=set_value('notes',$data->notes);
			}
			else
			{
				$value=set_value('notes');
			} ?>
			<?= form_textarea(['name'=>'notes','class'=>'form-control m-input','rows'=>5,'cols'=>5,'value'=>$value]);?>
			<div class="form-error"><?= form_error('notes'); ?></div>
	  	</div>
                            </div>
                        </div>
						<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('Submit');?></button>
                    </div>
                   
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>


<?php

include('footer.php');
?>

<script type="text/javascript">
	
$(document).ready(function()
{
	$('#success').hide();
});
 $(document).ready(function(){
  $('#other_contact_type').css({'display':'none'});  
       $('#contact_type').change(function(){
           if ($(this).val() == 'other') {
               $('#other_contact_type').css({'display':'block'});           
           } else{    $('#other_contact_type').css({'display':'none'});      } 
        });
$('#other_type_of_customer').css({'display':'none'});  
       $('#type_of_customer').change(function(){
           if ($(this).val() == 'other') {
               $('#other_type_of_customer').css({'display':'block'});           
           } else { $('#other_type_of_customer').css({'display':'none'});   }
        });
    $('#other_service_types').css({'display':'none'});  
       $('#service_types').change(function(){
           if ($(this).val() == 'other') {
               $('#other_service_types').css({'display':'block'});           
           }else { $('#other_service_types').css({'display':'none'});   }
        });    
    $('#other_client_status').css({'display':'none'});  
       $('#client_status').change(function(){
           if ($(this).val() == 'other') {
               $('#other_client_status').css({'display':'block'});           
           }else { $('#other_client_status').css({'display':'none'});   }
        });    

		$('#other_identification_types').css({'display':'none'});  
        $('#identification_types').change(function(){
           if ($(this).val() == 'other') {
               $('#other_identification_types').css({'display':'block'});           
           }else { $('#other_identification_types').css({'display':'none'}); }
        });    
  });
</script>

<script type="text/javascript">

$(document).ready(function()
{
  $('#msg').hide();

$("#country").change(function()
{
  var id= $('option:selected', this).data('id');
 
  var url="<?= base_url('admin/admin/country_list'); ?>"; 

  $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    dataTyppe: 'json',
  
    success:function(data){
			
          $('#state').html('');
          $('#state').append(data);
		  jQuery('select').selectpicker('refresh');

      },
  });
 
return true;
 });
$("#state").change(function()
{
  var id= $('option:selected', this).data('sid');

  var url="<?= base_url('admin/admin/city_list'); ?>"; 

  $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    dataTyppe: 'json',
  
    success:function(data){
			
          $('#city').html('');
          $('#city').append(data);
		  jQuery('select').selectpicker('refresh');

      },
  });
 
return true;
 });
});
    
</script>