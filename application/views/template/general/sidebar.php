
<ul class="nav nav-tabs nav-stacked">
    <li class="nav-header">Navigasi</li>
    <li class="<?php if ($nav == 'Beranda') echo 'active'; ?>"><a href="<?php echo site_url('dashboard'); ?>"><span class="iconfa-laptop"></span> Beranda</a></li>
    <li class="dropdown <?php if (@$act == 'log') echo 'active'; ?>"><a href="javascript:;"><span class="iconfa-hdd"></span> Manajemen Log</a>
        <ul <?php if (@$act == 'log') echo 'style="display: block"'; ?>>
            <li class="<?php if ($nav == 'Daftar Log Test') echo 'active'; ?>"><a href="<?php echo site_url('logtest/logcontroller/list_log') ?>">Daftar Data Log</a></li>
        </ul>
    </li>    
    <li class="dropdown <?php if (@$act == 'cypher') echo 'active'; ?>"><a href="javascript:;"><span class="iconfa-hdd"></span> Manajemen Cypher</a>
        <ul <?php if (@$act == 'cypher') echo 'style="display: block"'; ?>>
            <li class="<?php if ($nav == 'Tambah Cypher') echo 'active'; ?>"><a href="<?php echo site_url('logtest/logcontroller/input_cypher') ?>">Tambah Cypher Baru</a></li>
            <li class="<?php if ($nav == 'Daftar Cypher') echo 'active'; ?>"><a href="<?php echo site_url('logtest/logcontroller/list_cypher') ?>">Daftar Cypher</a></li>
        </ul>
    </li>   
</ul>
