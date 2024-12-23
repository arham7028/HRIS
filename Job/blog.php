<!-- <link rel="stylesheet" href="css/utils.css"> -->
<!-- <link rel="stylesheet" href="css/style.css"> -->
<link rel="stylesheet" href="css/mobile.css">
<style>
	@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@500&display=swap");
:root { 
  --main-bg-color: #bd6418;
  --font1: "Baloo Bhaina 2", cursive;
  --font2: "Roboto", sans-serif;
}

.center{
  text-align: center
}

.font1 {
  font-family: var(--font1);
}
.font2 {
  font-family: var(--font2);
}

.max-width-1 {
  max-width: 80vw;
}

.max-width-2 {
  max-width: 60vw;
}

.m-auto {
  margin: auto;
}

.mx-1{
  margin-left: 23px;
  margin-right: 23px;
}

.my-2{
  margin-top: 32px;
  margin-bottom: 32px;
}

.btn {
  padding: 0px 20px;
  padding-top: 3px;
  border: 2px solid black;
  border-radius: 6px;
  font-family: var(--font1);
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

.btn:hover {
  color: white;
  background: var(--main-bg-color);
}

.form-input {
  padding: 0px 5px;
  padding-top: 3px;
  font-size: 16px;
  border: 2px solid black;
  border-radius: 4px;
  margin: 0 13px;
  font-family: var(--font1);
}

.form-box input, textarea{
  width: 52vw;
  padding: 0px 6px;
  margin: 7px 0;
  font-size: 18px;
  font-family: var(--font1);
  border: 2px solid var(--main-bg-color);
    border-radius: 5px;
}

* {
  margin: 0;
  padding: 0; 
}

.navigation {
  margin-top: 25px;
  font-family: var(--font1);
  /* height: 74px;  */
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav-left {
  display: flex;
}

.nav-left span {
  font-size: 35px;
  padding-top: 10px;
}

.nav-left ul {
  display: flex;
  align-items: center;
  margin: 0 77px;
  font-size: 22px;
  padding-bottom: 23px;
}

.nav-left ul li {
  list-style: none;
  margin: 0 14px;
  font-family: var(--font2);
  transition: all 0.3s ease-in-out;
}

.nav-left ul li a {
  text-decoration: none;
  color: black;
}

.nav-left ul li a:hover {
  color: var(--main-bg-color);
  font-weight: bolder;
}

.content {
  height: 100%;
  display: flex;
  margin-top: 32px;
  padding: 9px;
  position: relative;
}

.content::after {
  content: "";
  background-image: url("Images/11.svg");
  position: absolute;
  width: 100%;
  height: inherit;
  opacity: 0.15;
  border-radius: 12px;
}

.content-left {
  font-family: var(--font1);
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 49px;
  z-index: 1;
}

.content-right {
  display: flex;
  align-items: center;
  justify-content: center;
}

.content-right img {
 max-width: none;
  height: 355px;
  border: 2px solid black;
  border-radius: 200px;
}

.home-articles {
  padding: 18px;
  background-color: rgb(248, 239, 239, 0.5);
  margin-top: 23px;
  position: relative;
}

.year-box {
  position: absolute;  
  right: 0px;
  top: 100px;
  width: 234px;
  height: 255px;
  font-size: 18px;
}

.year-box div {
  margin: 12px 0px;
}

.home-article {
  display: flex;
  margin: 25px;
}

.home-article img {
  width: 300px;
}

.home-article-content {
  align-self: center;
  padding: 25px;
}

.home-article-content a {
  text-decoration: none;
  color: black;
}
/* .home-articles{} */
.footer {
  height: 50px;
  background-color: var(--main-bg-color);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  flex-direction: column;
}

.footer a {
  color: white;
}

#cover{
	border-radius: 50%;
}
</style>
<?php include("header2.php");

	if(isset($_GET['id'])){

		$sendId=$_GET['id'];
	}

 ?>
		<!-- Content
		============================================= -->



		<div id="page-menu">

			<div id="page-menu-wrap">
      <h1 class="center" style="background: #d3cbcb8c;">Blogging</h1>			</div>

		</div><!-- #page-menu end -->

<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- ===============Post Content============= -->
					<div class="postcontent nobottommargin clearfix" style="width:100%;">

						<!-- ===================Posts============== -->
						<div id="posts">

						<!-- <nav class="navigation max-width-1 m-auto">
        <div class="nav-right">
            <form action="search.html" method="get">
                <input class="form-input" type="text" name="query" placeholder="Article Search">
                <button class="btn col-md-4" style="margin-left:12px;">Search</button>
            </form>

        </div>

    </nav> -->
    <div class="max-width-1 m-auto">
        <hr>
    </div>
    <div class="m-auto content max-width-1 my-2">
        <div class="content-left">
            <h1>The heaven for bloggers</h1>
            <p>iBlog is a website which lets you submit an article which upon approval will be up on our website and you
                can get a good amount of reach from here!</p>
            <p>My Halloween decorations are staying in the box this year. To be honest, they didn’t make it out of the
                box last year either. My Halloween spirit has officially been bludgeoned to death by teenagers who no
                longer care and a persistent October fear of the Northern California wildfires. And speaking of fear,
                isn’t there more than enough of that going around? Maybe all of us can pretend that Halloween isn’t even
                happening this year?</p>
        </div>
        <div class="content-right">
            <img src="Images/home.svg" alt="iBlog">
        </div>
    </div>

    <div class="max-width-1 m-auto">
        <hr>
    </div>
    <div class="home-articles max-width-1 m-auto font2">
        <h2>Featured Articles</h2>
        <!-- <div class="year-box adjust-year">
            <div>
                <h3>Year </h3>
            </div>
            <div>
                <input type="radio" name="year" id=""> 2020
            </div>
            <div>
                <input type="radio" name="year" id=""> 2021
            </div>
        </div> -->
		<?php 
		include "config.php";
		$sql = "SELECT * FROM `blog`";
		$result = mysqli_query($conn, $sql);

		// foreach($users as $user)
		while( $user = mysqli_fetch_assoc($result) )
		{
		$pid = $user['admin'];
		$sql2 = "SELECT * FROM `admin` where id= $pid";
		$result2 = mysqli_query($conn, $sql2);
		$user2 = mysqli_fetch_assoc($result2);
		?>
		
        <div class="home-article">
            <div class="home-article-img">
                <img src="../gotoep/images/admin/<?php echo $user2['profilePic']; ?>" id="cover" alt="article">
            </div>
            <div class="home-article-content font1">
                <a href="blogpost.php?id=<?php echo $user['id'] ?>">
                    <h3><?php echo $user['title'];?></h3>
                </a>

                <div><?php echo $user2['name'];?></div>
                <span><?php echo $user['postDate'];?></span>
            </div>
        </div>
		<?php
            }
          ?>

    </div>


							

						</div><!-- #posts end -->

						
					</div><!-- .postcontent end -->


<!--**************************************************************************** -->

				<div id="posts" class="post-grid grid-container clearfix nobottommargin nobottommargin">

				<!-- php code -->

				
		
						</div>
					</div><!-- #posts end -->
<!--**************************************************************-->
	
				</div> <!-- container -->

		</section><!-- #content end -->

<?php include("footer.php"); ?>