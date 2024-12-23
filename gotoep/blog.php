<?php
        include "../include/config.php";
         include "header.php";
         $query1 = "SELECT * FROM `admin` WHERE admin_mail='$loginName'";
         $result = mysqli_query($connection, $query1);
        $row = mysqli_fetch_assoc($result);
        $adminID = $row['id'];
        if(isset($_GET['delete'])){
            $sno = $_GET['delete'];
            $delete = true;
            $sql = "DELETE FROM `blog` WHERE `blog`.`id` = $sno";
            $result = mysqli_query($connection, $sql);
        }

         if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset( $_POST['snoEdit'])){
                $Couresename = $_POST['courseEdit'];
                $description = $_POST['descriptionEdit'];
                $id = $_POST['myidEdit'];
                $sql = " UPDATE `blog` SET `postContent` = '$description', `title` = '$Couresename' WHERE `blog`.`id` = $id";
                $result = mysqli_query($connection, $sql);
                if($result){
                    $update = true;
                }
                else{
                $updateerr=true;
                }
            }else{
            $title = $_POST['title'];
            $content = $_POST['content'];
            $url = $_POST['link'];
            $sql = "INSERT INTO `blog` ( `postContent`, `postDate`, `admin`, `title`, `status`, `post`) VALUES ('$content', CURRENT_DATE(), '$adminID', '$title', 'status', '$url')";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo"success";
                }
            }
        }
         ?>
