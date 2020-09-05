<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . "/header.php"); ?>
<?php 
if(!isset($_SESSION['username'])){
    redirect("../../public/login.php");
}

?>

        <div id="page-wrapper">

            <div class="container-fluid">

               
                <!-- /.row -->
                <?php 
                    if($_SERVER['REQUEST_URI'] == "/sahas-organic-care/public/admin/"|| $_SERVER['REQUEST_URI']=="/sahas-organic-care/public/admin/index.php"){
                        include(TEMPLATE_BACK . "/admin_content.php");
                    }           
                    if(isset($_GET['products'])){
                        include(TEMPLATE_BACK . "/products.php");
                    }
                    if(isset($_GET['add_product'])){
                        include(TEMPLATE_BACK . "/add_product.php");
                    }
                ?>

                 <!-- FIRST ROW WITH PANELS -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include(TEMPLATE_BACK . "/footer.php"); ?>
