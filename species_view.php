<?php include_once realpath("header.php");?>
<?php include_once 'tools/common_functions.php';?>

<div style="max-width:900px; margin:auto; text-align: justify;">
  <br>
  <?php
    
  $sps_name = test_input($_GET["sps_name"]);
  $common_name = test_input($_GET["common_name"]);
  $sps_img = test_input($_GET["sps_img"]);
    
  ?>

  <div class="row" style="margin-bottom: 10px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <?php 
        if ( file_exists("$json_files_path/customization/organisms.json") ) {
        
            $sps_json_file = file_get_contents("$json_files_path/customization/organisms.json");
            // var_dump($sps_json_file);

            $species_hash = json_decode($sps_json_file, true);
            // var_dump($species_hash);

	    if (empty($common_name)){
	      $common_name = $species_hash[$sps_name]["common_name"];
	    }
	    if (empty($sps_img)){
	      $sps_img = $species_hash[$sps_name]["image"];
	    }
          }
       

      ?>
      
      <img class="float-left" style="z-index:0;height:150px;padding-right:10px;" src="<?php echo $images_path.'/species/'.$sps_img ?>" >
      <h1><?php echo $common_name ?></h1>
      <h3 style="color:#666"><i><?php echo $sps_name ?></i></h3>
      <?php if (!empty($species_hash[$sps_name]["taxon_id"])): ?>
        <?php $taxon_id = $species_hash[$sps_name]["taxon_id"]; ?>
        <p><h3 style="color:#666">Taxon ID: <a href="https://www.ncbi.nlm.nih.gov/datasets/taxonomy/<?php echo $taxon_id; ?>"><?php echo $taxon_id; ?></a></p></h3>
      <?php endif; ?>

       <p><?php echo $species_hash[$sps_name]["text"] ?></p>


       <?php if (!empty($species_hash[$sps_name]["text_src"])): ?>
        <?php $txt_src= $species_hash[$sps_name]["text_src"]; ?>
        <p>Text is from <?php echo $txt_src ?> </p>
      <?php endif; ?>
    </div>
  </div>


</div>

<style>
  .sps-btn {
    float: left!important;
    margin-right: 10px;
    margin-bottom: 10px;
  }
</style>


<?php include_once realpath("$easy_gdb_path/footer.php");?>
