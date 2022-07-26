<?php echo $this->session->flashdata('flash_message'); ?>
<div class="row-fluid">
    <div class="widget">
        <h4 class="widgettitle">Formulir Cypher
            <a href="<?php echo site_url('logtest/logcontroller/list_cypher') ?>" style=" margin-top: -7px;" class="btn btn-inverse pull-right" ><i class="iconfa-eye-open icon-white"></i> List Cypher</a>
        </h4>
        <div class="widgetcontent">
            <form class="stdform" action="<?php echo site_url('logtest/logcontroller/add_cypher'); ?>" enctype="multipart/form-data" method="post" />
            <p>
                <label>Type Cypher*</label>
                <span class="field">
                    <select name="type_cypher" class="uniformselect">
                        <option value="" />Pilih salah satu
                        <option value="1" />Merge
                        <option value="2" />Sequence Relation
                        <option value="3" />XORsplit Relation
                        <option value="4" />XORjoin Relation                        
                        <option value="5" />ANDsplit Relation
                        <option value="6" />ANDjoin Relation
                        <option value="7" />ORsplit Relation
                        <option value="8" />ORjoin Relation
                        <option value="9" />Other                       
                    </select>
                </span>
            </p>             
            <p>
                <label>Text Cypher*</label>
                <span class="field"><textarea id="autoResizeTA" cols="80" name="text_cypher" rows="6" class="span7" style="resize: vertical"></textarea></span> 
            </p>               
            <p class="stdformbutton"> 
                <button type="reset" class="btn">Reset Button</button>
                <button class="btn btn-primary">Submit Button</button>
            </p>
            </form>
        </div><!--widgetcontent-->
    </div>