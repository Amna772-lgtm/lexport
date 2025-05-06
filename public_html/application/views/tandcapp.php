
<link rel="stylesheet" href="https://albarakatilaw.com/assets/css/plugins.css?v=2.4"/>
<link rel="stylesheet" href="https://albarakatilaw.com/assets/css/theme.css?v=2.4"/>

 <br>
       <div class="col-md-12 col-sm-12">
				<div class="textContent">
                    
                <?php 

if($_GET['lang'] == "ar" )
{
	$pageTitle = $data->title_ar;
	echo $description = $data->des_ar;
}
else if($_GET['lang'] == "en" )
{
	$pageTitle = $data->title_en;
	echo $description = $data->des_en;
}
                ?>
          
        </div>        <br></div>
