
<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['name']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/Synchem/logout"> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php

                    if($_SESSION["role"]=="Admin"){
                        echo '
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#person">Person<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="person" class="collapse">
                            <li>
                                <a href="/Synchem/person/add">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/person/manage">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#admin">Admin<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="admin" class="collapse">
                            <li>
                                <a href="/Synchem/admin/add">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/admin/manage">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#msd">MSD<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="msd" class="collapse">
                            <li>
                                <a href="/Synchem/msd/add">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/msd/manage">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#zm">ZM<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="zm" class="collapse">
                            <li>
                                <a href="/Synchem/zm/add">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/zm/manage">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#rm">RM<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="rm" class="collapse">
                            <li>
                                <a href="/Synchem/rm/add">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/rm/manage">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#am">AM<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="am" class="collapse">
                            <li>
                                <a href="/Synchem/am/add">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/am/manage">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#tm">TM<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="tm" class="collapse">
                            <li>
                                <a href="/Synchem/tm/add">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/tm/manage">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#mr">MR<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="mr" class="collapse">
                            <li>
                                <a href="/Synchem/mr/add">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/mr/manage">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3">Products<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="/Synchem/product/add">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/product/manage">View</a>
                            </li>
                            <li>
                                <a href="/Synchem/product/BulkUpload">Bulk Upload</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4">Gifts<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="demo4" class="collapse">
                            <li>
                                <a href="/Synchem/gifts/add">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/gifts/manage">View</a>
                            </li>
                            <li>
                                <a href="/Synchem/gifts/BulkUpload">Bulk Upload</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo">Doctor<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="/Synchem/AddDoctor">Add Doctor</a>
                            </li>
                            <li>
                                <a href="/Synchem/ViewDoctor">View Doctor</a>
                            </li>
                            <li>
                                <a href="/Synchem/AddSet">Manage Set</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1">Chemist<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="/Synchem/AddChemist">Add Chemist</a>
                            </li>
                            <li>
                                <a href="/Synchem/ViewChemist">View Chemist</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/Synchem/Hierarchy">Hierarchy</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#wcp">WCP<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="wcp" class="collapse">
                            <li>
                                <a href="/Synchem/wcp/manage">View</a>
                            </li>
                            <li>
                                <a href="/Synchem/wcp/edit">Edit</a>
                            </li>
                        </ul>
                    </li>';
                }
                else if ($_SESSION["role"] == "MR") {
                    echo '
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#wcp">WCP<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="wcp" class="collapse">
                            <li>
                                <a href="/Synchem/wcp/landing">Add</a>
                            </li>
                            <li>
                                <a href="/Synchem/wcp/manage">View</a>
                            </li>
                            <li>
                                <a href="/Synchem/wcp/edit">Edit</a>
                            </li>
                        </ul>
                    </li>
                    ';
                }
                else {
                    echo '
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#wcp">WCP<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="wcp" class="collapse">
                            <li>

                                <a href="/wcp/landing">View by Month</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#tp">TourPlanner<span style="float:right; padding-right:10px;font-size:14px">v</span></a>
                        <ul id="tp" class="collapse">
                            <li>
                                <a href="/tp/show">View Tour plan</a>
                            </li>
                            <li>
                                <a href="/tp/add">Add new Tour Plan</a>
                            </li>
                            <li>
                                <a href="/tp/update">Update status of Tour plan</a>
                            </li>
                            <li>
                                <a href="/tp/change">Change existing Tour plan</a>
                            </li>
                        </ul>
                    </li>
                    ';
                }
                ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>