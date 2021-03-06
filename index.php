<?php include("includes/header.php"); ?>
<?php 


$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$items_per_page = 3;
$items_total_count = Photo::count_all();



$paginate = new Paginate($page, $items_per_page, $items_total_count);

//query
// $sql = "SELECT * FROM photos ORDER BY id DESC ";
// $sql .= "LIMIT {$items_per_page} ";
// $sql .= "OFFSET {$paginate->offset()}";

//custom function....
//$offset = $paginate->offset();
$sql = Photo::paginate($items_per_page, $paginate->offset());


$photos = Photo::find_by_query($sql);









 ?>


        <div class="row">
            <div class="col-md-4">

            
                 <?php include("includes/sidebar.php"); ?>



            </div>

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                
                    <?php //$photos = Photo::find_all_desc(); 

                    foreach ($photos as $photo) {?>

                        <div class="panel panel-default">

                            <a href="photo.php?id=<?php echo $photo->id; ?>"><img class="panel-img-top" src="admin/<?php echo $photo->picture_path(); ?>" alt="sdsdf" width="100%"></a>
                            <div class="panel-body">
                        
                                <h2><?php echo $photo->title; ?></h2>
                                <p><?php echo $photo->description; ?></p>
                            <a href="photo.php?id=<?php echo $photo->id; ?>" class="btn btn-primary">Read More</a>
                            </div>
                             <div class="panel-footer">
                                 Posted on September 25, 2018 by
                                <a href="#">Deen</a>
                             </div>
                        </div>

                        <?php
                        
                    }
                    ?>
                     
                     <ul class="pager">

            <?php 


            if($paginate->total_page() > 1) {

                if($paginate->has_next()) {

echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";


                }




                for ($i=1; $i <= $paginate->total_page(); $i++) { 


                    if($i == $paginate->current_page) {


        echo  "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";



                    } else {

        echo  "<li><a href='index.php?page={$i}'>{$i}</a></li>";


                    }
                  
                }

         


               




        







                  if($paginate->has_previous()) {

echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";


                }




            }


             ?>


        </ul>
            
          
         

            </div>
            




            <!-- Blog Sidebar Widgets Column -->
            
       
                
            
        <!-- /.row -->
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    <div class="text-center">
                        <p>Copyright &copy; Your Website 2014</p>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>

<?php include("includes/footer.php"); ?>
