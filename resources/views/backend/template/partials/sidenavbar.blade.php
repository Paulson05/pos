<div class="logo">
    <a href="https://www.creative-tim.com/" class="simple-text logo-mini">
        Ct
    </a>
    <a href="https://www.creative-tim.com/" class="simple-text logo-normal">
        Creative Tim
    </a>
</div>
<div class="user">
    <div class="photo">
        <img src="../assets/img/default-avatar.png" />
    </div>
    <div class="info ">
        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>Tania Andrew
                                <b class="caret"></b>
                            </span>
        </a>
        <div class="collapse" id="collapseExample">
            <ul class="nav">
                <li>
                    <a class="profile-dropdown" href="#pablo">
                        <span class="sidebar-mini">MP</span>
                        <span class="sidebar-normal">My Profile</span>
                    </a>
                </li>
                <li>
                    <a class="profile-dropdown" href="#pablo">
                        <span class="sidebar-mini">EP</span>
                        <span class="sidebar-normal">Edit Profile</span>
                    </a>
                </li>
                <li>
                    <a class="profile-dropdown" href="#pablo">
                        <span class="sidebar-mini">S</span>
                        <span class="sidebar-normal">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<ul class="nav">
    <li class="nav-item ">
        <a class="nav-link" href="dashboard.html">
            <i class="nc-icon nc-chart-pie-35"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
            <i class="nc-icon nc-app"></i>
            <p>
          Manage   Product
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="componentsExamples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('product.index')}}">
                        <span class="sidebar-mini">PM</span>
                        <span class="sidebar-normal">Manage Product</span>
                    </a>
                </li>


            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#formsExamples">
            <i class="nc-icon nc-notes"></i>
            <p>
                Manage   Unit
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="formsExamples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('unit.index')}}">
                        <span class="sidebar-mini">U</span>
                        <span class="sidebar-normal">Unit Management</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
            <i class="nc-icon nc-paper-2"></i>
            <p>
                Manage Category
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="tablesExamples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('category.index')}}">
                        <span class="sidebar-mini">CM</span>
                        <span class="sidebar-normal"> Manage Category </span>
                    </a>
                </li>

            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
            <i class="nc-icon nc-pin-3"></i>
            <p>
            Manage Supplier
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="mapsExamples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('supplier.index')}}">
                        <span class="sidebar-mini">SM</span>
                        <span class="sidebar-normal">Supplier Management</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#maps2Examples">
            <i class="nc-icon nc-pin-3"></i>
            <p>
                Manage customer
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="maps2Examples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('customer.index')}}">
                        <i class="nc-icon nc-chart-bar-32"></i>
                        <p>View Customer</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('customer.report')}}">
                        <i class="nc-icon nc-chart-bar-32"></i>
                        <p>Credit Customer Report</p>
                    </a>
                </li>

            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
            <i class="nc-icon nc-puzzle-10"></i>
            <p>
                Manage Purchase
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="pagesExamples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('purchase.index')}}">
                        <span class="sidebar-mini">VP</span>
                        <span class="sidebar-normal">purchase</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('purchase-list')}}">
                        <span class="sidebar-mini">PL</span>
                        <span class="sidebar-normal">Purchase List</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('pending.list')}}">
                        <span class="sidebar-mini">PL</span>
                        <span class="sidebar-normal">PendingList</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('daily.purchase.report')}}">
                        <span class="sidebar-mini">DP</span>
                        <span class="sidebar-normal">Daily Purschase</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#pages3Examples">
            <i class="nc-icon nc-puzzle-10"></i>
            <p>
                Manage invoice
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="pages3Examples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('invoice.index')}}">
                        <span class="sidebar-mini">CI</span>
                        <span class="sidebar-normal">create Invoice</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('invoice.list')}}">
                        <span class="sidebar-mini">IL</span>
                        <span class="sidebar-normal">Invoice List</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="">
                        <span class="sidebar-mini">AI</span>
                        <span class="sidebar-normal">Approval invoice</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('invoice.print-list')}}">
                        <span class="sidebar-mini">PI</span>
                        <span class="sidebar-normal">print invoice</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('invoice.daily.report')}}">
                        <span class="sidebar-mini">DI</span>
                        <span class="sidebar-normal">Daily invoice</span>
                    </a>
                </li>



            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#pages4Examples">
            <i class="nc-icon nc-puzzle-10"></i>
            <p>
                Manage Stock
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="pages4Examples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('stock.report')}}">
                        <span class="sidebar-mini">VS</span>
                        <span class="sidebar-normal">view  stock</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('supplier.wise.report')}}">
                        <span class="sidebar-mini">SPW</span>
                        <span class="sidebar-normal">Supplier/Product wise</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
