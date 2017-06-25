
<script>
 $(document).ready(function(){
    $('#month_index').val("<?php echo $month_index; ?>");
    $('#year').val("<?php echo $year; ?>");
    $('#editable').val("<?php echo $editable; ?>")
    $('#button_title').val("<?php echo $button_title; ?>")
    <?php 
    if(!($page_header == "Add new Tour plan")){
        echo "$('#json').val($json);";
    }

     ?> 
    
 var loginform= document.getElementById("tempform");
 loginform.style.display = "none";
 loginform.submit();
});
</script>

<div id="page-wrapper" ng-app="synchem">

    <div class="container-fluid"  ng-controller="showtp">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                 <?php echo $page_header; ?>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'tp/landing'?> ">TourPlanner</a>
                    </li>
                    <li>
                        <a href="<?php if(!($page_header == 'Add new Tour plan')){echo base_url().'tp/show';}else{echo base_url().'tp/add';} ?>"><?php echo $page_header; ?></a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i>Tour plan <?php echo $month."-".$year; ?>
                    </li>
                </ol>
            </div>
        </div>

        <form id="tempform" target="myFrame"  action="<?php echo base_url(); ?>tp/calendar" method="POST">
         <input type="text" id="month_index" name="month_index" />
         <input type="text" id="year" name="year" />
         <input type="text" id="editable" name="editable" />
         <input type="text" id="button_title" name="button_title" />
         <input type="text" id="json" name="json" />
        </form>

        <div class="embed-responsive embed-responsive-4by3">
        <iframe class="embed-responsive-item" src="#" name="myFrame" ></iframe>
        </div>
        <!-- /.row -->
        
        <!-- Edit Popup -->
        <!-- Modal -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->



