<?php echo $this->session->flashdata('flash_message'); ?>
<div id="flash_message"></div>
<h4 class="widgettitle">Data Tabel Cypher <a href="<?php echo site_url('logtest/logcontroller/input_cypher'); ?>" class="btn btn-inverse pull-right" style="margin-top: -7px;"><i class="iconfa-plus icon-white"> </i> Tambah</a></h4>
<table id="dyntable" class="table table-bordered table-condensed">
    <colgroup>
        <col class="con0" style="align: center; width: 8%" />
        <col class="con1" />
        <col class="con0" />
        <col class="con1" />
        <col class="con0" />          
    </colgroup>
    <thead>
        <tr>          
            <th class="head0">ID Cypher</th>
            <th class="head1">Type</th>
            <th class="head0">Cypher</th>
            <th class="head1">Datetime</th>            
            <th class="head1">Action</th>
        </tr>
    </thead>
    <tbody>  
        <?php
        if (!empty($list)) {
            $i = 1;
            foreach ($list as $key => $value) {
                ?>
                <tr class="gradeA">  
                    <td><?php echo $value->id_cypher; ?></td>                    
                    <td> <?php
                        if ($value->type == 1) {
                            echo 'Merge';
                        } else if ($value->type == 2) {
                            echo 'Sequence Relation';
                        } else if ($value->type == 3) {
                            echo 'XORsplit Relation';
                        } else if ($value->type == 4) {
                            echo 'XORjoin Relation ';
                        } else if ($value->type == 5) {
                            echo 'ANDsplit Relation';
                        } else if ($value->type == 6) {
                            echo 'ANDjoin Relation';
                        } else if ($value->type == 7) {
                            echo 'ORsplit Relation';
                        } else if ($value->type == 8) {
                            echo 'ORjoin Relation';
                        } else if ($value->type == 9) {
                            echo 'Other';
                        }
                        ?>
                    </td>
                    <td><?php echo $value->cypher; ?></td>
                    <td><?php echo $value->datetime ?></td>                                                  
                    <td class="center">
                        <a href="<?php echo site_url('logtest/logcontroller/get_cypher/' . $value->id_cypher); ?>" class="btn btn-info btn-circle"><i class="iconfa-pencil"></i></a> 
                        <a onclick="actDel(<?php echo $value->id_cypher; ?>)" class="btn btn-danger btn-circle"><i class="iconfa-remove"></i></a>
                    </td>
                </tr>
                <?php
                $i++;
            }  //ngatur nomor urut
        }
        ?>
    </tbody>
</table>
<script type="text/javascript">
    function actDel(object) {
        alertify.confirm("Apa anda yakin ingin menghapus data ini ?", function (e) {
            if (e) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>logtest/logcontroller/delete_cypher",
                    data: {id: object},
                    success: function (msg)
                    {
                        data = msg.split('|');
                        $('#flash_message').html(data[1]);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                });
            }
        });
    }
</script>