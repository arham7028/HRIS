<?php 
include("header.php");
include "include/config.php";
?>

<style>
	body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  
  h1 {
    text-align: center;
  }
  
  .profile {
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 80%;
    max-width: 600px;
    text-align: center; /* Center the profile */
  }
  
  .profile img {
    display: block;
    margin: 0 auto;
    border-radius: 50%;
    max-width: 200px; /* Limit the maximum width of the image */
    height: auto; /* Maintain aspect ratio */
  }
  
  .profile h2 {
    margin-top: 10px; /* Add some space between the image and the name */
  }
  
  .profile p {
    margin: 5px 0;
  }
  
</style>

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h2>Team</h2>
				<span>HRIS Team</span>
			</div>

		</section><!-- #page-title end -->

		<!-- Page Sub Menu
		============================================= -->
		<div id="page-menu">

			<div id="page-menu-wrap">


			</div>

		</div><!-- #page-menu end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					
					<div class="row">

						<div class="col-md-6 bottommargin">
<?php 
        $query = "SELECT * FROM `team` WHERE name = 'Syed Arham Abbas'";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){

         		$ChairmanPic = $row['image'];

         }}

?>


							<div class="team team-list clearfix">
								<div class="team-image">
									<img src="gotoep/images/team/<?php if(isset($ChairmanPic)) echo $ChairmanPic; ?>" alt="Chaudhry Faheem Irfan">
								</div>
								<div class="team-desc">
									<div class="team-title"><h4>Syed Arham Abbas</h4><span>Chairman</span></div>
									<div class="team-content">
										<p>As the Chairman of HRIS, <br>He brings a wealth of experience and a visionary approach to guiding the company's strategic direction and governance. With over [number] years of experience in the technology industry.</p>
									</div>	
								</div>
							</div>
						</div>

<?php 
        $query = "SELECT * FROM `team` WHERE name = 'Harsal Rabade'";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){

         		$ceoPic = $row['image'];

         }}

?>

						<div class="col-md-6 bottommargin">

							<div class="team team-list clearfix">
								<div class="team-image">
									<img src="gotoep/images/team/<?php if(isset($ceoPic)) echo $ceoPic; ?>" alt="Harshal Rabade">
								</div>
								<div class="team-desc">
									<div class="team-title"><h4>Harsal Rabade</h4><span>President</span></div>
									
									<div class="team-content">
										<p>As the President of HRIS,<br> He brings over 4 years of experience in the software and technology industry, leading the company with a vision for innovation and excellence. </p>
									</div>
								</div>
							</div>

						</div>
<?php 
        $query = "SELECT * FROM `team` WHERE name = 'Rohit Wankhede'";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){

         		$ceoPic = $row['image'];

         }}

?>

						<div class="col-md-6 bottommargin">

							<div class="team team-list clearfix">
								<div class="team-image">
									<img src="gotoep/images/team/<?php if(isset($ceoPic)) echo $ceoPic; ?>" alt="Harshal Rabade">
								</div>
								<div class="team-desc">
									<div class="team-title"><h4>Rohit Wankhede</h4><span>CEO</span></div>
									
									<div class="team-content">
										<p>As the CEO of HRIS,<br> He brings over 4 years of experience in the software and technology sector, guiding the company to new heights with a blend of strategic vision and operational expertise. </p>
									</div>
								</div>
							</div>

						</div>
<?php 
        $query = "SELECT * FROM `team` WHERE name = 'Tejas Tayade'";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){

         		$ceoPic = $row['image'];

         }}

?>

						<div class="col-md-6 bottommargin">

							<div class="team team-list clearfix">
								<div class="team-image">
									<img src="gotoep/images/team/<?php if(isset($ceoPic)) echo $ceoPic; ?>" alt="Harshal Rabade">
								</div>
								<div class="team-desc">
									<div class="team-title"><h4>Tejas Tayade</h4><span>CTO</span></div>
									
									<div class="team-content">
										<p>As the CTO of HRIS,<br> He brings over 3 years of expertise in the software and technology industry, leading the company's technological vision and strategy. He is a visionary leader, adept at identifying emerging trends and integrating them into the company's strategic initiatives.</p>
									</div>
								</div>
							</div>

						</div>
					</div> 




					<div class="clear"></div>

					<div class="fancy-title title-border title-center">
						<h3>Instructor's Team</h3>
					</div>

					<div id="oc-team" class="owl-carousel team-carousel bottommargin carousel-widget" data-margin="30" data-pagi="false" data-items-xs="2" data-items-sm="2" data-items-lg="4">
						
					
					<?php 
					$sql2 = "SELECT * FROM teacher";
					$result2 = mysqli_query($connection, $sql2);
					while( $row2 = mysqli_fetch_assoc($result2) ){
					?>
					<div class="profile">
						<img src="gotoep/images/instructor/<?php echo $row2['image']; ?>" alt="CEO">
						<h2><?php echo $row2['name']; ?></h2>
						<p><?php echo $row2['qualification']; ?></p>
						<p><?php echo $row2['mail']; ?></p>
						<p><?php echo $row2['phone']; ?></p>
					</div>
					<?php } ?> 

					</div>
					
					<div class="clear"></div>

				</div>
			</div>
		
	</section><!-- #content end -->

<?php include("footer.php"); ?>
