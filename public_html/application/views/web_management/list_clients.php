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
            font-size: 15px;
            text-transform: uppercase;
            padding: 10px 10px 10px 29px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 15px 15px 0 15px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 15px;
            padding-bottom: 20px;
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
        .nav {
            display: -webkit-box;
        }
        .m-portlet {
            margin-bottom: 0;
        }
        .m-widget4 .m-widget4__item .m-widget4__info {
            width: 97.2%;
        }
		.m-body .m-content {
    padding: 29px 45px;
}
    </style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Clients_List');?>
                            </h3>
                        </div>
                    </div>
                </div>


             

                <!--begin::Form-->
	<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                    <div class="m-portlet__body"> <div class="form-group m-form__group row">
					<div class="col-md-12" style=" margin: 20px 0; ">
<a class="btn btn-success btn-lg" href="<?=base_url('web_management/cms/add_clients');?>"><?php echo $this->lang->line('Add_Clients');?></a>     <br>      </div>

	  <table id="" class="table table-striped table-bordered tablecase">
			<thead>
			  <tr class="netTr">
				  <th><?php echo $this->lang->line('No');?></th>
                        <th><?php echo $this->lang->line('Title');?></th>
                        <th><?php echo $this->lang->line('Symbol');?></th>
                        <th><?php echo $this->lang->line('Discription');?></th>
                        <th><?php echo $this->lang->line('ACTION');?></th>
			  </tr>
			</thead>
			<tbody>
			   
                    <?php $count=1;?>
                      <?php foreach($data as $data){ ?>
                      <tr class="hide<?php echo $data['id'] ?>">
                        <td><?= $count++ ?></td>
                        <td><?= $data['title'] ?></td>
                        <td><img src="<?= base_url('uploads/clients/'.$data['image']);?>" height="70" width="80"></td>
                        <td><?= $data['discription'] ?></td>
              <td class="action">
              <?php if(isset($datas[1][2]) && $datas[1][2] == 1){?>
                <a href=<?= base_url("admin/admin/find_clients/{$data['id']}") ?> class="fa fa-pencil-square-o editadmin"></a>
              <?php } ?>
              <a href="javascript:;" title="<?php echo $this->lang->line('Delete');?>" class=" fa fa-trash delete_clients" id=<?= $data['id'] ?>></a>

               </td>
                      </tr>
                    <?php } ?>  
			</tbody>
		  </table>
 
 

                
                        </div>
                        </div>

                    </div>
            

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    </div>
    </div>


<?php

include('footer.php');
?>
 <script type="text/javascript">

<?php if(isset($datas[1][3]) && $datas[1][3] == 1){?>
  $('.dataTables_filter').show();
<?php }else{?>
  $('.dataTables_filter').hide();
<?php } ?>

$(document).ready(function()
{
  $('#msg').hide();
   $('#customers-table').DataTable();
});
</script>

 <script type="text/javascript">

    $('.delete_clients').click(function(){
  var id=$(this).attr("id");
  var url="<?= base_url('admin/admin/delete_clients'); ?>"; 
   bootbox.confirm("Are you sure to delete clients?", function(result){
    if(result)
    {
      $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
  
    success:function(data){
       $('#msg').show();
         $('#msg').html(data);

      },
  });
$('.hide'+id).hide(200);
return true;
  }
  else
  {
      $('#msg').show();
       $('#msg').html('delete failed');
  }
    })
    });
</script>