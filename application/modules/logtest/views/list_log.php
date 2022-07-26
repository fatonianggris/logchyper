<?php echo $this->session->flashdata('flash_message'); ?>
<div id="flash_message"></div>
<h4 class="widgettitle">Daftar Log Testing</h4>
<table id="dyntable" class="table table-bordered table-condensed">
    <colgroup>
        <col class="con0" style="align: center; width: 6%" />
        <col class="con1" />
        <col class="con0" />
        <col class="con1" />
        <col class="con0" />
        <col class="con1" />
        <col class="con0" />
    </colgroup>
    <thead>
        <tr>          
            <th class="head0">ID Log</th>
            <th class="head1">Case ID</th>
            <th class="head0">Activity</th>
            <th class="head1">Start Timestamp</th>
            <th class="head0">End Timestamp</th>
            <th class="head1">Action</th>
        </tr>
    </thead>
    <tbody>  
        <?php
        if (!empty($list)) {
            foreach ($list as $key => $value) {
                ?>
                <tr class="gradeA">  
                    <td><?php echo $value->id_log; ?></td>
                    <td><?php echo $value->case_id; ?></td>
                    <td><?php echo $value->activity ?></td>                    
                    <td><?php echo $value->start_timestamp; ?></td>                  
                    <td><?php echo $value->end_timestamp ?>
                    </td>
                    <td class="center">
                        <a href="#myModal<?php echo $value->id_log; ?>" class="btn btn-de btn-circle" data-toggle="modal"><i class="iconfa-search"></i></a>                      
                    </td>
                </tr>
                <?php
            }  //ngatur nomor urut
        }
        ?>
    </tbody>
</table>
<?php
if (!empty($list)) {
    foreach ($list as $key => $value) {
        ?>
        <div id="myModal<?php echo $value->id_log; ?>" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                <h3 id="myModalLabel white" style="color: #ffffff">Deskripsi Log</h3>
            </div>
            <div class="modal-body">
                <h4 class="widgettitle2"></h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" method="post" action="forms.html" />
                    <p>
                        <label>ID Log</label>
                        <span class="field"><?php echo ucwords($value->id_log); ?></span>
                    </p>
                    <p>
                        <label>Case ID</label>
                        <span class="field"><?php echo ucwords($value->case_id); ?></span>
                    </p>
                    <p>
                        <label>Activity</label>
                        <span class="field"><?php echo $value->activity; ?></span>
                    </p>
                    <p>
                        <label>Start Timestamp</label>
                        <span class="field"><?php echo $value->start_timestamp; ?></span>
                    </p>                    
                    <p>
                        <label>End Timestamp</label>
                        <span class="field"><?php echo $value->end_timestamp; ?></span>
                    </p>

                    </form>
                </div><!--widgetcontent-->
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-inverse">Close</button>        
            </div>
        </div><!--#myModal-->
        <?php
    }
}
?>	
