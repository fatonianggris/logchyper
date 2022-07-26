<?php echo $this->session->flashdata('flash_message'); ?>
<div class="row-fluid">
    <div id="dashboard-left" class="span8"> 
        <ul class="shortcuts">
            <li class="events">
                <a >
                    <span class="shortcuts-icon iconsi-archive"></span>
                    <span class="shortcuts-label">Data Log (<?php echo $beranda[0]->log; ?>)</span>
                </a>
            </li>

        </ul>
        <h4 class="widgettitle">Chart Data</h4>
        <div class="widgetcontent">
            <div id="piechart" style="height: 300px;"></div>
        </div><!--widgetcontent-->
        <br />
    </div><!--span8-->

    <div id="dashboard-right" class="span4">

        <h4 class="widgettitle">Kalendar</h4>
        <div class="widgetcontent nopadding">
            <div id="datepicker"></div>
        </div>
        <br />
    </div><!--span4-->
</div><!--row-fluid-->
<script>
    /**PIE CHART IN MAIN PAGE WHERE LABELS ARE INSIDE THE PIE CHART**/
    var data = [];
    data[0] = {label: " Total Log " + (<?php echo $beranda[0]->log; ?>), data: <?php echo $beranda[0]->log; ?>};
   
    jQuery.plot(jQuery("#piechart"), data, {
        colors: ['#680fb3', '#9ab30f'],
        series: {
            pie: {show: true}
        }
    });
</script>