<style>
#vertical-nav nav li:hover > a, #vertical-nav nav li.current > a, #vertical-nav nav li.active > a {
    background-color: #FFF;
    color: #ed8739;
}
</style>
		<!--  ===========================  Document Wrapper =========================== -->
	<!-- <div id="wrapper" class="clearfix"> -->

		<div id="vertical-nav">
			<div class="container clearfix">

				<nav>
					<ul>
						<li><a href="home.php"><i class="icon-home2"></i>Home</a></li>

                        <li><a href="categorie.php"><i class="icon-book2"></i>Categories</a></li>    

						<li><a href="courses.php"><i class="icon-book3"></i>Courses</a></li>

						<li><a href="content.php"><i class="icon-line-content-left"></i>Content</a> </li>

						<li class="current"><a href="blog.php"><i class="icon-blogger"></i>Blog</a></li>

						<!-- <li><a href="library.php"><i class="icon-line-align-center"></i>Library</a></li> -->

						<li><a href="instructors.php"><i class="icon-guest"></i>Instructors</a></li>

                        <!-- <li><a href="team.php"><i class="icon-users"></i>Team</a></li> -->

                        <li><a href="logout.php"><i class="icon-line-power"></i>Logout</a></li>    

					</ul>
				</nav>

			</div>
		</div>

				<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Welcome <strong><?php if(isset($row)) echo $row['name']; ?></strong></h1>
			</div>

			<div id="page-menu-wrap">

				<div class="container clearfix">

				</div>

			</div>

		</section><!-- #page-title end -->

		<!-- Page Sub Menu
		============================================= -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
				<!-- ========================================== -->

				<div class="postcontent nobottommargin">

                <?php

                    // echo $alertMessage; 

                    if(isset($update_status)) echo $update_status;

                        if(isset($message_title) || isset($message_option) || isset($message_picture) || isset($submit_message) || isset($message_con) ){
                            echo "<div class='alert alert-danger'>";
                           
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                    if(isset($delete)){
                        echo "<div class='alert alert-danger'>";
                           
                        echo "The blog is delete successfully<br>";

                        echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                        </div>";  

                    }

                 ?>
                 

                 <!-- Edit -->
                 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="blog.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <input type="hidden" class="form-control" id="myidEdit" name="myidEdit" aria-describedby="emailHelp">
            </div>

            <!-- <div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePicUpdate" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                            Cover Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div> -->

            <div class="form-group">
              <label for="courseEdit">Title</label>
              <input class="form-control" id="courseEdit" name="courseEdit" aria-describedby="emailHelp">
            </div> 
            <div class="form-group">
              <label for="descriptionEdit">Post Content</label>
              <input class="form-control" id="descriptionEdit" name="descriptionEdit" aria-describedby="emailHelp">
            </div> 

          </div>
          <div class="modal-footer d-block mr-auto">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

						<h3>Insert Post</h3>

                        <form action="blog.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" placeholder="Title" name="title" class="form-control">
                        <?php if(isset($message_title)){ echo $message_title; } ?>
                    </div>

                   
                <div class="form-group">                    
                        <label>Post Selection</label>
                        <select class="form-control"  name="contentsel" id="contentsel" onchange="showinput()">
                        <option value="">Select Option</option>
                    <?php 
                             $select = ["video"]; //,"image"
                             foreach ($select as $value) {
                    ?>

                    <option value="<?php echo $value; ?>" > <?php echo $value; ?>  </option>

                    <?php       
                        }
                    ?>

                </select>
            </div>
            <?php if(isset($message_option)) echo $message_option; ?>
                    <div id="data">
    

                    </div>
                    
                    <div class="form-group">
                        <label for="content">Post Content</label>
                        <textarea id="content" class="form-control" 
                         name="content" style="margin-left:0"></textarea>
                    </div>
                     <?php if(isset($message_con)) echo $message_con; ?>   
                    <div class="form-group col-md-2">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>

<!--%%%%%%%%%%%%%%%% HERE DISPLAY TABLE %%%%%%%%%%%%%%%%% -->
    
    
    <table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Post</th>
        <th>Title</th>
        <th>Post Content</th>
        <th>Post Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

        $query = "SELECT * FROM `blog`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
                echo "<td>".$row["id"]."</td>"; 
                if($row["status"]=='image'){

                    echo "<td><img src=images/blog/".$row["post"]." width='80px' height='80px'> </td> "; 
                 }else{ ?>


                            <td width="80" height="80"> 
                                <!-- <iframe width="80px" height="80px" src="https://www.youtube.com/embed/<?php echo $row['post'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                                <iframe width="80px" height="80px" src="<?php echo $row['post'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </a>
                             </td>


                <?php }   


                echo "<td>".$row["title"]."</td> <td row='5'> ".$row["postContent"]."</td><td> ".$row["postDate"]."</td>";

                echo '<td><a class="edit btn btn-primary btn-sm"><span class="icon-edit"></span></a></td>';
                
                echo "<td> <button class='delete btn btn-sm btn-danger' id=d".$row['id']."><span class='icon-trash2'></span></button></td>";

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no posts.<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($connection);
    ?>

    <tr>
        <td colspan="7" id="end"><div class="text-center"><a href="blog.php" type="button" class="btn btn-sm btn-success"><span class="icon-plus"></span></a></div></td>
    </tr>
</table>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    



					</div><!-- .postcontent end -->


				</div>

			</div>

		</section><!-- #content end -->

<script>
function showinput(){
    var select = document.getElementById('contentsel');
    select = select.value;
        if(select=='video')
        {
            document.getElementById('data').innerHTML =  
            `<div class="form-group">
                        <label for="link">Video Link</label>
                        <input type="url" id="link" placeholder="Link" name="link" class="form-control">
                    </div>
                    <?php if(isset($message_picture)){ echo $message_picture; } ?>`;
        } else if(select=='image'){
            document.getElementById('data').innerHTML =  
            `<div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                            Profile Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>`;
        } else {
            document.getElementById('data').innerHTML =  
            ``;
        }

    } 
</script>


<?php include('footer.php'); 

?>
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        myid = tr.getElementsByTagName("td")[0].innerText;
        name = tr.getElementsByTagName("td")[2].innerText;
        description = tr.getElementsByTagName("td")[3].innerText;
        console.log(myid, name,description);
        myidEdit.value = myid;
        courseEdit.value = name;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this blog?")) {
          console.log("yes");
          window.location = `blog.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>