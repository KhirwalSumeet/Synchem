
<script>
 $(document).ready(function(){
    $('#month_index').val("<?php echo $month_index; ?>");
    $('#year').val("<?php echo $year; ?>");
    $('#editable').val("<?php echo $editable; ?>");
    $('#button_title').val("<?php echo $button_title; ?>");
    $('#user_id').val("<?php echo $user_id; ?>");
    $('#role').val("<?php echo $_SESSION['role'] ?>");
    $('#sets').val('<?php echo $sets; ?>');
    <?php 
    if(!($page_header == "Add new Tour plan")){
        echo "$('#json').val($json);";
    }

     ?> 
    
 var loginform= document.getElementById("tempform");
 loginform.style.display = "none";
 loginform.submit();
 var update_form = document.getElementById("update_status");
 update_form.style.display = "none";
});

function submit(option) {
       
        $('#tour_month').val("<?php echo $month_index ?>");
        $('#tour_year').val("<?php echo $year ?>");
        $('#status').val(option);
        $('#user_id_update').val("<?php echo $user_id ?>");
        var update_form = document.getElementById("update_status");
        update_form.submit();

}
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
        <?php if($button_title == 'Update Status'){
            echo '<div class="row">
                    <div class="col-lg-12">
                         <button type="button" class="btn btn-primary" onclick="submit(1);">Approve Tour plan</button>
                         <button type="button" class="btn btn-primary" onclick="submit(0);">Reject Tour plan</button>
                    </div>
                </div><br>';
            } ?>

        <form id=update_status action="<?php echo base_url(); ?>tp/tourplan/update_status" method="POST">
            <input type="text" id="tour_month" name="tour_month" />
            <input type="text" id="tour_year" name="tour_year" />
            <input type="text" id="status" name="status" />
            <input type="text" id="user_id_update" name="user_id_update" />
        </form>

        <form id="tempform" target="myFrame"  action="<?php echo base_url(); ?>tp/calendar" method="POST">
         <input type="text" id="month_index" name="month_index" />
         <input type="text" id="year" name="year" />
         <input type="text" id="editable" name="editable" />
         <input type="text" id="button_title" name="button_title" />
         <input type="text" id="json" name="json" />
         <input type="text" id="user_id" name="user_id" />
         <input type="text" id="role" name="role" />
         <input type="text" id="sets" name="sets" />
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



