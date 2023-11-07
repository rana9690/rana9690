<?php $this->load->view("admin/header"); ?>
<?php $this->load->view("admin/sidebar"); ?>


<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content" style="padding:0px;">
    <div class="row">
        <div class="card checklistSec" style="">
            <h3>Organization List</h3>
            <table id="example" class="display trial-table2 table-responsive border table" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Org Name</th>
                        <th>Short Name</th>
                        <th>Status</th>
                        <th>Register Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                         $i=1;foreach($org as $val){ 
                             $status='';$color='';
                       
                             if($val['display']==true){ $status= "Active"; $color='btn-success'; $action= "Approved"; }else{ $status=  "Non Active";$color='btn-primary';$action= "Not Approved";  }
                             ?>
                    <tr style="background-color:<?php echo $color;  ?>">
                        <td><?php echo $i; ?></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter"
                                onclick="vieworgdetails('<?php echo $val['org_code']; ?>');"><?php echo ucfirst($val['org_name']); ?></a>
                        </td>
                        <td><?php echo $val['org_name']; ?></td>
                        <td><?php  echo $status; ?></td>
                        <td><?php  ?></td>
                        <td>
                            <button type='button' data-toggle="modal" data-target="#exampleModal"
                                class="btn btn-sm btn-success"
                                onclick="action_orgapprove('<?php echo $val['org_code']; ?>','<?php echo $val['display']; ?>');">
                                <?php echo $action; ?>
                            </button>
                        </td>
                    </tr>
                    <?php $i++;} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Organization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="adv_id" id="adv_id" value="">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control" id="status">
                        <option value="0">Not Varified</option>
                        <option value="1">Varified</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Remark</label>
                    <textarea class="form-control" id="remark" name="remark" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="action_orgapprove_action();">Save</button>
            </div>
        </div>
    </div>
</div>



<!--User Details-->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">User Details </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="msg"></div>
            <div class="modal-body" id="record">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div> 


<?php $this->load->view("admin/footer"); ?>
<script>
$('.nav-link').click(function() {
    var content = $(this).data('value');
    if (content != '') {
        $('.steps').empty().load(base_url + '/efiling/' + content);
    }
});
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});


function action_orgapprove(val, status) {
    $("#status option[value='" + status + "']").attr("selected", "selected");
    $("#adv_id").val(val);
}


function vieworgdetails(id) {
    var dataa = {};
    dataa['org_id'] = id;
    $.ajax({
        type: "POST",
        url: base_url + "org_view",
        data: dataa,
        cache: false,
        success: function(resp) {
            var resp = JSON.parse(resp);
            if (resp.data == 'success') {
                $('#msg').html('<span style="color:green"><h2>' + resp.massage + '</h2></span>');
            }
            if (resp.data == 'error') {
                $('#msg').html('<span style="color:red"><h2>' + resp.massage + '</h2></span>');
            }
        },
        error: function(request, error) {
            $('#loading_modal').fadeOut(200);
        }
    });
}

function action_orgapprove_action() {
    var status = $("#status").val();
    var remark = $("#remark").val();
    var adv_id = $("#adv_id").val();
    var dataa = {};
    dataa['adv_id'] = adv_id;
    dataa['status'] = status;
    dataa['remark'] = remark;
    var x = confirm("Are you sure you want to varified?");
    if (x) {
        $.ajax({
            type: "POST",
            url: base_url + "org_varified",
            data: dataa,
            cache: false,
            success: function(resp) {
                var resp = JSON.parse(resp);
                if (resp.data == 'success') {
                    alert(resp.massage);
                }
            },
            error: function(request, error) {
                $('#loading_modal').fadeOut(200);
            }
        });
    }
}
</script>